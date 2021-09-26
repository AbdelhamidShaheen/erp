
@extends('layouts.dashboard')
@section('title')
ERP - Edit Admin
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Edit Admin</li>
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
                <h3>ADD Admin</h3>

            </div>

            <div class="card-body">

                <form autocomplete="off" action="{{ route('admins.update',["admin"=>$admin->id]) }}" method="POST" >
                    @csrf
                    @method("put")
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{$admin->first_name}}" placeholder="First Name" autocomplete="off" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name"  value="{{$admin->last_name}}"  placeholder="Last Name" autocomplete="off" required>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$admin->email}}" placeholder="Email" autocomplete="off"  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Phone</label>
                            <input type="number" class="form-control"  name="phone" value="{{$admin->phone}}" placeholder="phone">
                        </div>
                </div>


                    <div class="form-group">
                        <label>sign role</label>

                        <select class="form-control" name="role" required>
                            @foreach ($roles as $role)

                            <option value="{{$role->name}}" {{$admin->hasRole($role->name)?"selected":""}}>{{$role->name}}</option>

                            @endforeach
                        </select>
                    </div>



                    <button type="submit" class="btn btn-primary">{{ trans('form.edit') }}</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>

</div>










@endsection



