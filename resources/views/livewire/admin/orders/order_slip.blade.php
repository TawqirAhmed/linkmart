<!DOCTYPE html>
<html>
<head>
    <title>Order Slip: {{ $Order->order_number }}</title>
    <link rel="stylesheet" href="{{ ltrim(public_path('admin/dist/css/adminlte.css'), '/') }}" />
    <link rel="stylesheet" href="{{ ltrim(public_path('admin/dist/css/adminlte.core.css'), '/') }}" />    
</head>
<body>
    <div class="row">
        <div class="col-md-8">
            LinkMart Order No: {{ $Order->order_number }}
        </div>
        <div class="col-md-4">
            Date: {{ Carbon\Carbon::now()->format('d, F Y') }}
        </div>
    </div>   

    <table class="table table-bordered table-striped nowrap">
        <tr>
            <th style="width:10%"><img src="{{ public_path('uploads\vendors') }}/{{ $Order->vendor->image }}" style="width: 80px; height: 80px;"></th>
            <td>{{ $Order->order_number }}</td>
        </tr>
        <tr>
            <th style="width:10%">{{ $Order->vendor->name }}</th>
            <td>{{ $Order->order_number }}</td>
        </tr>
    </table>
    

    <br>
    <table class="table table-bordered table-striped nowrap">
        <tr>
            <th style="width:10%">Purchase No:</th>
            <td>{{ $Order->order_number }}</td>
            <th style="width:10%">Payment Method:</th>
            <td>{{ $Order->transaction->mod }}</td>
        </tr>
        <tr>
            <th style="width:10%">Purchase Date:</th>
            <td>{{ Carbon\Carbon::parse($Order->created_at)->format('d, F Y') }}</td>
            <th style="width:10%"></th>
            <td></td>
        </tr>
        <tr>
            <th style="width:10%">Bill To:</th>
            <td>{{ $Order->name }}</td>
            @if($Order->is_shipping_different == 0)
                <th style="width:10%">Deliver To:</th>
                <td>{{ $Order->shipping->name }}</td>
            @else
                <th style="width:10%">Deliver To:</th>
                <td>{{ $Order->name }}</td>
            @endif
        </tr>
        <tr>
            <th style="width:10%">Address:</th>
            <td>{{ $Order->address_line1 }}<br>{{ $Order->address_line2 }}</td>
            @if($Order->is_shipping_different == 0)
                <th style="width:10%">Address:</th>
                <td>{{ $Order->shipping->address_line1 }}<br>{{ $Order->shipping->address_line2 }}</td>
            @else
                <th style="width:10%">Address:</th>
                <td>{{ $Order->address_line1 }}<br>{{ $Order->address_line2 }}</td>
            @endif
        </tr>
        <tr>
            <th style="width:10%">Phone:</th>
            <td>{{ $Order->mobile }}</td>
            @if($Order->is_shipping_different == 0)
                <th style="width:10%">Phone:</th>
                <td>{{ $Order->shipping->mobile }}</td>
            @else
                <th style="width:10%">Phone:</th>
                <td>{{ $Order->mobile }}</td>
            @endif
        </tr>
        
    </table>
    
    <br>
    <table class="table table-bordered table-striped nowrap">
        <tr>
            <td colspan="8">Ordered Item List</td>
        </tr>
        <tr class="text-center">
            <th>#</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Size</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        @foreach($Order->items as $Key=>$value)
            <tr class="text-center">
                <td>{{ $Key+1 }}</td>
                <td>{{ $value->variation->product->name }}</td>
                <td>{{ $value->variation->sku }}</td>

                @if($value->variation->size != null)
                <td>{{ $value->variation->size->name }}</td>
                @else
                <td>---</td>
                @endif

                @if($value->variation->color != null)
                <td>{{ $value->variation->color->name }}</td>
                @else
                   <td>---</td>
                @endif

                <td>{{ $value->quantity }}</td>
                <td class="text-right">{{ $value->price }}</td> 
                {{-- <td class="text-right">{{ $value->price * $value->quantity }}</td> --}}
                <td class="text-right">{{ number_format((float)($value->price * $value->quantity), 2, '.', '') }}</td>
            </tr>
        @endforeach


    </table>

    
        <div class="col-3" style="float:right;">

            <table class="table table-bordered table-striped nowrap">
                <tr>
                    <th>Subtotal:</th>
                    <td class="text-right">{{ $Order->subtotal }}</td>
                </tr>
                <tr>
                    <th>Shipping:</th>
                    <td class="text-right">{{ $Order->shipping_charge }}</td>
                </tr>
                <tr>
                    <th>Discount:</th>
                    <td class="text-right">{{ $Order->discount }}</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td class="text-right">{{ $Order->total }}</td>
                </tr>
            </table>

        </div>
    





   <style type="text/css">
       html{
        font-size: .5rem;
       }
   </style>
</body>
</html>