@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->

            <div class="panel panel-default">
                <div class="panel-heading"><h4>Show Single Product</h4></div>


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

                    <table class="table no-borderd"> 

                       <tr>
                            <td colspan="3">
                                <img style="height: 140px; width: 150px;" src="{{ URL::to($single->product_image) }}" />
                            </td>
                        </tr>
                        <tr>
                            <td width="50px">Product Name</td>
                            <td width="1%">:</td>
                            <td>{{ $single->product_name }}</td>
                        </tr>
                        <tr>
                            <td width="50px">Category </td>
                            <td width="1%">:</td>
                            <td>{{ $single->cat_name }}</td>
                        </tr>
                         <tr>
                            <td width=50px">Supplier</td>
                            <td width="1%">:</td>
                            <td>{{ $single->name }}</td>
                        </tr>
                         <tr>
                            <td width="50px">Product Code</td>
                            <td width="1%">:</td>
                            <td>{{ $single->product_code }}</td>
                        </tr>
                         <tr>
                            <td width="50px">Store Room</td>
                            <td width="1%">:</td>
                            <td>{{ $single->product_store_room }}</td>
                          
                        </tr>
                         <tr>
                            <td width="50px">Route</td>
                            <td width="1%">:</td>
                            <td>{{ $single->product_route }}</td>
                        </tr>
                         <tr>
                            <td width="50px">Buying Date</td>
                            <td width="1%">:</td>
                            <td>{{ $single->buy_date }}</td>
                        </tr>
                         <tr>
                            <td width="50px">Expire Date</td>
                            <td width="1%">:</td>
                            <td>{{ $single->expire_date }}</td>
                        </tr>
                         <tr>
                            <td width="50px">Buying Price</td>
                            <td width="1%">:</td>
                            <td>{{ $single->buying_price }}</td>
                        </tr>
                        <tr>
                            <td width="50px">Selling</td>
                            <td width="1%">:</td>
                            <td>{{ $single->selling_price }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
       
















   

            <!-- Start Widget -->
            
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>


@endsection