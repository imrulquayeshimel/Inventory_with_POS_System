@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->

            <div class="panel panel-default">
                <div class="panel-heading"><h4>Show Profile</h4></div>


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
                            <td width="10px">Experience</td>
                            <td width="1%">:</td>
                            <td>{{ $single->experience }}</td>
                        </tr>
                         <tr>
                            <td width="10px">NID No.</td>
                            <td width="1%">:</td>
                            <td>{{ $single->nid_no }}</td>
                        </tr>
                         <tr>
                            <td width="10px">Salary</td>
                            <td width="1%">:</td>
                            <td>{{ $single->salary }}</td>
                        </tr>
                         <tr>
                            <td width="10px">Vacation</td>
                            <td width="1%">:</td>
                            <td>{{ $single->vacation }}</td>
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