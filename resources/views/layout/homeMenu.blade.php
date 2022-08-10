@extends('layout.masterlogin')

@section('navbarlogin')
<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="active">
            <a href="{{url('/')}}">
                <i class="material-icons">dashboard</i> Dashboard
            </a>
        </li>
        <li class="">
            <a href="{{url('/register')}}">
                <i class="material-icons">person_add</i> Register
            </a>
        </li>
        <li >
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
<div class="full-page lock-page" filter-color="black" data-image="material/assets/img/lock.jpg">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-sm-2">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn" href="www.test.com">
                            <img src="material/assets/img/folder.png" width="60"  />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-sm-2">
                        
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