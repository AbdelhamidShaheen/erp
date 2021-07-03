
@extends('layouts.dashboard')
@section('title')
ERP - Admins
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Admins</li>
            </ol>
            <div class="clearfix"></div>
        </div>

      

    </div>

@endsection

@section('maincontent')
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
        <div style="width: 100%" class="d-flex justify-content-start">
            <a href="{{ route('admins.create') }}" class="btn btn-primary mb-1">Add New</a>
        </div>
      

        <div class="card mb-3">


            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                               
                                <th>name</th>
                                <th>email</th>
                                <th>role</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{$admin->first_name." ".$admin->last_name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                    @foreach ($admin->getRoleNames() as $role)
                                    <span>{{$role}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admins.show', ['admin'=>$admin->id]) }}" class="btn btn-primary">view</a>
                                    <a href="{{ route('admins.edit', ['admin'=>$admin->id]) }}" class="btn btn-warning">edit</a>
                                    <form action="{{ route('admins.destroy', ['admin'=>$admin->id]) }}" method="POST" class="d-inline-block" >
                                        @csrf

                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">delete</button>

                                    </form>
                                </td>
                              
                            </tr>
                            @endforeach
                         

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive-->

              
              <div style="width: 100%" class="d-flex justify-content-center">
                {{$paginator->links()}}
            </div>
            </div>
            <!-- end card-body-->

        </div>
        <!-- end card-->

    </div>
      
   
 
   


<!-- end row -->







  



@endsection



