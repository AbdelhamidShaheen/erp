
@extends('layouts.dashboard')
@section('title')
ERP - Add Employee
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Add Employee</li>
            </ol>
            <div class="clearfix"></div>
        </div>



    </div>

@endsection

@section('maincontent')
<div class="row">

    {{-- @if ($errors->any())


            @foreach ($errors->all() as $error)
            <div  class="alert alert-danger " style="width: 100%" >
                {{ $error }}
            </div>
            @endforeach


@endif --}}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3>ADD EMPLOYEE</h3>

            </div>

            <div class="card-body">

                <form autocomplete="off" action="{{ route('employees.store') }}" method="POST" >
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>First Name</label>

                            <input type="text" class="form-control @error('first_name')
                            is-invalid
                            @enderror" name="first_name"  placeholder="First Name" autocomplete="off"  >
                            <div class="invalid-feedback">
                                @error('first_name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control  @error('last_name')
                            is-invalid
                            @enderror" name="last_name"  placeholder="Last Name" autocomplete="off" >
                            <div class="invalid-feedback">
                                @error('last_name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email')
                            is-invalid
                            @enderror" name="email"  placeholder="Email" autocomplete="off"  >
                            <div class="invalid-feedback">
                                @error('email')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Phone</label>
                            <input type="number" class="form-control @error('phone')
                            is-invalid
                            @enderror"  name="phone" placeholder="phone">
                            <div class="invalid-feedback">
                                @error('phone')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password')
                            is-invalid
                            @enderror" name="password"  placeholder="Password" autocomplete="off" >
                            <div class="invalid-feedback">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Password Confirmation</label>
                            <input type="password" class="form-control @error('password_confirmation')
                            is-invalid
                            @enderror" name="password_confirmation "  placeholder="Password Confirmation" autocomplete="off" >
                            <div class="invalid-feedback">
                                @error('password_confirmation')
                                {{$message}}
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <label>Select Company</label>

                        <select class="form-control @error('company')
                        is-invalid
                        @enderror" name="company" >
                            @foreach ($companies as $company)

                            <option value="{{$company->id}}">{{$company->name}}</option>

                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            @error('company')
                            {{$message}}
                            @enderror
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Supmit</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>

</div>










@endsection



