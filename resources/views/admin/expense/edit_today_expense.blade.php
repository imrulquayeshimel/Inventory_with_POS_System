@extends('layouts.app')

@section('content')



<div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                 <a href="{{ route('today.expense') }}" class="btn btn-sm btn-info pull-right">Today Expense</a><hr>
                                 <a href="{{ route('monthly.expense') }}" class="btn btn-sm btn-info pull-right">This Month Expense</a>

                                <h4 style="text-align: center;"> {{ date("d F Y") }} </h4>
                              
                            </div>

                    <div class="row">
                    	 <div class="col-md-2"></div>
                    	 <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title"> Update Expense</h3></div>
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
                                        <form action="{{ url('/update-expense/'.$tdyExp->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                          
                                            <div class="form-group">
                                                <label >Details</label>
                                                 <textarea class="form-control" rows = "5"  name = "details" required>
                                                     {{ $tdyExp->details }}
                                                 </textarea>
                                            </div> 
                                            <div class="form-group">
                                                <label >Amount</label>
                                                <input type="text" class="form-control" name="amount" placeholder="amount" value="{{ $tdyExp->amount }}" required>
                                            </div>
                                             <div class="form-group">
                                                <input type="hidden" class="form-control" name="date" value="{{ date("d-m-y") }}" required>
                                            </div>
                                              <div class="form-group">
                                                <input type="hidden" class="form-control" name="month" value="{{ date("F") }}" required>
                                            </div>

                                             <div class="form-group">
                                                <input type="hidden" class="form-control" name="year" value="{{ date("Y") }}" required>
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


@endsection