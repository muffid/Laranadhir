@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Data Sekolah </a>
@endsection

@section('sekolah')
    class="active"
@endsection


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="/data_sekolah/store" class="form-horizontal">
                    	@csrf
                        <div class="card-header card-header-text" data-background-color="orange">
                            <h4 class="card-title">Data Sekolah</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Kepala Sekolah</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="kepsek" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">NIP</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nip" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Nama Sekolah</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="sekolah" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Alamat</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea name="alamat" class="form-control" rows="2"required="true">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Provinsi</label>
                                <div class="col-sm-10">
                                    <select name="province" id="province" class="form-control">
						                <option value="">== Pilih Provinsi ==</option>
						                @foreach ($provinces as $id => $name)
						                    <option value="{{ $id }}">{{ $name }}</option>
						                @endforeach
						            </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Kabupaten</label>
                                <div class="col-sm-10">
                                    <select name="city" id="city" class="form-control" >
						                <option value="">== Pilih Kabupaten ==</option>
						            </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select name="district" id="district" class="form-control">
						                <option value="">== Pilih Kecamatan ==</option>
						            </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select name="village" id="village" class="form-control">
						                <option value="">== Pilih Kelurahan ==</option>
						            </select>
                                </div>
                            </div>                                                       
                            <div class="row">
                                <label class="col-sm-2 label-on-left"></label>
                                <div class="col-sm-10">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-rose">Simpan</button>
                                    </div>
                                </div>
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
$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $('#province').on('change', function () {
        $.ajax({
            url: '{{ route('kabupaten') }}',
            method: 'GET',
            data: {id: $(this).val()},
            success: function (response) {
                $('#city').empty();

                $.each(response, function (id, name) {
                    $('#city').append(new Option(name, id))
                })
            }
        })
    });

    $('#city').on('change', function () {
        $.ajax({
            url: '{{ route('kecamatan') }}',
            method: 'GET',
            data: {id: $(this).val()},
            success: function (response) {
                $('#district').empty();

                $.each(response, function (id, name) {
                    $('#district').append(new Option(name, id))
                })
            }
        })
    });

    $('#district').on('change', function () {
        $.ajax({
            url: '{{ route('desa') }}',
            method: 'GET',
            data: {id: $(this).val()},
            success: function (response) {
                $('#village').empty();

                $.each(response, function (id, name) {
                    $('#village').append(new Option(name, id))
                })
            }
        })
    });
});
</script>
@endpush