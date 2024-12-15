<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 6px;
}

/* #customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;} */

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  /* background-color: #4CAF50; */
  color: green;
}


</style>
</head>

@php 
 
$setting = App\Models\Setting::find(1);
@endphp 


<body>
<hr>
<div class="row"> <!-- start 1st row -->
    <div style="float: left" class="col-md-4 text-center">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents($setting->logo)) }}" style="width: 320px; height: 120px;">
    </div>

    <div class="col-md-3 text-center">
        <!-- Leave this column empty for spacing -->
    </div>

    <div style="float: right" class="col-md-5 text-center">
        <p><strong style="font-size: 25px; float: center;">{{$setting->name}}</strong><br style="line-height: 2; margin-bottom: 10px;">
      Address:  {{$setting->address}} <br>
       Email: {{$setting->email}} <br>
       Contact Us: {{$setting->contact}} <br>
       
    </div>
</div> <!-- end 1st row -->



<br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
  

<hr style="line-height: 1; margin-bottom: 10px;">


<table id="customers" class="table dt-responsive nowrap w-100" style="line-height: 1; margin-bottom: 2px;">
   <td style="font-size: 14px; float: center;"> <center><b>QUICK SUMMARY CUSTOMER ORDER REPORTS</b></center></td>
</table>
<p style="font-size: 16px; float: left;"> <b>From: {{ \Carbon\Carbon::parse($start_date)->format(' d M Y') }} To: {{ \Carbon\Carbon::parse($end_date)->format(' d M Y') }}</b></p>
<p style="font-size: 16px; float: right;"> <b>Printed Date: {{date('d F Y')}}</b></p>
<br>
<br>
 
<hr>
 <table id="customers" style="font-size: 14px;">

<tr>
<p style="float: left;"> CUSTOMER: {{ $customerName}}<br>
 ORDERS: {{count($data)}} <br>
</p>

<p style="float: right;"> INCOME: ${{number_format($income,2)}} <br>
 DUE: ${{number_format($due,2)}} <br>
</p>
</tr>

 </table>
 
 <br>
 <br>
 <br>
 
 
 <hr>

 


@foreach ($data as $key=> $order)

<table id="customers" style="font-size: 13px;">
<tr style="color:green;">
  <td>SN</td>
    <td>DATE</td>
    <td>PICKED QTY</td>
</tr>
<tr>
        <td>{{$key+1}}</td> 
        <td>{{ \Carbon\Carbon::parse($order->order_date)->format(' d M Y') }}</td> 
        <td>{{$order->total_products}}</td> 
  
</tr>
</table>

<table id="customers" style="font-size: 13px;">
<tr style="color:green;">
      
        <th>PRODUCT NAME</th>
        <th>QTY</th>
        <th>PRICE</th>
        <th>SUBTOTAL</th>
    </tr>

        
        @foreach ($order->orderDetails as $item)
            <tr>
                
                <td>{{ $item->product->product_name }}</td>
                <td>{{ number_format($item->quantity) }}</td>
                <td>${{ number_format($item->price,2) }}</td>
                <td>${{ number_format($item->subtotal,2) }}</td>
                
                
            </tr>

        @endforeach
        <tr>
    
    <td colspan="3" style="text-align: right; font-size: 12px;">
    
      <strong>   TOTAL </strong>  
     

    </td>
    <td>${{ number_format($order->total,2) }}</td>

  </tr> 
            <tr>
    
    <td colspan="3" style="text-align: right; font-size: 12px;">
    
      <strong>   PAID </strong>  
     

    </td>
    <td>${{ number_format($order->paid,2) }}</td>

  </tr> 
            <tr>
    
    <td colspan="3" style="text-align: right; font-size: 12px;">
    
      <strong>   DISCOUNT </strong>  
      </td>
    <td>${{ number_format($order->discount,2) }}</td>

  </tr> 
            <tr>
    
    <td colspan="3" style="text-align: right; font-size: 12px;">
    
      <strong>   DUE </strong>  
      </td>
    <td>${{ number_format($order->due,2) }}</td>

  </tr> 
            <tr>
    
    <td colspan="3" style="text-align: right; font-size: 12px;">
    
      <strong>   PAYMENT TYPE </strong>  
      </td>
    <td>{{ $order->payment_type }}</td>

  </tr> 
        
</table>
<br>
@endforeach

<br>



</body>
</html>
