
@extends('layouts.dashboard')
@section('title')
ERP - Add Company
@endsection
@section('breadcrumb')

    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Add Company</li>
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
                <h3>ADD COMPANY</h3>
               
            </div>
          
            <div class="card-body">

                <form autocomplete="off" action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Name" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" autocomplete="off" >
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label >Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>                      
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Website</label>
                        <input type="text" class="form-control"  name="website" placeholder="Url">
                    </div>
                   
                
                    <button type="submit" class="btn btn-primary">Supmit</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>
   
</div>






  



@endsection



