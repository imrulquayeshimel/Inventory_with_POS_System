@extends('layouts.app')

@section('content')



<div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                 <a href="{{ route('all.supplier') }}" class="btn btn-sm btn-info pull-right">All Supplier</a>
                                {{-- <ol class="breadcrumb pull-right">
                                    <li><a href="#"></a></li>
                                    <li class="active">Dashboard</li>
                                </ol> --}}
                            </div>

                    <div class="row">
                    	 <div class="col-md-2"></div>
                    	 <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update Supplier</h3></div>
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
                                        <form action="{{ url('/update-supplier/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                           <div class="form-group">
                                                <label ">Supplier Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $edit->name }}" required> 
                                            </div>
                                            <div class="form-group">
                                                <label >Email</label>
                                                <input type="email" class="form-control" name="email"value="{{ $edit->email }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $edit->phone }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Address</label>
                                                 <textarea class="form-control" rows = "5" cols = "50" name = "address" required>{{ $edit->address }}</textarea>
                                            </div>
                                             <div class="form-group">
                                                <label ">Shop Name</label>
                                                <input type="text" class="form-control" name="shop"value="{{ $edit->shop }}" required> 
                                            </div>
                                            <div class="form-group">
                                                <label >Account Holder</label>
                                                <input type="text" class="form-control" name="accountholder" value="{{ $edit->accountholder }}" required>
                                            </div>
                                             <div class="form-group">
                                                <label >Account No.</label>
                                                <input type="text" class="form-control" name="accountnumber" value="{{ $edit->accountnumber }}">
                                            </div>
                                            <div class="form-group">
                                                <label >Bank Name</label>
                                                <input type="text" class="form-control" name="bankname" value="{{ $edit->bankname }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Bank Branch</label>
                                                <input type="text" class="form-control" name="branchname" value="{{ $edit->branchname }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label >City</label>
                                                <input type="text" class="form-control" name="city" value="{{ $edit->city }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Supplier Type</label>
                                                <select name="type" class="form-control">


                                                    <option value="{{ $edit->type }}">{{ $edit->type }}</option>    

                                                     {{-- <option disabled="" selected="">---Chose supplier type--- </option>
                                                     <option value="dridtibutor">Dridtibutor</option>
                                                     <option value="wholeseller">Whole Seller</option>
                                                     <option value="marketer">Marketer</option> --}}
                                                </select>
                                           
                                            </div>
                                        

                                 <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="exampleInputPassword11">Photo</label>
                                    <input type="file"  name="photo" accept="image/*"   onchange="readURL(this);">
                                </div>
                                  <div class="form-group">
                                    <img  src="{{ URL::to($edit->photo ) }}" style="height: 90px;width: 90px;" />
                                    <input type="hidden" name="old_photo" value="{{ ($edit->photo ) }}">
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