@extends('layouts.app')

@section('content')


<div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                   <div class="row">
                   <div class="col-sm-12">
                   <h4 class="pull-left page-title">Welcome ! {{ date("Y") }}</h4>
                 </div>
                               
      <div>
          <a href="{{ route('january.expense') }}" class="btn btn-sm btn-primary">January</a>
          <a href="{{ route('february.expense') }}" class="btn btn-sm btn-primary">February</a>
          <a href="{{ route('march.expense') }}" class="btn btn-sm btn-primary">March</a>
          <a href="{{ route('april.expense') }}" class="btn btn-sm btn-primary">April</a>
          <a href="{{ route('may.expense') }}" class="btn btn-sm btn-primary">May</a>
          <a href="{{ route('june.expense') }}" class="btn btn-sm btn-primary">June</a>
          <a href="{{ route('july.expense') }}" class="btn btn-sm btn-primary">July<a>
          <a href="{{ route('august.expense') }}" class="btn btn-sm btn-primary">August</a>
          <a href="{{ route('september.expense') }}" class="btn btn-sm btn-primary">September</a>
          <a href="{{ route('october.expense') }}" class="btn btn-sm btn-primary">October</a>
          <a href="{{ route('november.expense') }}" class="btn btn-sm btn-primary">November</a>
          <a href="{{ route('december.expense') }}" class="btn btn-sm btn-primary">December</a>
      </div>    


                            </div>
                             <a href="{{ route('today.expense') }}" class="btn btn-sm btn-info pull-right">Today Expense</a><hr>

                    

                    <div class="row">
                       <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-danger ">{{-- {{ date("F") }} --}} All Expense of May</h3>
                                      
                                        
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
                                                            <th>Date</th>

                                                            <th>Amount</th>
                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($monthly_expense as $row)
                                                        <tr>
                                                            <td>{{ $row->details }}</td>
                                                            <td>{{ $row->date }}</td>
                                                            

                                                            <td>{{ $row->amount }}</td>
                                                      
                                                        </tr>

                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>

               @php
                 $month= "May";
                 $total = DB::table('expenses')->where('month',$month)->sum('amount');    
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