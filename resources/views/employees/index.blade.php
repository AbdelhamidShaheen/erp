
@extends('layouts.dashboard')
@section('title')
ERP - Employees
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Employees</li>
            </ol>
            <div class="clearfix"></div>
        </div>



    </div>

@endsection

@section('maincontent')
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
        @can("create employee")
        <div style="width: 100%" class="d-flex justify-content-start">
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-1">Add New</a>
        </div>
        @endcan



        <div class="card mb-3">


            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>

                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>company</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees  as $employee)
                            <tr>
                                <td>{{$employee->first_name." ".$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>
                                    {{$employee->phone}}
                                </td>
                                <td>
                                    {{$employee->company->name}}
                                </td>
                                <td>
                                    @can("view employee")
                                    <a href="{{ route('employees.show', ['employee'=>$employee->id]) }}" class="btn btn-primary">view</a>

                                    @endcan
                                    @can("edit employee")
                                    <a href="{{ route('employees.edit', ['employee'=>$employee->id]) }}" class="btn btn-warning">edit</a>

                                    @endcan
                                    @can("delete employee")
                                    <form action="{{  route('employees.destroy', ['employee'=>$employee->id])  }}" method="POST"  class="d-inline-block">
                                        @csrf

                                        @method("DELETE")

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
<script>

handleFormCall("form",function(success,element){
 if(success){
 element.parent().parent().remove();
}
   });
   </script>








@endsection



