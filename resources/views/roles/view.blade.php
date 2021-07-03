
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
                <h3><i class="far fa-user"></i> Role details</h3>
            </div>

            <div class="card-body">



                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name :</label>
                                {{$role->name}}
                            </div>
                        </div>

                
                    </div>

                    
                     
                           
                           
                           
                              
                                    <label>Permissions :</label>
                                    @foreach ($permissions as $permission)
                                    <div>{{$permission->name}}</div>
                                   
                                    @endforeach
                          
                    
                   
                    
                
                   
                    <div style="width: 100%" class="d-flex justify-content-end">
                        <a href="{{ route('roles.edit', ['role'=>$role->id]) }}" class="btn btn-warning m-1">edit</a>
                        <form action="{{  route('roles.destroy', ['role'=>$role->id]) }}" method="POST"  class="d-inline-block m-1">
                            @csrf
    
                            @method("DELETE")
    
                            <button type="submit" class="btn btn-danger">delete</button>
    
                        </form>
                    </div>
                 
                   
           

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->


<!-- end row -->







  



@endsection



