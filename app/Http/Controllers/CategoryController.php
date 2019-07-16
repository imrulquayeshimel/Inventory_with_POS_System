<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
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
    public function allCategory()
    {
        $cat = DB::table('categories')->get();
        return view('admin.category.all_category')->with('cat',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        return view('admin.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {

       $validatedData = $request->validate([
        'cat_name' => 'required',
       
       
    ]);




        $data = array();
        $data['cat_name'] = $request->cat_name;
        $cat = DB::table('categories')->insert($data);


          if ($cat) {
                        $notification = array(
                              'messege' => 'Category Inserted Successfully ',
                               'alert-type' => 'success'
                               );
                        return redirect()->route('all.category')->with($notification);
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
    public function editCategory($id)
    {
        $edit =DB::table('categories')
               ->where('id',$id)
                ->first();

        return view('admin.category.edit_category',compact('edit'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
        
        

        $data = array();
        $data['cat_name'] = $request->cat_name;

        $cat_up = DB::table('categories')->where('id',$id)->update($data);



          if ($cat_up) {
                        $notification = array(
                              'messege' => 'Category Updated Successfully ',
                               'alert-type' => 'success'
                               );
                        return redirect()->route('all.category')->with($notification);
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
    public function deleteCategory($id)
    {
    

         $dltcategory = DB::table('categories')
                ->where('id',$id)
                ->delete();



        if ($dltcategory) {
                        $notification = array(
                              'messege' => 'Category Deleted Successfully ',
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
