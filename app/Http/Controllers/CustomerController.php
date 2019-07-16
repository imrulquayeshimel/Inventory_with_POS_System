<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;

class CustomerController extends Controller
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

     public function addCustomer()
    {
        return view('admin.customer.add_customer');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allCustomer()
    {
        $customer = DB::table('customers')->get();
        return view('admin.customer.all_customer')->with('customer',$customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:customers|max:255',
        'phone' => 'required|max:14',
        'address' => 'required',
        'city' => 'required',
         'photo' => 'required',
       
    ]);


     $data = array();
     $data['name'] = $request->name;
     $data['email'] = $request->email;
     $data['phone'] = $request->phone;
     $data['address'] = $request->address;
     $data['shopname'] = $request->shopname;
     $data['account_holder'] = $request->account_holder;
     $data['account_number'] = $request->account_number;
     $data['bank_name'] = $request->bank_name;
     $data['bank_branch'] = $request->bank_branch;
     $data['city'] = $request->city;
     
     $image  = $request->file('photo');



       if ($image) {
         $image_name = str_random(5);
         $ext = strtolower($image->getClientOriginalExtension());
         $image_full_name =  $image_name.'.'.$ext;
         $upload_path  = 'public/customer/';
         $image_url  = $upload_path.$image_full_name;
         $success = $image->move($upload_path,$image_full_name);

         if ($success) {
             $data['photo'] = $image_url;
             $customer = DB::table('customers')
                    ->insert($data);

              if ($customer) {
                        $notification = array(
                              'messege' => ' Customer Inserted Successfully ',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewCustomer($id)
    {   

               $single = DB::table('customers')
                ->where('id',$id)
                ->first();
        

        return view('admin.customer.view_customer',compact('single'));

      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCustomer($id)
    {
        $edit =DB::table('customers')
               ->where('id',$id)
                ->first();

        return view('admin.customer.edit_customer',compact('edit'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCustomer(Request $request, $id)
    {
        
        $validatedData = $request->validate([
         'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required|max:14',
        'address' => 'required',
        'city' => 'required',
        
        
       
    ]);


     $data = array();
     $data['name'] = $request->name;
     $data['email'] = $request->email;
     $data['phone'] = $request->phone;
     $data['address'] = $request->address;
     $data['shopname'] = $request->shopname;
     $data['account_holder'] = $request->account_holder;
     $data['account_number'] = $request->account_number;
     $data['bank_name'] = $request->bank_name;
     $data['bank_branch'] = $request->bank_branch;
     $data['city'] = $request->city;
     
     $image  = $request->file('photo');


 if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/customer/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('customers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
              $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
          
       }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCustomer($id)
    {
         $delete = DB::table('customers')
                ->where('id',$id)
                ->first();

         $photo= $delete->photo;
         unlink($photo);  

         $dltuser = DB::table('customers')
                ->where('id',$id)
                ->delete();



        if ($dltuser) {
                        $notification = array(
                              'messege' => 'Customer Deleted Successfully ',
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
