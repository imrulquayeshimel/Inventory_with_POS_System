<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['price'] = $request->price;
        $add = Cart::add($data);
        if ($add) {
                        $notification = array(
                              'messege' => 'Add Card Successfully ',
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
    public function UpdateCart(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId,$qty);
        if ($update) {
                        $notification = array(
                              'messege' => ' Card update Successfully ',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RemoveCart($rowId)
    {
        $remove = Cart::remove($rowId);
         if ($remove) {
                        $notification = array(
                              'messege' => ' Card Remove Successfully ',
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



    public function CreateInvoice(Request $request)
    {  

      $request->validate([
        'cus_id' => 'required', 
    ],[
        'cus_id.required' => 'Select A Customer First!'
    ]);

       $cus_id = $request->cus_id;
       $customer = DB::table('customers')->where('id',$cus_id)->first();
       $contents = Cart::content();


       return view('admin.invoice.invoice',compact('customer','contents'));
    }

 

 public function FinalInvoice(Request $request)
 {
      $data=array();
      $data['customer_id']=$request->customer_id;
      $data['order_date']=$request->order_date;
      $data['order_status']=$request->order_status;
      $data['total_products']=$request->total_products;
      $data['sub_total']=$request->sub_total;
      $data['vat']=$request->vat;
      $data['total']=$request->total;
      $data['payment_status']=$request->payment_status;
      $data['pay']=$request->pay;
      $data['due']=$request->due;

      $order_id=DB::table('orders')->insertGetId($data);
      $contents=Cart::content();
      $odata=array();
      foreach ($contents as $content) {
         $odata['order_id']=$order_id;
         $odata['product_id']=$content->id; 
         $odata['quantity']=$content->qty;
         $odata['unitcost']=$content->price;
         $odata['total']=$content->total;

         $insert=DB::table('orderdetails')->insert($odata);

      }

      if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Invoice Created | Please delever the products and accept status',
                 'alert-type'=>'success'
                  );
                 Cart::destroy();
                return Redirect()->route('home')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error exeption!',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }

 }

}

