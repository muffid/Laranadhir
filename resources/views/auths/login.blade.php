@extends('layout.masterlogin')

@section('navbarlogin')
<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="">
            <a href="{{url('/register')}}">
                <i class="material-icons">person_add</i> Register
            </a>
        </li>
        <li class=" active ">
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
<div class="full-page login-page" filter-color="black" data-image="material/assets/img/login.jpg">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <form method="POST" action="/postlogin">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header text-center" data-background-color="rose">
                                <h4 class="card-title">Login</h4>
                            </div>
                           
                            <div class="card-content">
                                <!-- <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">First Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> -->
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email address</label>
                                        <input class="form-control" name="email" type="text" email="true" required="true" />
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Password</label>
                                        <input class="form-control" name="password" type="password" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>
                            </div>
                        </div>
                    </form>
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