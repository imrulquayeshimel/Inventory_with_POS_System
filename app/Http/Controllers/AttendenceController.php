<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;

class AttendenceController extends Controller
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
    public function allAttendence()
    {    
        $all_att =DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get(); 

        return view('admin.attendence.all_attendence',compact('all_att'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function takeAttendence()
    {   
        $emp = DB::table('employees')->get();
        return view('admin.attendence.take_attendence',compact('emp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InsertAttendence(Request $request)
    {   

      
         $date = $request->att_date;
         $atdate = DB::table('attendences')->where('att_date',$date)->first();

         if ( $atdate) {
                  
                 $notification = array(
                              'messege' => 'Today  Attendence AlreadyTaken' ,
                               'alert-type' => 'error'
                               );
                        return redirect()->back()->with($notification);
             } else {
                 

                  foreach ($request->emp_id as $id) {

                $data[]=[
              
              "emp_id"=>$id,
              "attendence"=>$request->attendence[$id],
              "att_date" =>$request->att_date,
              "month" =>$request->month, 
              "att_year" =>$request->att_year,
              "edit_date" =>date("d_m_y")

            ];
        }

         $att = DB::table('attendences')->insert($data);
 
          if ($att) {
                        $notification = array(
                              'messege' => 'Successfully  Attendence Taken' ,
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

             }    


       


  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewAttendence($edit_date)
    {
       $date=DB::table('attendences')->where('edit_date',$edit_date)->first();
        $data = DB::table('attendences')
                ->join('employees','attendences.emp_id','employees.id')
                ->select('employees.name','employees.photo','attendences.*')
                ->where('edit_date',$edit_date)
                ->get();
      return view('admin.attendence.view_attendence',compact('data','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAttendence($edit_date)
    {    
        $date=DB::table('attendences')->where('edit_date',$edit_date)->first();
        $data = DB::table('attendences')
                ->join('employees','attendences.emp_id','employees.id')
                ->select('employees.name','employees.photo','attendences.*')
                ->where('edit_date',$edit_date)
                ->get();
      return view('admin.attendence.edit_attendence',compact('data','date'));
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAttendence(Request $request)
    {
         
           foreach ($request->id as $id) {
            $data=[
                "attendence"=>$request->attendence[$id],
                "att_date" =>$request->att_date,
                "att_year" =>$request->att_year,
                "month" =>$request->month
            ];

            $attendence= Attendence::where(['att_date' =>$request->att_date, 'id'=>$id])->first();
            $attendence->update($data);
        }
         if ($attendence) {
                 $notification=array(
                 'messege'=>'Successfully Attendence Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.attendence')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
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
}
