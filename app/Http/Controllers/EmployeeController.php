<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class EmployeeController extends Controller
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

    public function addEmployee()
    {
    	return view('admin.employee.add_employee');
    }


//Insert Employee
 public function store(Request $request)
   {
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'phone' => 'required|max:14',
        'address' => 'required',
        'experience' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
         'photo' => 'required',
       
    ]);

     $data = array();
     $data['name'] = $request->name;
     $data['email'] = $request->email;
     $data['nid_no'] = $request->nid_no;
     $data['phone'] = $request->phone;
     $data['address'] = $request->address;
     $data['experience'] = $request->experience;
     $data['salary'] = $request->salary;
     $data['vacation'] = $request->vacation;
     $data['city'] = $request->city;
     
     $image  = $request->file('photo');


     if ($image) {
     	 $image_name = str_random(5);
     	 $ext = strtolower($image->getClientOriginalExtension());
     	 $image_full_name =  $image_name.'.'.$ext;
     	 $upload_path  = 'public/employee/';
     	 $image_url  = $upload_path.$image_full_name;
     	 $success = $image->move($upload_path,$image_full_name);

     	 if ($success) {
     	 	 $data['photo'] = $image_url;
     	 	 $employee = DB::table('employees')
     	 	        ->insert($data);

     	 	  if ($employee) {
     	 	        	$notification = array(
                              'messege' => 'Employee Inserted Successfully ',
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
     	 	
     	       }else{
     	 	      return redirect()->back();
     	       }
     	
              }else{
     	          return redirect()->back();
     	        }
             }

   //all employees here
     public function AllEmployees()
   {   
	// $employees = DB::table('employees')->get();

	   $employees = Employee::all();
	   return view('admin.employee.all_employee',compact('employees'));
	
   }


 // view a single employee information-----
   public function viewEmployee($id)
   {   
   	   // orm-----
   	   //    $single =Employee::findorfail($id);


   	   $single = DB::table('employees')
   	            ->where('id',$id)
   	            ->first();
   	    

   	    return view('admin.employee.view_employee',compact('single'));

   	          
   	   
   }



 // delete a single employee information-----
   public function deleteEmployee($id)
   {
   	    $delete = DB::table('employees')
   	            ->where('id',$id)
   	            ->first();

   	     $photo= $delete->photo;
   	     unlink($photo);  

         $dltuser = DB::table('employees')
   	            ->where('id',$id)
   	            ->delete();



        if ($dltuser) {
     	 	        	$notification = array(
                              'messege' => 'Employee Deleted Successfully ',
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


//edit single employee------

   public function editEmployee($id)
   {
   	   $edit =DB::table('employees')
   	           ->where('id',$id)
   	            ->first();

   	    return view('admin.employee.edit_employee',compact('edit'));  

    
     }








//update single employee----

    public function updateEmployee(Request $request,$id)
    {
    	    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'nid_no' => 'required|max:255',
        'phone' => 'required|max:14',
        'address' => 'required',
        'experience' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
      
       
         ]);

      $data = array();
     $data['name'] = $request->name;
     $data['email'] = $request->email;
     $data['nid_no'] = $request->nid_no;
     $data['phone'] = $request->phone;
     $data['address'] = $request->address;
     $data['experience'] = $request->experience;
     $data['salary'] = $request->salary;
     $data['vacation'] = $request->vacation;
     $data['city'] = $request->city;
     $image  = $request->photo;



 if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/employee/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('employees')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
               $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
          
       }




    }   




          
}

      
      