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
                                        <h3 class="text-success" align="center">Update Attendence {{$date->att_date }}</h3>
                                        
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

                                                    <form action="{{ url('/update-attendence') }}" method="post"> 	
                                                    	@csrf 
                                                        @foreach($data as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td><img src="{{ URL::to($row->photo) }}" style="height: 80px; width: 100px;"></td>
                                                           
                                                       <input type="hidden" name="id[]" value="{{ $row->id }}">  
                                           <td>
                                            <input type="radio" name="attendence[{{ $row->id }}]" value="present" required="" <?php if ($row->attendence == 'present') {
                                              echo "checked";
                                            } ?>> Present

                                            <input type="radio" name="attendence[{{ $row->id }}]" value="absent" <?php if ($row->attendence == 'absent') {
                                              echo "checked";
                                            } ?>>Absence
                                           </td>
                                                          <input type="hidden" name="month" value="{{ date("F") }}">
                                                       <input type="hidden" name="att_date" value="{{ date("d-m-y") }}">
                                                         <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                                        </tr>

                                                        @endforeach

                                                   
                                                    </tbody>
                                                </table>

                                              <button type="submit" class="btn btn-success pull-right">Update Attendence</button> 

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