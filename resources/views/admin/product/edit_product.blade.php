@extends('layouts.app')

@section('content')



<div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                {{-- <ol class="breadcrumb pull-right">
                                    <li><a href="#"></a></li>
                                    <li class="active">Dashboard</li>
                                </ol> --}}
                            </div>

                    <div class="row">
                    	 <div class="col-md-2"></div>
                    	 <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update Product Information</h3></div>
                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif






                                    <div class="panel-body">
                                        <form action="{{ url('/update-product/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label ">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" value="{{ $edit->product_name }}" required > 
                                            </div>
                                            <div class="form-group">
                                                <label >Product Code</label>
                                                <input type="text" class="form-control" name="product_code" value="{{ $edit->product_code }}" required>
                                            </div>

                                          <div class="form-group">
                                                <label >Category</label>
                                                @php
                                                   $cat =DB::table('categories')->get();
                                                @endphp
                                               <select name="cat_id" class="form-control">
                                                     @foreach($cat as $row)
                                                     
                                                     <option value="{{ $row->id }}" <?php if($edit->cat_id == $row->id){echo "selected";} ?>  >{{ $row->cat_name }}</option>
                                                     @endforeach
                                                    
                                               </select>
                                            </div>
                                               <div class="form-group">
                                                <label >Supplier</label>
                                                @php
                                                   $sup =DB::table('suppliers')->get();
                                                @endphp
                                               <select name="sup_id" class="form-control">
                                                     @foreach($sup as $row)
                                                    
                                                     <option value="{{ $row->id }}" <?php if($edit->sup_id == $row->id){echo "selected";} ?> >{{ $row->name }}</option>
                                                     @endforeach
                                                    
                                               </select>
                                            </div>



                                            <div class="form-group">
                                                <label >Store Room</label>
                                                <input type="text" class="form-control" name="product_store_room"value="{{ $edit->product_store_room }}" required>
                                            </div>



                                          
                                            <div class="form-group">
                                                <label >Product Route</label>
                                                <input type="text" class="form-control" name="product_route" value="{{ $edit->product_route }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Buying Date</label>
                                                <input type="date" class="form-control" name="buy_date" value="{{ $edit->buy_date }}" required>
                                            </div>
                                             <div class="form-group">
                                                <label >Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{ $edit->expire_date }}">
                                            </div>
                                            <div class="form-group">
                                                <label >Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{ $edit->buying_price }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{ $edit->selling_price }}" required>
                                            </div>
                                          
                                   <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="exampleInputPassword11">New Photo</label>
                                    <input type="file"  name="product_image" accept="image/*"   onchange="readURL(this);">
                                    </div>


                                    <div class="form-group">
                                        <img src="{{ URL::to($edit->product_image) }}"  style="height: 80px; width: 80px;">
                                    <label for="exampleInputPassword11">Old Photo</label>

                                        <input type="hidden" name="old_product_image" value="{{ ($edit->product_image ) }}">    
                                    </div>

                                          
                                           
                                           
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
   

                    </div>

                 </div>
       
             </div>
       </div>          
                        <!-- End row-->


<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection