<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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
    public function allProduct()
    {    
        $product = DB::table('products')->get();    
         return view('admin.product.all_product')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct()
    {
        return view('admin.product.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request)
    {
        $validatedData = $request->validate([
        'product_name' => 'required|max:255',
        'cat_id' => 'required',
        'sup_id' => 'required',
        'product_code' => 'required|unique:products|max:255',
        'product_store_room' => 'required',
         'product_route' => 'required',
         'buying_price' => 'required',
         'selling_price' => 'required',
        
       
    ]);

          $data = array();
          $data['product_name'] = $request->product_name;
          $data['cat_id'] = $request->cat_id;
          $data['sup_id'] = $request->sup_id;
          $data['product_code'] = $request->product_code;
          $data['product_store_room'] = $request->product_store_room;
          $data['product_route'] = $request->product_route;
          $data['buy_date'] = $request->buy_date;
          $data['expire_date'] = $request->expire_date;
          $data['buying_price'] = $request->buying_price;
          $data['selling_price'] = $request->selling_price;
       
           $image  = $request->file('product_image');



       if ($image) {
         $image_name = str_random(5);
         $ext = strtolower($image->getClientOriginalExtension());
         $image_full_name =  $image_name.'.'.$ext;
         $upload_path  = 'public/products/';
         $image_url  = $upload_path.$image_full_name;
         $success = $image->move($upload_path,$image_full_name);

         if ($success) {
             $data['product_image'] = $image_url;
             $customer = DB::table('products')
                    ->insert($data);

              if ($customer) {
                        $notification = array(
                              'messege' => ' Product Inserted Successfully ',
                               'alert-type' => 'success'
                               );
                        return redirect()->route('all.product')->with($notification);
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
    public function viewProduct($id)
    {    $single = DB::table('products')
                 ->join('categories','products.cat_id','categories.id')
                 ->join('suppliers','products.sup_id','suppliers.id')
                 ->select('categories.cat_name','products.*','suppliers.name')
                ->where('products.id',$id)
                ->first();
        
        return view('admin.product.view_product',compact('single'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {   
        $edit =DB::table('products')
               ->where('id',$id)
                ->first();
        return view('admin.product.edit_product',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        
          $data = array();
          $data['product_name'] = $request->product_name;
          $data['cat_id'] = $request->cat_id;
          $data['sup_id'] = $request->sup_id;
          $data['product_code'] = $request->product_code;
          $data['product_store_room'] = $request->product_store_room;
          $data['product_route'] = $request->product_route;
          $data['buy_date'] = $request->buy_date;
          $data['expire_date'] = $request->expire_date;
          $data['buying_price'] = $request->buying_price;
          $data['selling_price'] = $request->selling_price;
          $image  = $request->file('product_image');


 if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/products/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['product_image']=$image_url;
             $img=DB::table('products')->where('id',$id)->first();
             $image_path = $img->product_image;
             $done=unlink($image_path);
          $product=DB::table('products')->where('id',$id)->update($data); 
         if ($product) {
                $notification=array(
                'messege'=>'Products Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.product')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
              $oldphoto=$request->old_product_image;
         if ($oldphoto) {
          $data['product_image']=$oldphoto;  
          $user=DB::table('products')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Product Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.product')->with($notification);                      
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
    public function deleteProduct($id)
    {
         $delete = DB::table('products')
                ->where('id',$id)
                ->first();

         $photo= $delete->product_image;
         unlink($photo);  

         $dltproduct = DB::table('products')
                ->where('id',$id)
                ->delete();



        if ($dltproduct) {
                        $notification = array(
                              'messege' => 'Product Deleted Successfully ',
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


//Product Import & Export-------
  public function importProduct()
    {

      return view('admin.product.import_product');
    }  

   

 
      public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }



    public function Import(Request $request)
    {
       $import =  Excel::import(new ProductsImport, $request->file('import_file'));
           if ($import) {
                        $notification = array(
                              'messege' => 'Product import Successfully ',
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
