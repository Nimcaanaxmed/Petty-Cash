<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\Exam;
use App\Models\SchoolSubject;
use App\Models\Attendance;
use App\Models\Fees;
use App\Models\ExamType;
use App\Models\Expense;
use App\Models\Salary;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
class ReportController extends Controller
{
    public function ExamReportView(){
        $classes = StudentClass::latest()->get();
        $students = User::where('role','Student')->latest()->get();
        $subjects = SchoolSubject::latest()->get();
        $examType = ExamType::latest()->get();
        return view('report.exam_report_view',compact('students','classes','subjects','examType'));
    }

  
    public function ClassExamReport(Request $request){

        $class = $request->class_id;
        $subject = $request->subject_id;

        $classData = StudentClass::where('id', $class)->select('name')->first();
        $className = $classData->name;
        $subjectData = SchoolSubject::where('id', $subject)->select('name')->first();
        $subjectName = $subjectData->name;
    
        // Get the pass mark for the subject
        $assignSubject = DB::table('assign_subjects')
                            ->where('class_id', $class)
                            ->where('subject_id', $subject)
                            ->first();
    
        if (!$assignSubject) {
            $notification = array(
                'toastr' => 'No subject found for selected class and subject',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $data = Exam::where('class_id', $class)->where('subject_id', $subject)->get();
    
        if ($data->isEmpty()) {
            $notification = array(
                'toastr' => 'No exam found for selected class and subject',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $pdf = Pdf::loadView('report.by_class', compact('data', 'class', 'subject', 'assignSubject','className','subjectName'))->setPaper('a4');
    
        return $pdf->stream('by_class.pdf');
    }
    public function StudentExamReport(Request $request){

        $student = $request->student_id;
        $subject = $request->subject_id;

        $studentData = User::where('id', $student)->select('name')->first();
        $studentName = $studentData->name;

        $subjectData = SchoolSubject::where('id', $subject)->select('name')->first();
        $subjectName = $subjectData->name;
    
        // Get the pass mark for the subject
        $assignSubject = DB::table('assign_subjects')
                            ->where('subject_id', $subject)
                            ->first();
    
        if (!$assignSubject) {
            $notification = array(
                'toastr' => 'No subject found for selected class and subject',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $data = Exam::where('student_id', $student)->where('subject_id', $subject)->get();
    
        if ($data->isEmpty()) {
            $notification = array(
                'toastr' => 'No exam found for selected class and subject',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $pdf = Pdf::loadView('report.by_student', compact('data', 'subject', 'assignSubject','studentName','subjectName'))->setPaper('a4');
    
        return $pdf->stream('by_student.pdf');
    }


public function StudentAllExamReport(Request $request)
{
    $student = $request->student_id;

    $studentData = User::where('id', $student)->select('name')->first();
    $studentName = $studentData->name;

    // Get the pass mark for the subject
    $assignSubject = DB::table('assign_subjects')->first();

    if (!$assignSubject) {
        $notification = [
            'toastr' => 'No subject found for selected class and subject',
            'alert-type' => 'warning'
        ];
        return redirect()->back()->with($notification);
    }

    $data = Exam::where('student_id', $student)->get()->groupBy('exam_type_id');

    if ($data->isEmpty()) {
        $notification = [
            'toastr' => 'No exam found for selected student',
            'alert-type' => 'warning'
        ];
        return redirect()->back()->with($notification);
    }

    $pdf = Pdf::loadView('report.all_student_exams', compact('data', 'studentName', 'assignSubject'))->setPaper('a4');

    return $pdf->stream('all_student_exams.pdf');
}





    public function StudentByExamTypeReport(Request $request){

        $student = $request->student_id;
        $examType = $request->exam_type_id;

        $studentData = User::where('id', $student)->select('name')->first();
        $studentName = $studentData->name;

        $examTypeData = ExamType::where('id', $examType)->select('name')->first();
        $examTypeName = $examTypeData->name;

          // Get the pass mark for the subject
          $assignSubject = DB::table('assign_subjects')
          ->first();

            if (!$assignSubject) {
            $notification = array(
            'toastr' => 'No subject found for selected class and subject',
            'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
            }

        $data = Exam::where('student_id', $student)->where('exam_type_id', $examType)->get();
    
        if ($data->isEmpty()) {
            $notification = array(
                'toastr' => 'No exam found for selected student',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $pdf = Pdf::loadView('report.by_exam_type', compact('data', 'studentName','assignSubject','examTypeName'))->setPaper('a4');
    
        return $pdf->stream('by_exam_type.pdf');
    }







    // Attendance Report View



    public function AttendanceReportView(){
        $classes = StudentClass::latest()->get();
        $students = User::where('role','Student')->latest()->get();
        return view('report.attendance.report_view',compact('students','classes'));
    }

    public function AttendanceByStudent(Request $request){

        $student = $request->student_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $studentData = User::where('id', $student)->select('name','class_id')->first();
        $studentName = $studentData->name;
        $className = $studentData->class->name;
    
        $data = Attendance::where('student_id', $student)->whereBetween('date', [$start_date, $end_date])->get();
        $totalAbsent = Attendance::where('student_id', $student)->where('attend_status', 'absent')->whereBetween('date', [$start_date, $end_date])->count();
        $totalLeave = Attendance::where('student_id', $student)->where('attend_status', 'leave')->whereBetween('date', [$start_date, $end_date])->count();
        $totalPresent = Attendance::where('student_id', $student)->where('attend_status', 'present')->whereBetween('date', [$start_date, $end_date])->count();
    
        if ($data->isEmpty()) {
            $notification = array(
                'toastr' => 'No attendance found for selected student',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $pdf = Pdf::loadView('report.attendance.by_student', compact('data', 'start_date', 'end_date','studentName','className','totalAbsent','totalLeave','totalPresent'))->setPaper('a4');
    
        return $pdf->stream('attend_by_student.pdf');
    }


    public function AttendanceByClass(Request $request){

        $class = $request->class_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $classData = StudentClass::where('id', $class)->select('name')->first();
        $className = $classData->name;
    
        $data = Attendance::where('class_id', $class)->whereBetween('date', [$start_date, $end_date])->get();
        $totalAbsent = Attendance::where('class_id', $class)->where('attend_status', 'absent')->whereBetween('date', [$start_date, $end_date])->count();
        $totalLeave = Attendance::where('class_id', $class)->where('attend_status', 'leave')->whereBetween('date', [$start_date, $end_date])->count();
        $totalPresent = Attendance::where('class_id', $class)->where('attend_status', 'present')->whereBetween('date', [$start_date, $end_date])->count();
    
        if ($data->isEmpty()) {
            $notification = array(
                'toastr' => 'No attendance found for '.$start_date.' To: '.$end_date.'',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $pdf = Pdf::loadView('report.attendance.by_class', compact('data', 'className','start_date', 'end_date','totalAbsent','totalLeave','totalPresent'))->setPaper('a4');
    
        return $pdf->stream('attend_by_class.pdf');
    }



    // Fees Report View

    public function FeesReportView(){
        $classes = StudentClass::latest()->get();
        $students = User::where('role','Student')->latest()->get();
        return view('report.fees.report_view',compact('students','classes'));
    }


    public function FeesByClass(Request $request){

        $class = $request->class_id;
        $month = $request->month;

        $classData = StudentClass::where('id', $class)->select('name')->first();
        $className = $classData->name;
    
        $data = Fees::where('class_id', $class)->where('month', $month)->get();
        $totalPaid = Fees::where('class_id', $class)->where('month', $month)->where('status','paid')->count();
        $totalPaidAmount = Fees::where('class_id', $class)->where('month', $month)->where('status','paid')->sum('paid');
        $totalUnPaidAmount = Fees::where('class_id', $class)->where('month', $month)->where('status','unpaid')->sum('amount');
        $totalUnPaid = Fees::where('class_id', $class)->where('month', $month)->where('status','unpaid')->count();
       
        if ($data->isEmpty()) {
            $notification = array(
                'toastr' => 'No attendance found for selected class',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $pdf = Pdf::loadView('report.fees.by_class', compact('data', 'className','month','totalPaid','totalUnPaid','totalPaidAmount','totalUnPaidAmount'))->setPaper('a4');
    
        return $pdf->stream('fees_by_class.pdf');
    }


    public function FeesByStudent(Request $request){

        $student = $request->student_id;
        $start_month = $request->start_month;
        $end_month = $request->end_month;

        $studentData = User::where('id', $student)->select('name','class_id')->first();
        $studentName = $studentData->name;
        $className = $studentData->class->name;
    
        $data = Fees::where('student_id', $student)->whereBetween('month', [$start_month, $end_month])->get();
        $totalPaidMonths = Fees::where('student_id', $student)->whereBetween('month', [$start_month, $end_month])->where('status','paid')->count();
        $totalPaidAmount = Fees::where('student_id', $student)->whereBetween('month', [$start_month, $end_month])->where('status','paid')->sum('paid');
        $totalUnPaidMonths = Fees::where('student_id', $student)->whereBetween('month', [$start_month, $end_month])->where('status','unpaid')->count();
        $totalUnPaidAmount = Fees::where('student_id', $student)->whereBetween('month', [$start_month, $end_month])->where('status','unpaid')->sum('amount');
        if ($data->isEmpty()) {
            $notification = array(
                'toastr' => 'No fees found for '.$studentName.'',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    
        $pdf = Pdf::loadView('report.fees.by_student', compact('data', 'className','start_month', 'end_month','studentName','totalPaidMonths','totalPaidAmount','totalUnPaidMonths','totalUnPaidAmount'))->setPaper('a4');
    
        return $pdf->stream('fees_by_student.pdf');
    }


// Registration Report

public function RegistrationReportView(){
    $students = User::where('role','Student')->latest()->get();
    return view('report.registration.report_view',compact('students'));
}

public function AdmissionReportPdf(Request $request){

    $start_date = $request->start_date;
    $end_date = $request->end_date;

    

    $data = User::whereBetween('reg_date', [$start_date, $end_date])->get();
    
    if ($data->isEmpty()) {
        $notification = array(
            'toastr' => 'No admissions found for selected days',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    $pdf = Pdf::loadView('report.registration.admissions', compact('data','start_date','end_date'))->setPaper('a4');

    return $pdf->stream('admissions.pdf');
}
public function LeftReportPdf(Request $request){

    $start_date = $request->start_date;
    $end_date = $request->end_date;

    

    $data = User::where('status','disabled')->whereBetween('disabled_date', [$start_date, $end_date])->get();
    
    if ($data->isEmpty()) {
        $notification = array(
            'toastr' => 'No left students found for selected days',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    $pdf = Pdf::loadView('report.registration.left', compact('data','start_date','end_date'))->setPaper('a4');

    return $pdf->stream('left.pdf');
}


public function GraduatedReportPdf(Request $request){

    $start_date = $request->start_date;
    $end_date = $request->end_date;

    $data = User::where('status','graduated')->whereBetween('graduated_date', [$start_date, $end_date])->get();
    
    if ($data->isEmpty()) {
        $notification = array(
            'toastr' => 'No graduated students found for selected days',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    $pdf = Pdf::loadView('report.registration.graduated', compact('data','start_date','end_date'))->setPaper('a4');

    return $pdf->stream('graduated.pdf');
}


public function ExpenseReportView(){
    
    return view('report.expense.report_view');
}

public function ExpenseReportPdf(Request $request){

    $startDate = $request->start_date;
    $endDate = $request->end_date;

    

    $data = Expense::whereBetween('date', [$startDate, $endDate])->get();
    $totalExpense = Expense::whereBetween('date', [$startDate, $endDate])->sum('amount');
   

    if ($data->isEmpty()) {
        $notification = array(
            'toastr' => 'No Expenses data found from '.$startDate.' to '.$endDate.' ',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    $pdf = Pdf::loadView('report.expense.expense_pdf', compact('data', 'startDate', 'endDate','totalExpense'))->setPaper('a4');

    return $pdf->stream('expense_pdf.pdf');
}
    

public function SalaryReportView(){
    
    return view('report.salary.report_view');
}


public function SalaryReportPdf(Request $request){

    $startDate = $request->start_date;
    $endDate = $request->end_date;

    

    $data = Salary::whereBetween('payment_date', [$startDate, $endDate])->get();
    $totalSalary = Salary::whereBetween('payment_date', [$startDate, $endDate])->sum('net_amount');
   

    if ($data->isEmpty()) {
        $notification = array(
            'toastr' => 'No Salary data found from '.$startDate.' to '.$endDate.' ',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    $pdf = Pdf::loadView('report.salary.salary_pdf', compact('data', 'startDate', 'endDate','totalSalary'))->setPaper('a4');

    return $pdf->stream('salary_pdf.pdf');
}
    


    
}
