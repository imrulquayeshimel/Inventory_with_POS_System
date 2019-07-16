<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;

class ExpenseController extends Controller
{   


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todayExpense()
    {   

        $date= date("d-m-y");
        // $date = date("d F Y");
        $today = DB::table('expenses')
                ->where('date',$date)
                ->get();
         return view('admin.expense.today_expense')->with('today',$today);

     // echo "<pre>";
     // print_r($today);
     // exit();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addExpense()
    {
        return view('admin.expense.add_expense');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExpense(Request $request)
    {
        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;


        $exp = DB::table('expenses')->insert($data);


              if ($exp) {
                        $notification = array(
                              'messege' => ' Expense Inserted Successfully ',
                               'alert-type' => 'success'
                               );
                        return redirect()->route('today.expense')->with($notification);
                    } else{
                          $notification = array(
                              'messege' => ' Error',
                               'alert-type' => 'success'
                               );
                        return redirect()->back()->with($notification);      
                    }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTodayExpense($id)
    {
         $tdyExp =DB::table('expenses')->where('id',$id)->first();
        return view('admin.expense.edit_today_expense',compact('tdyExp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTodayExpense(Request $request, $id)
    {
        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;


        $exp = DB::table('expenses')->where('id',$id)->update($data);


              if ($exp) {
                        $notification = array(
                              'messege' => ' Expense Updated Successfully ',
                               'alert-type' => 'success'
                               );
                        return redirect()->route('today.expense')->with($notification);
                    } else{
                          $notification = array(
                              'messege' => ' Error',
                               'alert-type' => 'success'
                               );
                        return redirect()->back()->with($notification);      
                    }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function monthlyExpense()
    {
        $month = date("F");
        $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.expense.monthy_expense',compact('monthly_expense'));
    }

    public function yearlyExpense()
    {
        $year = date("Y");
        $yearly_expense = DB::table('expenses')->where('year',$year)->get();
        return view('admin.expense.yearly_expense',compact('yearly_expense'));
    }








//single month method-------
    public function januaryExpense()
    {
         $month ="January";
        $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.january_expense',compact('monthly_expense'));
    }

     public function februaryExpense()
    {
         $month ="February";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.february_expense',compact('monthly_expense'));
    }
     public function marchExpense()
    {
         $month ="March";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.march_expense',compact('monthly_expense'));
    }
     public function aprilExpense()
    {
         $month ="April";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.april_expense',compact('monthly_expense'));
    }
     public function mayExpense()
    {
         $month ="May";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.may_expense',compact('monthly_expense'));
    }
     public function juneExpense()
    {
         $month ="June";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.june_expense',compact('monthly_expense'));
    }
     public function julyExpense()
    {
         $month ="July";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.july_expense',compact('monthly_expense'));
    }
       public function augustExpense()
    {
         $month ="August";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.august_expense',compact('monthly_expense'));
    }
       public function septemberExpense()
    {
         $month ="September";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.september_expense',compact('monthly_expense'));
    }
       public function octoberExpense()
    {
         $month ="October";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.october_expense',compact('monthly_expense'));
    }
       public function novemberExpense()
    {
         $month ="November";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.november_expense',compact('monthly_expense'));
    }
       public function decemberExpense()
    {
         $month ="December";
         $monthly_expense = DB::table('expenses')->where('month',$month)->get();
        return view('admin.monthlyexpense.december_expense',compact('monthly_expense'));
    }


}
