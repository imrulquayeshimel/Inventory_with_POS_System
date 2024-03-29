@extends('layouts.app')

@section('content')

   <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Echovel</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                   
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            
                                            <div class="pull-right">
                                                <h4>Order Date <br>
                                                    <strong>{{ $order->order_date }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                   <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name: {{ $order->name }}</strong><br>
                                                      <strong>Shop Name: {{ $order->shopname }}<br></strong>
                                                      Address: {{ $order->address }}<br>
                                                      City: {{ $order->city }}<br>
                                                      Phone: {{ $order->phone }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Today Date: </strong> {{ date("l jS \of F Y ") }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                 
                                                    <p class="m-t-10"><strong>Order ID: </strong> {{ $order->id }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>sl.</th>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>

                                                            @php
                                                                $sl=1;
                                                            @endphp
                                                            @foreach($order_details as $ord)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $ord->product_name }}</td>
                                                                <td>{{ $ord->product_code }}</td>
                                                                <td>{{ $ord->quantity }}</td>
                                                                <td>{{ $ord->unitcost }}</td>
                                                                <td>{{ $ord->unitcost*$ord->quantity }}</td>
                                                             
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-9">
                                               
                                                 <h4 >Payment By: {{ $order->payment_status}}</h4>
                                                 <h4 >Pay: {{ $order->pay}}</h4>
                                                 <h4 class="text-danger" >Due: {{ $order->due}}</h4>
                                            </div>
                                            <div class="col-md-3 ">
                                                <p class="text-right"><b>Sub-total:</b> {{ $order->sub_total}}</p>
                                                <p class="text-right">VAT: {{ $order->vat}}</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{ $order->total}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                         <div class="hidden-print">
                                             <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>

                                                @if($order->order_status == 'success')
                                                @else
                                                <a href="{{ URL::to('/pos-done/'.$order->id) }}"  class="btn btn-primary waves-effect waves-light" >Done</a>
                                                @endif
                                            </div>
                                           {{--  <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>

                                                <a href="{{ URL::to('/pos-done/'.$order->id) }}"  class="btn btn-primary waves-effect waves-light" >Done</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


@endsection