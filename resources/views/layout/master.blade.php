<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="material/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="material/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Aplikasi Pembayaran TK Muslimat NU 15 Al Munib</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('material/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('material/assets/css/material-dashboard.css')}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('material/assets/css/demo.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="{{asset('material/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('material/assets/css/google-roboto-300-700.css')}}" rel="stylesheet" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="{{asset('material/assets/img/sidebar-1.jpg')}}">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    TK Muslimat NU
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    TK+
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    @if(auth()->user()->role == 'admin')
                    <div class="photo">
                        <img src="{{asset('material/assets/img/faces/avatar.jpg')}}" />
                    </div>
                    @endif
                    @if(auth()->user()->role == 'user')
                    <div class="photo">
                        <img src="{{url('/images/'.Auth::user()->guru->foto)}}" />
                    </div>
                    @endif
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            {{Auth::user()->name}}
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <!-- <li>
                                    <a href="#">My Profile</a>
                                </li> -->
                                <li>
                                    <a href="{{url('change-password')}}">Ganti Password</a>
                                </li>
                                <li>
                                    <a href="{{url('/logouts')}}">logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @include('layout.navbar')
            </div>
        </div>
        <div class="main-panel">
            @include('layout.header')
            
            @yield('content')
            
            @include('layout.footer')
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="{{asset('material/assets/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('material/assets/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('material/assets/js/moment.min.js')}}"></script>
<!--  Charts Plugin -->
<script src="{{asset('material/assets/js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard -->
<script src="{{asset('material/assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('material/assets/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('material/assets/js/jquery.sharrre.js')}}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{asset('material/assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin -->
<script src="{{asset('material/assets/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin -->
<script src="{{asset('material/assets/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="{{asset('material/assets/js/jquery.select-bootstrap.js')}}"></script>-->
<!-- Select Plugin -->
<script src="{{asset('material/assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{asset('material/assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{asset('material/assets/js/sweetalert2.js')}}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('material/assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{asset('material/assets/js/fullcalendar.min.js')}}"></script>
<!-- TagsInput Plugin -->
<script src="{{asset('material/assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('material/assets/js/material-dashboard.js')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('material/assets/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js')}}
        demo.initDashboardPageCharts();

        demo.initVectorMap(); 
        demo.initFormExtendedDatetimepickers();
    });
</script>

<script type="text/javascript">

    function addcommas(x) {
    //remove commas
    retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

    //apply formatting
    return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>

@stack('scripts')

</html>