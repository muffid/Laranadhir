@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Ganti Password </a>
@endsection

@section('password')
    class="active"
@endsection


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form id="RegisterValidation" class="form" method="POST" action="{{ route('change.password') }}">
                    	@csrf
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">contacts</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Ganti Password</h4>
                            <div class="form-group label-floating">
                                <label class="control-label">
                                    Password Lama
                                    <small>*</small>
                                    @error('current_password') salah @enderror
                                </label>
                                <input class="form-control" name="current_password" type="password" required="true" />
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">
                                    Password Baru
                                    <small>*</small>
                                </label>
                                <input class="form-control" name="new_password" id="registerPassword" type="password" required="true" />
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">
                                    Ulang Password
                                    <small>*</small>
                                </label>
                                <input class="form-control" name="new_confirm_password" id="registerPasswordConfirmation" type="password" required="true" equalTo="#registerPassword" />
                            </div>
                            <div class="category form-category">
                                <small>*</small> wajib diisi</div>
                            <div class="form-footer text-right">
                                <button type="submit" class="btn btn-rose btn-fill">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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