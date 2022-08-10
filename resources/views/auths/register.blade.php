@extends('layout.masterlogin')

@section('navbarlogin')
<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="active ">
            <a href="{{url('/register')}}">
                <i class="material-icons">person_add</i> Register
            </a>
        </li>
        <li class=" ">
            <a href="{{url('/logins')}}">
                <i class="material-icons">fingerprint</i> Login
            </a>
        </li>
        <!-- <li class="">
            <a href="lock.html">
                <i class="material-icons">lock_open</i> Lock
            </a>
        </li> -->
    </ul>
</div>
@endsection

@section('content')
<div class="full-page register-page" filter-color="black" data-image="material/assets/img/register.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-md-offset-4 col-sm-offset-3">
                <div class="card card-signup">
                    <h2 class="card-title text-center">Register</h2>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <form class="form" method="POST" action="/postregister">
                                @csrf
                                <div class="card-content">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <input type="text" name="name" class="form-control" required="true" placeholder="Nama...">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i> 
                                        </span>
                                        <input class="form-control" name="email" type="email" required="true" placeholder="Email..."/>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input type="password" name="password" required="true" placeholder="Password..." class="form-control" />
                                    </div>
                                    <!-- If you want to add a checkbox to this form, uncomment this code -->
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" checked> I agree to the
                                            <a href="#something">terms and conditions</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button class="btn btn-primary btn-round" type="submit">Get Started</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
            </nav>
            <p class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="http://www.creative-tim.com/">Creative Tim</a>
            </p>
        </div>
    </footer>
</div>
@endsection