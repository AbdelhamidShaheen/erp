
@extends('layouts.dashboard')
@section('title')
ERP - Dashboard
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="clearfix"></div>
        </div>

      

    </div>

@endsection

@section('maincontent')
<div class="row">
   

    
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> employee details</h3>
            </div>

            <div class="card-body">



                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name :</label>
                                {{$employee->first_name." ".$employee->last_name}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email :</label>
                                {{$employee->email}}
                            </div>
                        </div>
                       
                    </div>

                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone :</label>
                                {{$employee->phone}}
                            </div>
                        </div>

                      
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Company :</label>
                                {{$employee->company->name}}
                            </div>
                        </div>
                       
                    </div>
                   
        
                   
                    <div style="width: 100%" class="d-flex justify-content-end">
                        @can("edit employee")
                        <a href="{{ route('employees.edit', ['employee'=>$employee->id]) }}" class="btn btn-warning m-1">edit</a>

                        @endcan
                        @can("delete employee")
                        <form action="{{  route('employees.destroy', ['employee'=>$employee->id])  }}" method="POST"  class="d-inline-block m-1">
                            @csrf
    
                            @method("DELETE")
    
                            <button type="submit" class="btn btn-danger">delete</button>
    
                        </form>
                        @endcan
                                
                     
                    </div>

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->



   

<!-- end row -->







  



@endsection



