<!DOCTYPE html>
<html lang="{{App::getLocale()}}" dir="{{App::getLocale()=='ar'?'rtl':'ltr'}}">
<head>
    <title>Login</title>
    <meta name="description" content="Dashboard | Nura Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">

    <!-- Favicon -->
  @include('layouts.includes.header')

    <!-- BEGIN CSS for this page -->
    <!-- END CSS for this page -->
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->




                <div class="content" style="margin-top: 100px">

                <div class="container-fluid ">




                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                    <div class="row d-flex justify-content-center">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-sign-in-alt"></i> login</h3>

                                </div>

                                <div class="card-body">

                                    <form action="{{ route('PostLogin')}}" method="POST" data-parsley-validate novalidate>
                                        @csrf

                                        <div class="form-group">
                                            <label for="emailAddress">Email<span class="text-danger">*</span></label>
                                            <input type="email" name="email" data-parsley-trigger="change" required placeholder="Enter email" class="form-control" id="emailAddress">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass1">Password<span class="text-danger">*</span></label>
                                            <input id="pass1" name="password" type="password" placeholder="Password" required class="form-control">
                                        </div>






                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary" type="submit">
                                                login
                                            </button>
                                            <button type="reset" class="btn btn-secondary m-l-5">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div><!-- end card-->
                        </div>





                    </div>

                </div>
                <!-- END container-fluid -->

            </div>
        <!-- END content-page -->





        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>



    </div>
<script>

$('#form').parsley();

</script>
</body>

</html>
