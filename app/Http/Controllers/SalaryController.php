<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Salary;

class SalaryController extends Controller
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
    public function allAdvancedSalary()

    {   
      $salary = DB::table('advance_salaries')
                    ->join('employees','advance_salaries.emp_id','employees.id')
                    ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')  
                    ->orderBy('id','DESC')
                    ->get(); 
        return view('admin.salary.advanced_all_salary',compact('salary'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAdvancedSalary()
    {
        return view('admin.salary.advanced_add_salary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdvancedSalary(Request $request)
    {

       $month = $request->month;
       $emp_id =$request->emp_id;

       $advanced = DB::table('advance_salaries')
                  ->where('month',$month)
                  ->where('emp_id',$emp_id)
                  ->first();

          if ($advanced === NULL) {
                      
                         
             $data = array();
             $data['emp_id'] = $request->emp_id;
             $data['month'] = $request->month;
             $data['advanced_salary'] = $request->advanced_salary;
             $data['year'] = $request->year;

            $advanced = DB::table('advance_salaries')->insert($data);


              if ($advanced) {
                        $notification = array(
                              'messege' => 'Advanced Salary Paid Successfully ',
                               'alert-type' => 'success'
                               );
                        return redirect()->back()->with($notification);
                    } else{
                          $notification = array(
                              'messege' => ' Error',
                               'alert-type' => 'success'
                               );
                        return redirect()->back()->with($notification);      
                    } 

                  } else {
                      

                      $notification = array(
                              'messege' => 'oopps! Already Paid in This Month',
                               'alert-type' => 'error'
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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



    public function paySalary()
    {
        $salary = DB::table('advance_salaries')
                    ->join('employees','advance_salaries.emp_id','employees.id')
                    ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')  
                    ->orderBy('id','DESC')
                    ->get(); 

        return view('admin.salary.pay_salary',compact('salary'));

    }








}
