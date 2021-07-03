
@extends('layouts.dashboard')
@section('title')
ERP - Edit Employee
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Edit Employee</li>
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
                <h3>Edit EMPLOYEE</h3>
               
            </div>
          
            <div class="card-body">

                <form autocomplete="off" action=" {{ route('employees.update', ['employee'=>$employee->id]) }}" method="POST" >
                    @csrf
                    @method("put")
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name"  value="{{$employee->first_name}}" placeholder="First Name" autocomplete="off" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}"   placeholder="Last Name" autocomplete="off" required>
                        </div>
                      
                       
                    </div>
                   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$employee->email}}"  placeholder="Email" autocomplete="off"  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Phone</label>
                            <input type="number" class="form-control"  name="phone" value="{{$employee->phone}}"  placeholder="phone">
                        </div>
                </div>
         

                    <div class="form-group">
                        <label>Select Company</label>

                        <select class="form-control" name="company" required>
                            @foreach ($companies as $company)

                            <option value="{{$company->id}}"  {{$employee->company_id==$company->id?"selected":""}}>{{$company->name}}</option>

                            @endforeach
                        </select>
                    </div>
                
                   
                
                    <button type="submit" class="btn btn-primary">Supmit</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>
   
</div>






  



@endsection



