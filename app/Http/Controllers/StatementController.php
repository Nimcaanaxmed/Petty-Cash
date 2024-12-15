<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statement;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
class StatementController extends Controller
{
    public function StatementView(){

        // Fetch the last balance from the statements table
        $lastStatement = Statement::orderBy('id', 'desc')->first();
        $lastBalance = $lastStatement ? $lastStatement->balance : 0;
        return view('statement.statement_view',compact('lastBalance'));

    }




    public function TransactionHistory(Request $request) {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
    
        // Filter transactions based on the date range
        $transactions = Statement::whereBetween('transaction_date', [$startDate, $endDate])->get();
        $totalCredit = Statement::whereBetween('transaction_date', [$startDate, $endDate])->sum('credit');
        $totalDebit = Statement::whereBetween('transaction_date', [$startDate, $endDate])->sum('debit');
    
        // Calculate the last balance in the filtered transactions
        $lastBalance = $transactions->last() ? $transactions->last()->balance : 0;

        if ($transactions->isEmpty()) {
            $notification = array(
                'toastr' => 'No Transactions found for '.$startDate.' - '.$endDate.'',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    
        // Generate the PDF
        $pdf = Pdf::loadView('statement.transaction_history', compact('transactions', 'startDate', 'endDate', 'lastBalance','totalCredit','totalDebit'))->setPaper('a4','landscape');
    
        return $pdf->stream('transaction_history.pdf');
    }
}
