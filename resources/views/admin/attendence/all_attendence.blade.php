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
                                        <h3 class="panel-title">All Attendence</h3>
                                        <a href="{{ route('take.attendence') }}" class="btn btn-sm btn-info pull-right">Take New</a>
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
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL No.</th>
                                                            <th>Name</th>
                                                            <th>Action</th>

                                                          
                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php
                                                          $sl =1;
                                                        @endphp
                                                        @foreach($all_att as $row)
                                                        <tr>
                                                            <td>{{ $sl++ }}</td>

                                                            <td>{{ $row->edit_date }}</td>
                                                         <td>
                                                <a href="{{ URL::to('edit-attenedence/'.$row->edit_date) }}" class="btn btn-sm btn-info">Edit</a>
                                                   <a href="{{ URL::to('view-attenedence/'.$row->edit_date) }}" class="btn btn-sm btn-info">View</a>
                                           

                                                            </td>
                                                        </tr>

                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>

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