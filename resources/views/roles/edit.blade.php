
@extends('layouts.dashboard')
@section('title')
ERP - Edit Role
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Edit Role</li>
            </ol>
            <div class="clearfix"></div>
        </div>

      

    </div>

@endsection

@section('maincontent')
<div class="row">

    @if ($errors->any())
    <div class="alert alert-danger " style="width: 100%">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Edit Role</h3>
               
            </div>
          
            <div class="card-body">

                <form autocomplete="off" action="{{ route('roles.update', ['role'=>$role->id]) }}" method="POST" >
                    @csrf
                    @method("put")
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$role->name}}"  placeholder="Name" autocomplete="off" required>
                        </div>

                    </div>
                   
                 
                    <div class="form-row">
                       

                     
                        <label >
                            Sign Permissions
                        </label>
                        <div class="mb-1"></div>
                        <select class="form-control select2" id="example3" name="permissions[]" multiple="multiple">
                            @foreach ($permissions as $permission)
                            <option value="{{$permission->name}}"  {{$role->hasPermissionTo($permission->name)?"selected":""}}>{{$permission->name}}</option>

                            @endforeach
                        
                        </select>
                       
                    </div>

              
                    <div class="mb-1"></div>

                   
                
                    <button type="submit" class="btn btn-primary">Supmit</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>
   
</div>






  



@endsection



