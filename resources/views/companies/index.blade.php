
@extends('layouts.dashboard')
@section('title')
ERP - Companies
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Companies</li>
            </ol>
            <div class="clearfix"></div>
        </div>

      

    </div>

@endsection

@section('maincontent')

@if ($errors->any())
<div class="alert alert-danger " style="width: 100%">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">


    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
        @can("create company")
        <div style="width: 100%" class="d-flex justify-content-start">
            <a href="{{ route('companies.create') }}" class="btn btn-primary mb-1">Add New</a>
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
                                <th>logo</th>
                                <th>website</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies  as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>
                                    <img src="{{ asset('/storage').'/'.$company->logo}}" class="img-circle" style="width: 30px; height: 30px;">
                                </td> 
                                <td>
                                    {{$company->website}}
                                </td>
                                <td>
                                    @can("view company")
                                    <a href="{{ route('companies.show', ['company'=>$company->id]) }}" class="btn btn-primary">view</a>

                                    @can("edit company")
                                    <a href="{{ route('companies.edit', ['company'=>$company->id]) }}" class="btn btn-warning">edit</a>

                                    @endcan
                                    @can("delete company")
                                    <form action="{{  route('companies.destroy', ['company'=>$company->id]) }}" method="POST"  class="d-inline-block">
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







  



@endsection



