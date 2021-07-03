
@extends('layouts.dashboard')
@section('title')
ERP - Roles
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Roles</li>
            </ol>
            <div class="clearfix"></div>
        </div>

      

    </div>

@endsection

@section('maincontent')
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
        @can("create role")
        <div style="width: 100%" class="d-flex justify-content-start">
            <a href="{{ route('roles.create') }}" class="btn btn-primary mb-1">Add New</a>
        </div>        
        @endcan
     
      

        <div class="card mb-3">


            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                               
                                <th>name</th>
                                <th>setting</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles  as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                              
                                <td>
                                    @can("view role")
                                    <a href="{{ route('roles.show', ['role'=>$role->id]) }}" class="btn btn-primary">view</a>

                                    @endcan
                                    @can("edit role")
                                    <a href="{{ route('roles.edit', ['role'=>$role->id]) }}" class="btn btn-warning">edit</a>

                                    @endcan
                                    @can("delete role")
                                    <form action="{{   route('roles.destroy', ['role'=>$role->id])  }}" method="POST"  class="d-inline-block">
                                        @csrf
                                        @method("delete")

                                        <button type="submit" class="btn btn-danger">delete</button>

                                    </form>
                                    @endcan
                                
                                  
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



