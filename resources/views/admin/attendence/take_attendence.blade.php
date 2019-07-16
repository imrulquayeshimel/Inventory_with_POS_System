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
                       <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Take Attendence</h3>
                                        <h3 class="text-primary" align="center">Today {{ date("d F y") }}</h3>
                                         <a href="{{ route('all.attendence') }}" class="btn btn-sm btn-info pull-right">All Attendence</a><hr>
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
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table  class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Image</th>
                                                            <th>Attendence</th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>

                                                    <form action="{{ url('/insert-attendence') }}" method="post"> 	
                                                    	@csrf 
                                                        @foreach($emp as $employee)
                                                        <tr>
                                                            <td>{{ $employee->name }}</td>
                                                            <td><img src="{{ $employee->photo }}" style="height: 80px; width: 100px;"></td>
                                                           
                                                           <input type="hidden" name="emp_id[]" value="{{ $employee->id }}">
                                                       <td>
                                                          <input  type="radio" name="attendence[{{ $employee->id }}]" value="present" required="" >Present
                                                          <input type="radio" name="attendence[{{ $employee->id }}]" value="absent">Absent
                                                       </td>

                                                       <input type="hidden" name="att_date" value="{{ date("d-m-y") }}">
                                                         <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                                       <input type="hidden" name="month" value="{{ date("F") }}">

                                                        </tr>

                                                        @endforeach

                                                   
                                                    </tbody>
                                                </table>

                                              <button type="submit" class="btn btn-success pull-right">Take Attendence</button> 

                                                 </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>

                 </div>
       
             </div>
       </div>          
                   



@endsection