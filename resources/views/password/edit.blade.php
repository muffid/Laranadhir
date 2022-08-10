@extends('layout.masterlogin')

@section('navbarlogin')
<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="{{url('/')}}">
                <i class="material-icons">dashboard</i> Dashboard
            </a>
        </li>
        <li >
            <a href="{{url('/register')}}">
                <i class="material-icons">person_add</i> Register
            </a>
        </li>
        <li class=" ">
            <a href="{{url('/logins')}}">
                <i class="material-icons">fingerprint</i> Login
            </a>
        </li>
        <li class="">
            <a href="lock.html">
                <i class="material-icons">lock_open</i> Lock
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="full-page register-page" filter-color="black" data-image="material/assets/img/register.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-md-offset-4 col-sm-offset-3">
                <div class="card card-signup">
                    <h2 class="card-title text-center">Ganti Password</h2>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <form id="RegisterValidation" class="form" method="POST" action="{{ route('change.password') }}">
                                @csrf
                                <div class="card-content">
                                	<div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input id="current_password" type="password" name="current_password" required="true" placeholder="Password Lama" class="form-control @error('current_password') is-invalid @enderror" />
	                                        @error('current_password')
									            <span class="invalid-feedback" role="alert">
									                <strong>{{ $message }}</strong>
									            </span>
									        @enderror
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input id="registerPassword" type="password" name="new_password" required="true" placeholder="Password Baru" class="form-control @error('password') is-invalid @enderror" />
	                                        @error('password')
		                                        <span class="invalid-feedback" role="alert">
		                                            <strong>{{ $message }}</strong>
		                                        </span>
		                                    @enderror
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input id="registerPasswordConfirmation" type="password" name="new_confirm_password" required="true" placeholder="Ulang Password" class="form-control" equalTo="#registerPassword" />
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button class="btn btn-primary btn-round" type="submit">Update Password</button>
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

@push('scripts')
<script type="text/javascript">
    function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }

    $(document).ready(function() {
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>
@endpush