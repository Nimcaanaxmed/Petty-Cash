<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;
use App\Models\Customer;
class EmailController extends Controller
{
    public function SendEmail(){
        return view('email.send_email');
    }

    public function SendEmailSubmit(Request $request) 
    {
        
        $subject = $request->subject;
        $message = $request->comment;

        $customers = Customer::where('status',1)->get();
        foreach($customers as $item)
        {
            \Mail::to($item->email)->send(new SendEmail($subject,$message));
        }        

        $notification = array(
            'message' => ' Email Sent Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Foreach

  
}
