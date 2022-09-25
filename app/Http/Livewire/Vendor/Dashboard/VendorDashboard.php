<?php

namespace App\Http\Livewire\Vendor\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Order;
use App\Models\variation;
use App\Models\product;
use App\Models\size;
use App\Models\vendor;
use App\Models\Notice;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Cart;

use DB;
use Auth;

class VendorDashboard extends Component
{
    use WithFileUploads;

    public $top_products_monthly, $top_products_last_day, $low_products_last_day;

    public $dates_for_monthly_report, $amounts_for_monthly_report,$total_amount_for_monthly_report;

    public $months_for_yearly_report, $amounts_for_yearly_report,$total_amount_for_yearly_report;


    public $from, $to;

    public $user_id, $vendor_id_array=[];

    public function mount()
    {
        $this->user_id = Auth::id();
        $vendor = vendor::where('user_id',$this->user_id)->get();

        // dd($vendor);

        foreach ($vendor as $key => $value) {

            if ($value->user_id == $this->user_id) {
                array_push($this->vendor_id_array,$value->id);
            }else{
                return redirect()->route('vendor.products');
            }

        }

        // dd($this->vendor_id_array);

        $this->from = Carbon::now()->subDays(1);
        $this->to = Carbon::now();

        //For monthly Sale
        self::SetMonthlySale();
        //For yearly Sale
        self::SetYearlySale(Carbon::now()->month);
        //For Top products
        self::SetTopProducts();

        // for daily best products
        self::SetTopProductsLastDay();
    }

     public function SetMonthlySale()
    {
        $temp_date = array();
        $temp_amount = array();
        $temp_total_amount = 0;
        $delivered_orders = Order::whereIn('vendor_id',$this->vendor_id_array)->where('status','delivered')->select(DB::raw('sum(total) as price'),DB::raw('DATE(created_at) as day'))->groupBy('day')->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])->get();

        

        foreach ($delivered_orders as $key => $value) {
            array_push($temp_date, $value->day);
            array_push($temp_amount, $value->price);
            $temp_total_amount = $temp_total_amount + $value->price;
        }

        // dd($temp_date,$temp_amount,$temp_total_amount);

        $this->dates_for_monthly_report = $temp_date;
        $this->amounts_for_monthly_report = $temp_amount;
        $this->total_amount_for_monthly_report = $temp_total_amount;
    }

    public function SetYearlySale($this_month)
    {
        
        $month_count = 12;

        $Months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        $new_months=array();

        $i = 0;

        $increment = $this_month;

        while ($i<$month_count) {
            
            // array_push($new_months,$Months[$increment]);
            $new_months[$i] = $Months[$increment];
            $increment++;
            if ($increment>11) {
                $increment = 0;
            }

            $i++;

        }


        $this->months_for_yearly_report = $new_months;
        // dd($new_months);

        $amounts=array();

        // $delivered_orders = Order::where('status','delivered')->select('total',DB::raw('DATE(created_at) as day'))->whereBetween('created_at', [Carbon::now()->subYears(1), Carbon::now()])->get();

        $start_month = $this_month;        
        $count=12;
       
        $i=0;

        $temp_year = Carbon::now()->year;
        $temp_month = $this_month;

        $amounts_array_index = 11;

        while ($i<$count) {
            
            $temp_amount = 0;


            $start = $temp_year ."-". $temp_month ."-". "01";
            $end = $temp_year ."-". $temp_month ."-". "31";

            $delivered_orders = Order::whereIn('vendor_id',$this->vendor_id_array)->where('status','delivered')->select('total',DB::raw('DATE(created_at) as day'))->whereBetween('created_at', [$start, $end])->get();

            foreach ($delivered_orders as $key => $value) {
                $temp_amount = $temp_amount + $value->total;
            }

            $amounts[$amounts_array_index] = $temp_amount;
            $amounts_array_index--;

            if ($temp_month == 1) {
                $temp_month = 12;
                $temp_year = $temp_year - 1;
            }else{
                $temp_month = $temp_month - 1;
            }

            $i++;

        }

        $this->amounts_for_yearly_report = array_reverse($amounts);


        $amount_total=0;
        foreach ($amounts as $key => $value) {
            $amount_total = $amount_total + $value; 
        }

        $this->total_amount_for_yearly_report = $amount_total;

        // dd($this->months_for_yearly_report,$this->amounts_for_yearly_report,$amount_total);



    }

    public function SetTopProducts()
    {
        $temp=collect();

        $orders = Order::whereIn('vendor_id',$this->vendor_id_array)->where('status','delivered')->select('products')->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])->get();

        foreach ($orders as $order_key => $order_value) {
            // code...
        

            $products = json_decode($order_value->products);

            
            foreach ($products as $key => $value) {
                
                $variation = variation::where('id',$value->id)->with('product','color','size')->first();

                
                $data = collect();

                $data['product_id'] = $variation->product->id;
                $data['product_name'] = $variation->product->name;
                $data['variation_id'] = $value->id;
                $data['variation_color'] = $variation->color->name ?? 'null';
                $data['variation_size'] = $variation->size->name ?? 'null';
                $data['Quantity'] = $value->qty;

                
                $temp->push($data);
            }

        }


        $temp_sorted = $temp->groupBy('product_id');

        $resultArray = $temp_sorted->map(function($item, $key) {
            return [
                'quantity' => $item->sum('Quantity'),
                'product_id' => $key,
            ];
        });


        $top_products = collect();

        foreach ($resultArray as $key => $value) {
            
            // dd($value);

            $product_info = product::find($value['product_id']);

            $data = collect();

            $data['id'] = $value['product_id'];
            $data['name'] = $product_info->name;
            $data['price'] = $product_info->unit_price;
            $data['quantity'] = $value['quantity'];

            $top_products->push($data);
        }

        $temp_desc = $top_products->sortByDesc('quantity');
        $this->top_products_monthly = $temp_desc->take(5);
        // dd($this->top_products_monthly);

        

    }

    public function SetTopProductsLastDay()
    {

        

        $temp=collect();

        if ($this->from > $this->to) {
            
            $temp = $this->to;

            $this->to = $this->from;
            $this->from = $temp;
        }


        // $orders = Order::where('status','delivered')->select('products')->whereBetween('created_at', [Carbon::now()->subDays(1), Carbon::now()])->get();

        $orders = Order::whereIn('vendor_id',$this->vendor_id_array)->where('status','delivered')->select('products')->whereBetween('created_at', [$this->from, $this->to])->get();

        // dd($orders);

        foreach ($orders as $order_key => $order_value) {
            // code...
        

            $products = json_decode($order_value->products);

            
            foreach ($products as $key => $value) {
                
                $variation = variation::where('id',$value->id)->with('product','color','size')->first();

                
                $data = collect();

                $data['product_id'] = $variation->product->id;
                $data['product_name'] = $variation->product->name;
                $data['variation_id'] = $value->id;
                $data['variation_color'] = $variation->color->name ?? 'null';
                $data['variation_size'] = $variation->size->name ?? 'null';
                $data['Quantity'] = $value->qty;

                
                $temp->push($data);
            }

        }


        $temp_sorted = $temp->groupBy('product_id');

        $resultArray = $temp_sorted->map(function($item, $key) {
            return [
                'quantity' => $item->sum('Quantity'),
                'product_id' => $key,
            ];
        });


        $top_products = collect();

        foreach ($resultArray as $key => $value) {
            
            // dd($value);

            $product_info = product::find($value['product_id']);

            $data = collect();

            $data['id'] = $value['product_id'];
            $data['name'] = $product_info->name;
            $data['price'] = $product_info->unit_price;
            $data['quantity'] = $value['quantity'];

            $top_products->push($data);
        }

        $temp_desc = $top_products->sortByDesc('quantity');
        $this->top_products_last_day = $temp_desc->take(5);


        $temp_asc = $top_products->sortBy('quantity');
        $this->low_products_last_day = $temp_asc->take(5);


        // dd($this->top_products_last_day ,$this->low_products_last_day);

        

    }


    public function setDates()
    {
        $validatedData = $this->validate([
            'from' => 'required',
            'to' => 'required',
        ]);


        //For monthly Sale
        self::SetMonthlySale();
        //For yearly Sale
        self::SetYearlySale(Carbon::now()->month);
        //For Top products
        self::SetTopProducts();

        self::SetTopProductsLastDay();

        // $this->emitUp('datesUpdated');

    }

    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged', [
            'dates_for_monthly_report' => $this->dates_for_monthly_report, 
            'amounts_for_monthly_report' => $this->amounts_for_monthly_report, 
            'total_amount_for_monthly_report' => $this->total_amount_for_monthly_report,

            'months_for_yearly_report' => $this->months_for_yearly_report,
            'amounts_for_yearly_report' => $this->amounts_for_yearly_report,
            'total_amount_for_yearly_report' => $this->total_amount_for_yearly_report
            ]);

        $latest_notice = Notice::with('user')->orderBy('created_at','desc')->take(3)->get();

        return view('livewire.vendor.dashboard.vendor-dashboard',compact('latest_notice'))->layout('admin.adminbase');
    }
}
