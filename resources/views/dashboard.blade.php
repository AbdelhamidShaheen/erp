
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
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-danger">
            <i class="fas fa-building float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Companies</h6>
            <h1 class="m-b-20 text-white counter">{{$companiesnum}}</h1>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-purple">
            <i class="fas fa-users float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Empoyees</h6>
            <h1 class="m-b-20 text-white counter">{{$empoyeesnum}}</h1>
        </div>
    </div>  
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-danger">
            <i class="fas fa-users-cog float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Admins</h6>
            <h1 class="m-b-20 text-white counter">{{$adminsnum}}</h1>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-purple">
            <i class="far fa-newspaper float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Roles</h6>
            <h1 class="m-b-20 text-white counter">{{$rolesnum}}</h1>
        </div>
    </div> 
     <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-purple">
            <i class="far fa-newspaper float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Permission</h6>
            <h1 class="m-b-20 text-white counter">{{$permissionsnum}}</h1>
        </div>
    </div>


<!-- end row -->







  



@endsection



