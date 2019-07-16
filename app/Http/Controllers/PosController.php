<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Customer;
class PosController extends Controller
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
       $product = DB::table('products')
                 ->join('categories','products.cat_id','categories.id')
                 ->select('categories.cat_name','products.*')
                ->get();
       $customer = DB::table('customers')->get();
       $categories = DB::table('categories')->get();


        return view('admin.pos.pos',compact('product','customer','categories'));
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
        //
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



    public function PendingOrder()
    {
        $pending = DB::table('orders')
                  ->join('customers','orders.customer_id','customers.id')
                  ->select('customers.name','orders.*')->where('order_status','pending')
                  ->get();

         return view('admin.order.pending_order',compact('pending'));         
    }


    public function ViewOrder($id)
    {   

        $order=DB::table('orders')
              ->join('customers','orders.customer_id','customers.id')
              ->select('customers.*','orders.*')
              ->where('orders.id',$id)
              ->first();
        $order_details=DB::table('orderdetails')
                      ->join('products','orderdetails.product_id','products.id')
                      ->select('orderdetails.*','products.product_name','products.product_code')
                      ->where('order_id',$id)
                      ->get();
       return view('admin.order.order_confirmation', compact('order','order_details'));
        // $order = DB::table('orders')
        //         ->join('customers','orders.customer_id','customers.id')
        //         ->select('customers.*','orders.*')
        //         ->where('orders.id',$id)
        //         ->first();
        // $order_details = DB::table('orderdetails')
        //                 ->join('products','orderdetails.product_id','products.id')
        //                 ->select('orderdetails.*','products.product_name','products.product_code')
        //                 ->where('order_id',$id)
        //                 ->get();

        //   return view('admin.order.order_confirmation',compact('order','order_details'));                      
    }


    public function PosDone($id)
    { 

         $approve=DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
         if ($approve) {
                 $notification=array(
                 'messege'=>'Successfully Order Confirmed ! And All Products Delevered',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('pending.orders')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->route('pending.orders')->with($notification);
             }
        // $approve =DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);

        //  if ($approve) {
        //                 $notification = array(
        //                       'messege' => 'Successfully Order Confirm ! and All Product Deveried',
        //                        'alert-type' => 'success'
        //                        );
        //                 return redirect()->route('pending.orders')->with($notification);
        //             } else{
        //                   $notification = array(
        //                       'messege' => ' Error',
        //                        'alert-type' => 'error'
        //                        );
        //                 return redirect()->route('pending.orders')->with($notification);      
        //             }    
    }

    public function SucessOrder()
    {
         $success = DB::table('orders')
                  ->join('customers','orders.customer_id','customers.id')
                  ->select('customers.name','orders.*')->where('order_status','success')
                  ->get();
         return view('admin.order.success_order',compact('success'));         
    }
}
