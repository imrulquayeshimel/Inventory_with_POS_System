<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;

class SupplierController extends Controller
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
    public function allSupplier()
    {
        $supplier = DB::table('suppliers')->get();
        return view('admin.supplier.all_supplier')->with('supplier',$supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSupplier()
    {
         
         return view('admin.supplier.add_supplier');
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
        'email' => 'required|unique:suppliers|max:255',
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
     $data['shop'] = $request->shop;
     $data['accountholder'] = $request->accountholder;
     $data['accountnumber'] = $request->accountnumber;
     $data['bankname'] = $request->bankname;
     $data['branchname'] = $request->branchname;
     $data['city'] = $request->city;
     $data['type'] = $request->type;





     $image  = $request->file('photo');

       if ($image) {
         $image_name = str_random(5);
         $ext = strtolower($image->getClientOriginalExtension());
         $image_full_name =  $image_name.'.'.$ext;
         $upload_path  = 'public/supplier/';
         $image_url  = $upload_path.$image_full_name;
         $success = $image->move($upload_path,$image_full_name);

         if ($success) {
             $data['photo'] = $image_url;
             $customer = DB::table('suppliers')
                    ->insert($data);

              if ($customer) {
                        $notification = array(
                              'messege' => 'Employee Supplier Successfully ',
                               'alert-type' => 'success'
                               );
                        return redirect()->route('all.supplier')->with($notification);
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
    public function viewSupplier($id)
    {
         $single = DB::table('suppliers')
                ->where('id',$id)
                ->first();
        

        return view('admin.supplier.view_supplier',compact('single'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSupplier($id)
    {
        $edit =DB::table('suppliers')
               ->where('id',$id)
                ->first();

        return view('admin.supplier.edit_supplier',compact('edit'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSupplier(Request $request, $id)
    {
         $validatedData = $request->validate([
      'name' => 'required|max:255',
       
        'phone' => 'required|max:14',
        'address' => 'required',
        'city' => 'required',
       
       
       
    ]);


     $data['name'] = $request->name;
     $data['email'] = $request->email;
     $data['phone'] = $request->phone;
     $data['address'] = $request->address;
     $data['shop'] = $request->shop;
     $data['accountholder'] = $request->accountholder;
     $data['accountnumber'] = $request->accountnumber;
     $data['bankname'] = $request->bankname;
     $data['branchname'] = $request->branchname;
     $data['city'] = $request->city;
     $data['type'] = $request->type;
     $image  = $request->file('photo');


  if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/supplier/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('suppliers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.supplier')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.supplier')->with($notification);                      
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
    public function deleteSupplier($id)
    {
        $delete = DB::table('suppliers')
                ->where('id',$id)
                ->first();

         $photo= $delete->photo;
         unlink($photo);  

         $dltuser = DB::table('suppliers')
                ->where('id',$id)
                ->delete();



        if ($dltuser) {
                        $notification = array(
                              'messege' => 'Supplier Deleted Successfully ',
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
