<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="material/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="material/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Aplikasi Pembayaran TK Muslimat NU 15 Al Munib| Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <!-- Bootstrap core CSS     -->
    <link href="material/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="material/assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="material/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="material/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="material/assets/css/google-roboto-300-700.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            @include('layout.headerlogin')

            @yield('navbarlogin')
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        @yield('content')
    </div>
</body>

<!--   Core JS Files   -->
<script src="material/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="material/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="material/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="material/assets/js/material.min.js" type="text/javascript"></script>
<script src="material/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="material/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="material/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="material/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="material/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="material/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="material/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="material/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="material/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="material/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="material/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="material/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="material/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="material/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="material/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="material/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="material/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="material/assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

@stack('scripts')
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
</html>