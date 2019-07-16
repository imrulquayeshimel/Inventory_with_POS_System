@extends('layouts.app')

@section('content')



<div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                 <a href="{{ route('all.product') }}" class="btn btn-sm btn-info pull-right">All Product</a>
                                {{-- <ol class="breadcrumb pull-right">
                                    <li><a href="#"></a></li>
                                    <li class="active">Dashboard</li>
                                </ol> --}}
                            </div>

                    <div class="row">
                    	 <div class="col-md-2"></div>
                    	 <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add Product</h3>

                                    </div>
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
                                        <form action="{{ url('/insert-product') }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label ">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" placeholder="product name" required> 
                                            </div>
                                            <div class="form-group">
                                                <label >Product Code</label>
                                                <input type="text" class="form-control" name="product_code" placeholder="product code" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Category</label>
                                                @php
                                                   $cat =DB::table('categories')->get();
                                                @endphp
                                               <select name="cat_id" class="form-control">
                                                     @foreach($cat as $row)
                                                     
                                                     <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
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
                                                    
                                                     <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                     @endforeach
                                                    
                                               </select>
                                            </div>
                                         
                                             <div class="form-group">
                                                <label ">Store Room</label>
                                                <input type="text" class="form-control" name="product_store_room" placeholder="store room" required> 
                                            </div>
                                            <div class="form-group">
                                                <label >Product Route</label>
                                                <input type="text" class="form-control" name="product_route" placeholder="product route" required>
                                            </div>
                                             <div class="form-group">
                                                <label >Buying Date</label>
                                                <input type="date" class="form-control" name="buy_date" placeholder="buying date">
                                            </div>
                                            <div class="form-group">
                                                <label >Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" placeholder="expire date" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" placeholder="buying price" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" placeholder="selling price" required>
                                            </div>
                                           

                                              <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="exampleInputPassword11">Photo</label>
                                    <input type="file"  name="product_image" accept="image/*"  required onchange="readURL(this);">
                                </div>

                                           
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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