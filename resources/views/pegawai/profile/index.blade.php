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
                    @include('layouts.pegawai._loading_submit')
                    <button id="btn-profile" type="submit" class="btn-submit btn btn-primary mr-1 btn-lg btn-block btn-profile">Simpan</button>
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
                    @include('layouts.pegawai._loading_submit')
                    <button id="btn-password" type="submit" class="btn-submit btn btn-primary mr-1 btn-lg btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function() {
    $('#update-profile').submit(function (e) {
        loading(true);
        e.preventDefault();
            $.ajax({
                url:"/pegawai/profile/update",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () { 
                    loading(true);
                },
                success: function (data) {
                    if (data) {
                        loading(false);
                        swal({title: 'Berhasil!', text: 'Profil berhasil di perbaharui!', icon: 'success', timer: 2000,});
                    } else {
                        loading(false);
                        swal({title: 'Oops!', text: data, icon: 'error', timer: 2000,});
                }

            },
            
        });
    });

    $('#update-password').submit(function (e) {
        e.preventDefault();
        loading(true);
            $.ajax({
                url:"/pegawai/profile/update/password",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () { 
                    loading(true);
                },
                success: function (data) {
                    if (data) {
                        loading(false);
                        swal({title: 'Berhasil!', text: 'Password berhasil di perbaharui!', icon: 'success', timer: 2000,});
                        setTimeout(function(){ location.reload(); }, 2500);
                    } else {
                        loading(false);
                        swal({title: 'Oops!', text: data, icon: 'error', timer: 2000,});
                }

            },
            complete: function () {
                loading(false);
            },
        });
    });

    function loading(state) {
        if(state) {
            console.log('ok');
            $('.x-loading').removeClass('d-none');
            // $('.btn-submit').addClass('d-none');
        } else {
            console.log('err');
            $('.x-loading').addClass('d-none');
            // $('.btn-submit').removeClass('d-none');
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