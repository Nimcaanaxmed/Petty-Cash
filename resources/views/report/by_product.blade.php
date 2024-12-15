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



 <table id="customers" style="font-size: 14px;">

<tr>
<p style="float: left;"> Product Name: {{ $productName}}<br>
Printed Date: {{date('d F Y')}}
</p>

  <p style="float: right;">
  From: {{ \Carbon\Carbon::parse($start_date)->format(' d M Y') }} <br>
  To: {{ \Carbon\Carbon::parse($end_date)->format(' d M Y') }} 
  
</p>
</tr>

 </table>
 
 <br>
 <br>
 <br>
 
 
 <hr>

 <table id="customers" class="table dt-responsive nowrap w-100" style="line-height: 1; margin-bottom: 2px;">
   <td style="font-size: 14px; float: center;"> <center><b>QUICK SUMMARY PRODUCT ORDER REPORTS</b></center></td>
</table>


<table id="customers" style="font-size: 13px;">
<tr style="color:green;">
      
        <th>MAIN STOCK</th>
        <th>SOLD</th>
        <th>ADDED</th>
        <th>STOCK BALANCE</th>
    </tr>

        
            <tr>
                
                <td>{{$productMainStock}}</td>
                <td>{{$sold}}</td>
                <td>{{$added}}</td>
                <td>{{ $productStock}}</td>
               
            </tr>
           
        
</table>
<br>
<table id="customers" style="font-size: 13px;">
<tr style="color:green;">
      
        <th>SL</th>
        <th>CUSTOMER NAME </th>
        <th>CUSTOMER PHONE</th>
        <th>QTY</th>
        <th>DATE</th>
    </tr>

        
       @foreach($data as $key=> $item)
            <tr>
                
                <td>{{$key+1}}</td>
                <td>{{ $item->customer->customer_name }}</td>
                <td>{{ $item->customer->customer_phone }}</td>
                <td>{{$item->quantity}}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->timezone('Africa/Mogadishu')->format('D, d M Y H:i:s') }}</td>
                
               
            </tr>
            @endforeach
        
</table>
<br>



</body>
</html>
