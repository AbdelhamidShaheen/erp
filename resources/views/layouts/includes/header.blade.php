<link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon.png') }}">

<!-- Bootstrap CSS -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Font Awesome CSS -->
<link href="{{ asset('assets/font-awesome/css/all.css') }}" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<!-- jquery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- handle ajax call script -->
<script src="{{ asset('js/HandleAjaxCall.js') }}"></script>



<style>
    #wait {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-color: rgba(192, 192, 192, 0.5);
  background-image: url("https://i.stack.imgur.com/MnyxU.gif");
  background-repeat: no-repeat;
  background-position: center;
}
</style>
