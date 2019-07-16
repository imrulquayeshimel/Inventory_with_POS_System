@extends('layouts.app')

@section('content')



<div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                 <a href="{{ route('all.customer') }}" class="btn btn-sm btn-info pull-right">All Customer</a>
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
                                        <h3 class="panel-title">Add Customer</h3>

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
                                        <form action="{{ url('/insert-customer') }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label ">Customer Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="full name" required> 
                                            </div>
                                            <div class="form-group">
                                                <label >Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="enter customer email" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="phone no." required>
                                            </div>
                                            <div class="form-group">
                                                <label >Address</label>
                                                 <textarea class="form-control" rows = "5" cols = "50" name = "address" required></textarea>
                                            </div>
                                             <div class="form-group">
                                                <label ">Shop Name</label>
                                                <input type="text" class="form-control" name="shopname" placeholder="shop name" required> 
                                            </div>
                                            <div class="form-group">
                                                <label >Account Holder</label>
                                                <input type="text" class="form-control" name="account_holder" placeholder="account holder" required>
                                            </div>
                                             <div class="form-group">
                                                <label >Account No.</label>
                                                <input type="text" class="form-control" name="account_number" placeholder="account No.">
                                            </div>
                                            <div class="form-group">
                                                <label >Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" placeholder="bank name" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Bank Branch</label>
                                                <input type="text" class="form-control" name="bank_branch" placeholder="bank branch" required>
                                            </div>
                                            <div class="form-group">
                                                <label >City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" required>
                                            </div>
                                            {{--  <div class="form-group">
                                                <label >Photo</label>
                                                <input type="file" class="form-control" name="photo" placeholder="Photo" required>
                                            </div> --}}
                                             

                                              <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="exampleInputPassword11">Photo</label>
                                    <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                                </div>

                                           {{--  <div class="form-group">
                                            	<img src="" id="image">
                                                <label >Photo</label>
                                                <input type="file" class="upload" name="photo" accept="image/*" required onchange="readURL(this);">
                                            </div>
 --}}
                                           
                                           
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