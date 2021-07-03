


<!DOCTYPE html>
<html lang="en">

    <head>
        <title>
            @yield('title');
        </title>
        <meta name="description" content="Dashboard | Nura Admin">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Your website">
    
        <!-- Favicon -->
        @include('layouts.includes.header')
    
   
    </head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
        <div class="headerbar">

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="#" class="logo">
                    <img alt="Logo" src="{{ asset('assets/images/logo.png') }}" />
                    <span>ERP</span>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">
                  

            


            


                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('assets/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="profile.html" class="dropdown-item notify-item">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            
                            <a class="dropdown-item notify-item"  href="{{ route('logout') }}" >
                                <i class="fas fa-sign-out-alt"></i>
                                <span >logout</span>
                            </a>
                           
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- End Navigation -->

        <!-- Left Sidebar -->
        <div class="left main-sidebar">

            <div class="sidebar-inner leftscroll">

                <div id="sidebar-menu">

                    <ul>
                        <li class="submenu">
                            <a class="active" href="{{ route('dashboard')}}">
                                <i class="fas fa-bars"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
@if (Auth::user()->hasAnyPermission(['view company','create company']))

<li class="submenu">
    <a id="tables" href="#">
        <i class="fas fa-building"></i>
        <span> Companies </span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
        @can('view company')
        <li>
            <a href="{{ route('companies.index') }}">View Companies</a>
        </li>
        @endcan
        
        @can('create company')
        <li>
            <a href="{{ route('companies.create') }}">Add Company</a>
        </li>  
        @endcan
        
    </ul>
</li> 

@endif



@if (Auth::user()->hasAnyPermission(['view employee','create employee']))
<li class="submenu">
    <a id="tables" href="#">
        <i class="fas fa-users"></i>
        <span> Employees </span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
        @can('view employee')
        <li>
            <a href="{{ route('employees.index') }}">View employees</a>
        </li>
        @endcan
        @can('create employee')
        <li>
            <a href="{{ route('employees.create') }}">Add employee</a>
        </li>
        @endcan
       
       
    </ul>
</li>
@endif
                       
                        @if (Auth::user()->hasAnyPermission(['view admin','create admin']))
    
                        <li class="submenu">
                            <a id="tables" href="#">
                                <i class="fas fa-users-cog"></i>
                                <span> Admins </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                @can('view admin')
                                <li>
                                    <a href="{{ route('admins.index') }}">View admins</a>
                                </li>
                                @endcan
                                @can('create admin')
                                <li>
                                    <a href="{{ route('admins.create') }}">Add admin</a>
                                </li>  
                                @endcan
                             
                             
                            </ul>
                        </li>
@endif 
                   

@if ((Auth::user()->hasAnyPermission(['view role','create role'])))
<li class="submenu">
    <a id="tables" href="#">
        <i class="fas fa-table"></i>
        <span> Roles </span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="list-unstyled">
        @can('view role')
        <li>
            <a href="{{ route('roles.index') }}">View roles</a>
        </li>  
        @endcan
        
        @can('create role')
        <li>
            <a href="{{ route('roles.create') }}">Add role</a>
        </li>  
        @endcan
        
    </ul>
</li> 
@endif
                  

                       

                      

                    

                     

                      

                    

                    

                    

                   

                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="clearfix"></div>

            </div>

        </div>
        <!-- End Sidebar -->

        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                       @yield('breadcrumb')
                    </div>
                    <!-- end row -->


               @yield('maincontent')
                    <!-- end row-->

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->
        {{-- @include('layouts.includes.footer') --}}


        <script src="{{ asset(' assets/js/modernizr.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>

        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/admin.js') }}"></script>

    </div>
    <!-- END main -->

    <!-- BEGIN Java Script for this page -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

    <!-- Counter-Up-->
    <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- dataTabled data -->
    <script src="{{ asset('assets/data/data_datatables.js') }}"></script>

    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <!-- Charts data -->
    <script src="{{ asset('assets/data/data_charts_dashboard.js') }}"></script>

    @include('layouts.includes.footer')
    <script>
        $(document).on('ready', function() {
            // data-tables
      

            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
            });
        });
    </script>
    <!-- END Java Script for this page -->

</body>

</html>