<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Setting;

class SettingController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Setting()
    {  
        $setting = DB::table('settings')->first();
        return view('admin.setting.setting',compact('setting'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateWebsite(Request $request, $id)
    {
         $validatedData = $request->validate([
        'company_name' => 'required|max:255',
        'company_address' => 'required|max:255',
        'company_email' => 'required|max:255',
        'company_mobile' => 'required',
        'company_city' => 'required|max:50',
        'company_country' => 'required',
        'company_phone' => 'required',
       
    ]);


        $data=array();
        $data['company_name']=$request->company_name;
        $data['company_address']=$request->company_address;
        $data['company_email']=$request->company_email;
        $data['company_phone']=$request->company_phone;
        $data['company_mobile']=$request->company_mobile;
        $data['company_city']=$request->company_city;
        $data['company_country']=$request->company_country;
        $data['company_zipcode']=$request->company_zipcode;
        $image=$request->company_logo;

      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/company/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['company_logo']=$image_url;
             $img=DB::table('settings')->where('id',$id)->first();
             $image_path = $img->company_logo;
             $done=unlink($image_path);
          $company=DB::table('settings')->where('id',$id)->update($data); 
         if ($company) {
                $notification=array(
                'messege'=>'Information Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['company_logo']=$oldphoto;  
          $user=DB::table('settings')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Information Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }

       //--update end---


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
}
