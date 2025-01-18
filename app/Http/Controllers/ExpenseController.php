<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statement;
use App\Models\Expense;
use Carbon\Carbon;
use Str;
class ExpenseController extends Controller
{
    public function ExpenseList(){
        $expense = Expense::latest()->get();
        return view('expense.expense_list',compact('expense'));

    }

    public function ExpenseStore(Request $request) {

        $lastStatement = Statement::orderBy('id', 'desc')->first();
        $lastBalance = $lastStatement ? $lastStatement->balance : 0;
      
        $expenseUUID = Str::uuid()->toString();
    
        if ($request->amount > $lastBalance) {
            $notification = array(
                'toastr' => 'Insufficient balance. Your current balance is ' . number_format($lastBalance) . '. Please ensure you have enough funds to complete the transaction.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
             // Create a new expense record
        $expense = new Expense();
        $expense->uuid = $expenseUUID;
        $expense->date = now()->format('Y-m-d');
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->save();
        }
    
        $expenseStatementUUID = Str::uuid()->toString();
    
        $newBalance = $lastBalance - $request->amount;
        // Create a new statement record
        $statement = new Statement();
        $statement->uuid = $expenseStatementUUID;
        $statement->transaction_date = now()->format('Y-m-d');
        $statement->transaction_description = $request->description;
        $statement->debit = $request->amount;
        $statement->credit = 0; 
        $statement->balance = $newBalance; 
        $statement->save();
    
        $notification = array(
            'toastr' => 'Expense Saved Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }

    public function ExpenseDetail($uuid){
        $details = Expense::where('uuid', $uuid)->firstOrFail();
        return view('expense.details',compact('details'));
    }

    public function ExpenseUpdate(Request $request,$id){

        $expense= Expense::find($id);

        $expense->update($request->all());
        $notification = array(
            'toastr' => 'Expense Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }// End Method

    public function ExpenseDelete($id){

        // Fetch the expense to get the amount before deleting
        $expense = Expense::findOrFail($id);
    
        // Fetch the last balance from the statements table
        $lastStatement = Statement::orderBy('id', 'desc')->first();
        $lastBalance = $lastStatement ? $lastStatement->balance : 0;
    
        // Calculate the new balance
        $newBalance = $lastBalance + $expense->amount; // Adding expense amount to balance
    
        // Create a new statement record
        $statement = new Statement();
        $statement->transaction_date = Carbon::now()->format('Y-m-d');
        $statement->transaction_description = 'Deleted Expense';
        $statement->credit = $expense->amount;
        $statement->debit = 0; // Assuming no debit for deleting expense
        $statement->balance = $newBalance; // Update balance as new amount
        $statement->save();
    
        // Delete the expense
        $expense->delete();
    
        $notification = array(
            'toastr' => 'Expense Cancelled Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('expense.list')->with($notification);
    }
    





}
