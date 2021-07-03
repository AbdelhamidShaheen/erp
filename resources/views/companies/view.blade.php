
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
                <h3><i class="far fa-user"></i> Company details</h3>
            </div>

            <div class="card-body">



                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name :</label>
                                {{$company->name}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email :</label>
                                {{$company->email}}
                            </div>
                        </div>
                       
                    </div>

                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                
                                
                                <a href="{{$company->website}}" class="btn btn-primary">View Website</a>
                            </div>
                        </div>

                      
                       
                    </div>
                   
                    <div style="width: 100%" class="d-flex justify-content-end">
                        @can("edit company")
                        <a href="{{ route('companies.edit', ['company'=>$company->id]) }}" class="btn btn-warning m-1">edit</a>

                        @endcan
                        @can("delete company")
                        <form action="{{  route('companies.destroy', ['company'=>$company->id]) }}" method="POST"  class="d-inline-block m-1">
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



    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> Logo</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="{{ asset('/storage').'/'.$company->logo}}">
                    </div>
                </div>

 

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>

<!-- end row -->







  



@endsection



