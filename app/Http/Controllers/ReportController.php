<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\OrdersExport;
use App\Exports\SoldProducts;
use App\Exports\CustomersExport;
use App\Exports\ValuedCustomersExport;
use App\Exports\VendorsExport;
use App\Exports\VendorsOrder;
use App\Exports\VendorWiseProductList;
use App\Exports\VendorStatementExport;



use App\Models\vendor;

class ReportController extends Controller
{
    public function OrderExport()
    {
         return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    public function SoldProducts(Request $request)
    {
          $from = $request->from;
          $to = $request->to;

          // dd($from,$to);


         return Excel::download(new SoldProducts($from, $to), 'SoldProducts'.'_from:'.$from.'_to:'.$to.'.xlsx');
    }

    public function CustomersExport()
    {
         return Excel::download(new CustomersExport, 'Customers_List.xlsx');
    }

    public function ValuedCustomersExport(Request $request)
    {
          $from = $request->from;
          $to = $request->to;

         return Excel::download(new ValuedCustomersExport($from, $to), 'ValuedCustomers'.'_from:'.$from.'_to:'.$to.'.xlsx');
    }

    public function VendorsExport()
    {
         return Excel::download(new VendorsExport, 'Vendors_List.xlsx');
    }


    public function VendorsOrderExport(Request $request)
    {
          $from = $request->from;
          $to = $request->to;

          $vendor_id = $request->vendor_id;

          $vendor_data = vendor::find($vendor_id);

         return Excel::download(new VendorsOrder($from, $to, $vendor_id), 'Order_of_'.$vendor_data->name.'_sn:'.$vendor_id.'_from:'.$from.'_to:'.$to.'.xlsx');
    }

    public function VendorWiseProductExport(Request $request)
    {
          
          $vendor_id = $request->vendor_id;

          $vendor_data = vendor::find($vendor_id);

         return Excel::download(new VendorWiseProductList($vendor_id), 'Products_of_'.$vendor_data->name.'_sn:'.$vendor_id.'.xlsx');
    }


    public function VendorStatementExport(Request $request)
    {
      // dd($request->all());

      $from = $request->from;
      $to = $request->to;

      $vendor_id = $request->vendor_id;

      $vendor_data = vendor::find($vendor_id);


      return Excel::download(new VendorStatementExport($vendor_id,$from,$to), 'Statement_of_'.$vendor_data->name.'_From:'.$from.'_To:'.$to.'.xlsx');
    }


}
