@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->

            <div class="panel panel-primary">
                <div class="panel-heading"><h4 class="panel-title text-white">Show Supplier Profile</h4></div>


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
                                <img style="height: 140px; width: 150px;" src="{{ URL::to($single->photo) }}" />
                            </td>
                        </tr>
                        <tr>
                            <td width="10px">Name</td>
                            <td width="1%">:</td>
                            <td>{{ $single->name }}</td>
                        </tr>
                        <tr>
                            <td width="10px">Email</td>
                            <td width="1%">:</td>
                            <td>{{ $single->email }}</td>
                        </tr>
                         <tr>
                            <td width="10px">Phone</td>
                            <td width="1%">:</td>
                            <td>{{ $single->phone }}</td>
                        </tr>
                         <tr>
                            <td width="10px">Address</td>
                            <td width="1%">:</td>
                            <td>{{ $single->address }}</td>
                        </tr>
                        <tr>
                            <td width="10px">Supplier Type</td>
                            <td width="1%">:</td>
                            <td>{{ $single->type }}</td>
                        </tr>
                         <tr>
                            <td width="10px">Shop Name</td>
                            <td width="1%">:</td>
                            <td>{{ $single->shop }}</td>
                         
                        </tr>


                        <tr>
                            <td width="10px">Account Holder</td>
                            <td width="1%">:</td>
                            <td>{{ $single->accountholder }}</td>
                         
                        </tr>

                         <tr>
                            <td width="10px">Account No.</td>
                            <td width="1%">:</td>
                            <td>{{ $single->accountnumber }}</td>
                        </tr>
                         <tr>
                            <td width="10px">Bank Name</td>
                            <td width="1%">:</td>
                            <td>{{ $single->bankname }}</td>
                        </tr>
                         <tr>
                            <td width="10px">Bank Branch</td>
                            <td width="1%">:</td>
                            <td>{{ $single->branchname }}</td>
                        </tr>
                         <tr>
                            <td width="10px">City</td>
                            <td width="1%">:</td>
                            <td>{{ $single->city }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
       


            <!-- Start Widget -->
            
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>


@endsection