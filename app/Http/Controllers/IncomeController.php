<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statement;
use App\Models\Income;
use Carbon\Carbon;
use Str;
class IncomeController extends Controller
{
    public function IncomeList(){
        $income = Income::latest()->get();
        return view('income.income_list',compact('income'));

    }

    public function IncomeStore(Request $request) {

        $lastStatement = Statement::orderBy('id', 'desc')->first();
        $lastBalance = $lastStatement ? $lastStatement->balance : 0;
      
        $incomeUUID = Str::uuid()->toString();
        
             // Create a new Income record
        $income = new Income();
        $income->uuid = $incomeUUID;
        $income->date = now()->format('Y-m-d');
        $income->amount = $request->amount;
        $income->description = $request->description;
        $income->save();
      
        $statementUUID = Str::uuid()->toString();
        $newBalance = $lastBalance + $request->amount;
        // Create a new statement record
        $statement = new Statement();
        $statement->uuid = $statementUUID;
        $statement->transaction_date = now()->format('Y-m-d');
        $statement->transaction_description = $request->description;
        $statement->credit = $request->amount;
        $statement->debit = 0; // Assuming no debit for fee payment
        $statement->balance = $newBalance; // Update balance as new due amount
        $statement->save();
    
        $notification = array(
            'toastr' => 'Income Saved Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }

    public function IncomeDetail($uuid){
        $details = Income::where('uuid', $uuid)->firstOrFail();
        return view('income.details',compact('details'));
    }

    public function IncomeUpdate(Request $request,$id){

        $Income= Income::find($id);

        $Income->update($request->all());
        $notification = array(
            'toastr' => 'Income Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }// End Method

    public function IncomeDelete($id){

        // Fetch the Income to get the amount before deleting
        $Income = Income::findOrFail($id);
    
        // Fetch the last balance from the statements table
        $lastStatement = Statement::orderBy('id', 'desc')->first();
        $lastBalance = $lastStatement ? $lastStatement->balance : 0;
    
        // Calculate the new balance
        $newBalance = $lastBalance - $Income->amount; 
    
       
        $statement = new Statement();
        $statement->transaction_date = Carbon::now()->format('Y-m-d');
        $statement->transaction_description = 'Deleted Income';
        $statement->debit = $Income->amount;
        $statement->credit = 0; // Assuming no debit for deleting Income
        $statement->balance = $newBalance; // Update balance as new amount
        $statement->save();
    
        // Delete the Income
        $Income->delete();
    
        $notification = array(
            'toastr' => 'Income Cancelled Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('income.list')->with($notification);
    }
}
