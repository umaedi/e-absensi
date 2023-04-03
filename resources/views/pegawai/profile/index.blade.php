@extends('layouts.pegawai.app')
@section('content')
<div id="appCapsule">
    <form id="update-profile">
    <div class="section mt-3 text-center">
        <div class="avatar-section">
            <input type="file" onchange="previewImg()" id="image"  class="upload" name="image" id="avatar">
            <img  id="imgPrev" src="{{ asset('storage/pegawai/img/profile/' . $pegawai->image ) }}" alt="image" class="imaged w100 rounded"><span class="button"><ion-icon name="camera-outline" role="img" class="md hydrated" aria-label="camera outline"></ion-icon></span>
        </div>
    </div>
    <div class="section mt-2 mb-2">
        <div class="section-title">Profil</div>
        <div class="card">
            <div class="card-body">
                    @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4">NIP</label>
                            <input type="text" class="form-control" required value="{{ $pegawai->nip }}" name="nip">
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email4">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $pegawai->name }}" required="">
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="select4">Jabatan</label>
                            <input type="text" class="form-control" value="{{ $pegawai->jabatan }}" name="jabatan">
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="no_tlp">No Tlp</label>
                            <input type="text" class="form-control" value="{{ $pegawai->no_tlp }}" name="no_tlp">
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="password4">Nama OPD</label>
                            <input type="text" class="form-control" value="{{ $pegawai->opd->nama_opd }}" name="">
                        </div>
                    </div>
                    <hr>
                    <button id="btn_loading" class="btn btn-primary btn-lg btn-block d-none" type="button">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Tunggu sebentar yah...
                    </button>
                    <button id="btn_profile" type="submit" class="btn-submit btn btn-primary mr-1 btn-lg btn-block btn-profile">Simpan</button>
                </div>
            </div>
        </div>
    </form>
    <div class="section mt-2 mb-2">
        <div class="section-title">Update Password</div>
        <div class="card">
            <div class="card-body">
                <form id="update-password">
                    @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $pegawai->email }}" required>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="password">Password baru</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <hr>
                    <button id="btn_loading_password" class="btn btn-primary btn-lg btn-block d-none" type="button">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Tunggu sebentar yah...
                    </button>
                    <button id="btn_password" type="submit" class="btn-submit btn btn-primary mr-1 btn-lg btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function() {


    $('#update-profile').submit(async function absenStore(e) {

        e.preventDefault();
            var form 	= $(this)[0]; 
		    var data 	= new FormData(form);

            console.log(data);
            var param = {
                method: 'POST',
                url: '/pegawai/profile/update',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
            }

            loadingsubmit(true);
            await transAjax(param).then((res) => {
                swal({text: res.message, icon: 'success', timer: 3000,}).then(() => {
                    loadingsubmit(false);
                    window.location.href = '/pegawai/dashboard';
                });
            }).catch((err) => {
                loadingsubmit(false);
                swal({text: err.responseJSON.message, icon: 'error', timer: 3000,}).then(() => {
                window.location.href = '/pegawai/profile';
            });
        });

        function loadingsubmit(state){
            if(state) {
                $('#btn_loading').removeClass('d-none');
                $('#btn_profile').addClass('d-none');
            }else {
                $('#btn_loading').addClass('d-none');
                $('#btn_profile').removeClass('d-none');
            }
        }  
    });

    $('#update-password').submit(async function updatePassword(e) {
        e.preventDefault();

        var form 	= $(this)[0]; 
		var data 	= new FormData(form);

        var param = {
            method: 'POST',
            url: '/pegawai/profile/update/password',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
        }

        loadingsubmit(true);
        await transAjax(param).then((res) => {
        swal({text: res.message, icon: 'success', timer: 3000,}).then(() => {
            loadingsubmit(false);
            window.location.href = '/pegawai/dashboard';
        });
    }).catch((err) => {
        loadingsubmit(false);
            swal({text: err, icon: 'error', timer: 3000,}).then(() => {
            window.location.href = '/pegawai/profile';
            });
        });  
    });

    function loadingsubmit(state){
        if(state) {
            $('#btn_loading_password').removeClass('d-none');
            $('#btn_password').addClass('d-none');
        }else {
            $('#btn_loading_password').addClass('d-none');
            $('#btn_password').removeClass('d-none');
        }
    }  
 
});

function previewImg(){
        const imgPreview = document.querySelector('#imgPrev');
        const image = document.querySelector('#image');
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob; 
    }
</script>
@endpush