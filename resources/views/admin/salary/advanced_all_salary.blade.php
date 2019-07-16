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
                                        <h3 class="panel-title">All Advanced Salarey</h3>
                                        <a href="{{ route('add.Advancedsalary') }}" class="btn btn-sm btn-info pull-right">Add New</a>
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
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Salary</th>
                                                            <th>Month</th>
                                                            <th>Advanced</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($salary as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td><img src="{{ $row->photo }}" style="height: 80px; width: 100px;"></td>
                                                            <td>{{ $row->salary }}</td>
                                                        
                                                            <td>{{ $row->month }}</td>
                                                            <td>{{ $row->advanced_salary }}</td>
                                                            


                                                            <td>
                                                <a href="{{ URL::to('edit-customer/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ URL::to('delete-customer/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                <a href="{{ URL::to('view-customer/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
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