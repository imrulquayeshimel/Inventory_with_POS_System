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
                             <a href="{{ route('add.expense') }}" class="btn btn-sm btn-info pull-right">Add New</a><hr><hr><hr><hr>
                             <a href="{{ route('monthly.expense') }}" class="btn btn-sm btn-info pull-right">This Month Expense</a>



              @php
                 $date= date("d-m-y");
                 $expense = DB::table('expenses')->where('date',$date)->sum('amount');
                    
              @endphp              

                    <div class="row">
                       <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Today Expense</h3>
                                        <h4>{{ date('d-m-y') }}</h4>
                                       
                                         <h4 style="text-align: center;color: red;font-size: 30px;">Total {{ $expense }} TK</h4>
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
                                                            <th>Details</th>
                                                            <th>Amount</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($today as $row)
                                                        <tr>
                                                            <td>{{ $row->details }}</td>

                                                            <td>{{ $row->amount }}</td>
                                                         <td>
                                                <a href="{{ URL::to('edit-today-expense/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                

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