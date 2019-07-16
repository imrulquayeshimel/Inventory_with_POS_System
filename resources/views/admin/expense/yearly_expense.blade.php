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
                             <a href="{{ route('today.expense') }}" class="btn btn-sm btn-info pull-right">Today Expense</a><hr>

                    

                    <div class="row">
                       <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-danger ">{{ date("Y") }} All Expense</h3>
                                      
                                        
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
                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($yearly_expense as $row)
                                                        <tr>
                                                            <td>{{ $row->details }}</td>

                                                            <td>{{ $row->amount }}</td>
                                                      
                                                        </tr>

                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>

               @php
                 $year= date("Y");
                 $total = DB::table('expenses')->where('year',$year)->sum('amount');    
               @endphp  
               <h4 style="text-align: center;color: red;font-size: 30px;">Total {{ $total }} TK</h4>

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