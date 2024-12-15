<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\StockUpgrades;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Twilio\Rest\Client;
class ReportController extends Controller
{

    

   public function ReportView(){
        $products = Product::latest()->get();
        $customers = Customer::where('status','1')->latest()->get();
        return view('report.report_view',compact('products','customers'));
   }


public function AllOrdersReportPDF(Request $request){

    $start_date = $request->start_date;
    $end_date = $request->end_date;

    $data = Order::with('orderDetails')->whereBetween('order_date', [$start_date, $end_date])->get();
    $income = Order::where('order_status','Completed')->whereBetween('order_date', [$start_date, $end_date])->sum('paid');
    $due = Order::where('order_status','Completed')->whereBetween('order_date', [$start_date, $end_date])->sum('due');
    $profit = OrderDetails::where('order_status','Completed')->whereBetween('order_date', [$start_date, $end_date])->sum('profit');
     
    if ($data->isEmpty()) {
        $notification = array(
            'message' => 'No data found for '.$start_date.' To '.$end_date.'.',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    $pdf = Pdf::loadView('report.all_orders', compact('start_date', 'end_date', 'data','income','due','profit'))->setPaper('a4');

    // You can provide a link for the user to download the PDF
    return $pdf->stream('orders.pdf');

    
}

public function OrdersByproductPDF(Request $request){

    $product = $request->product_id;
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $productData = Product::where('id', $product)->select('product_name', 'stock','main_stock')->first();
    $productName = $productData->product_name;
    $productStock = $productData->stock;
    $productMainStock = $productData->main_stock;
    $data = OrderDetails::where('order_status','Completed')->where('product_id',$product)->whereBetween('order_date', [$start_date, $end_date])->get();
    $added = StockUpgrades::where('product_id',$product)->whereBetween('updated_date', [$start_date, $end_date])->sum('added_stock');
    $sold = OrderDetails::where('order_status','Completed')->where('product_id',$product)->whereBetween('order_date', [$start_date, $end_date])->sum('quantity');
    if ($data->isEmpty()) {
        $notification = array(
            'message' => 'No data found for '.$start_date.' To '.$end_date.'.',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    $pdf = Pdf::loadView('report.by_product', compact('start_date', 'end_date', 'data','productName','productStock','productMainStock','added','sold'))->setPaper('a4');

    return $pdf->stream('by_product.pdf'); 
}

public function OrdersBycustomerPDF(Request $request){

    $customer = $request->customer_id;
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $customerData = Customer::where('id', $customer)->select('customer_name')->first();
    $customerName = $customerData->customer_name;
    $data = Order::where('order_status','Completed')->where('customer_id',$customer)->with('orderDetails')->whereBetween('order_date', [$start_date, $end_date])->get();
    $income = Order::where('order_status','Completed')->where('customer_id',$customer)->whereBetween('order_date', [$start_date, $end_date])->sum('paid');
    $due = Order::where('order_status','Completed')->where('customer_id',$customer)->whereBetween('order_date', [$start_date, $end_date])->sum('due');
     
    if ($data->isEmpty()) {
        $notification = array(
            'message' => 'No data found for '.$start_date.' To '.$end_date.'.',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    $pdf = Pdf::loadView('report.by_customer', compact('start_date', 'end_date', 'data','customerName','income','due'))->setPaper('a4');

    return $pdf->stream('by_product.pdf'); 
}





}

