@extends('layouts.app')

@section('content')



<div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                
                           
                            </div>

                    <div class="row">
                    	 <div class="col-md-2"></div>
                    	 <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Product Import</h3>

                                    </div>

                                 <a href="{{ route('export') }}" class="btn btn-sm btn-danger pull-right">Download Xlsx</a>


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
                                        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                           
                                            <div class="form-group">
                                                <label >Xlsx File Import</label>
                                                <input type="file"  name="import_file"  required>
                                            </div>
                                           
                                           
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Upload</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->

                                 <div class="container">
                                     
                                 <strong class="container text-danger">Please download the xlsx file and clear it | now you write your all products by listing and import it again |thank you. </strong>
                                 </div>


                            </div> <!-- col-->
   

                    </div>

                 </div>
       
             </div>
       </div>          
                        <!-- End row-->




@endsection