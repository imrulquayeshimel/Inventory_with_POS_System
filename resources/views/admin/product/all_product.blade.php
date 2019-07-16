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
                                        <h3 class="panel-title">All Product</h3>
                                         <a href="{{ route('add.product') }}" class="btn btn-sm btn-info pull-right">Add New</a>
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
                                                            <th>Product Code</th>
                                                            <th>Image</th>
                                                            <th>Selling Price</th>
                                                            <th>Store Room</th>
                                                            <th>Route</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($product as $row)
                                                        <tr>
                                                              <td>{{ $row->product_name }}</td>
                                                            <td>{{ $row->product_code }}</td>
                                                            <td><img src="{{ $row->product_image }}" style="height: 80px; width: 100px;"></td>
                                                            <td>{{ $row->selling_price }}</td>
                                                            <td>{{ $row->product_store_room }}</td>
                                                            <td>{{ $row->product_route }}</td>

                                                            <td>
                                                <a href="{{ URL::to('edit-product/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ URL::to('delete-product/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                <a href="{{ URL::to('view-product/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
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