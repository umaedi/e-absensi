@extends('layouts.stap.app')
@section('content')
<div id="appCapsule">
    <form id="update-profile">
    <div class="section mt-3 text-center">
        <div class="avatar-section">
            <input type="file" onchange="previewImg()" id="image"  class="upload" name="image" id="avatar">
            <img  id="imgPrev" src="{{ asset('storage/stap/img/profile/' . $data['stap']->image ) }}" alt="image" class="imaged w100 rounded"><span class="button"><ion-icon name="camera-outline" role="img" class="md hydrated" aria-label="camera outline"></ion-icon></span>
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
                            <input type="text" class="form-control" required value="{{ $data['stap']->nip }}" readonly>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email4">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data['stap']->name }}" required="">
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="select4">Jabatan</label>
                            <input type="text" class="form-control" value="{{ $data['stap']->jabatan->nama_jabatan }}" readonly>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="password4">Dinas</label>
                            <input type="text" class="form-control" value="{{ $data['stap']->dinas->nama_dinas }}" readonly>
                        </div>
                    </div>
                    <hr>
                    <button id="btn-profile" type="submit" class="btn btn-primary mr-1 btn-lg btn-block btn-profile">Simpan</button>
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
                            <input type="email" class="form-control" name="email" value="{{ $data['stap']->email }}" required>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email4">Password baru</label>
                            <input type="password" class="form-control" name="password" id="employees_password" required="">
                        </div>
                    </div>
                    <hr>
                    <button id="btn-password" type="submit" class="btn btn-primary mr-1 btn-lg btn-block">Simpan</button>
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
        e.preventDefault();
            $.ajax({
                url:"/stap/profile/update",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () { 
                 $('#btn-profile').text('Proses...');
                },
                success: function (data) {
                    if (data) {
                        swal({title: 'Berhasil!', text: 'Profil berhasil di perbaharui!', icon: 'success', timer: 2000,});
                        setTimeout(function(){ location.reload(); }, 2500);
                    } else {
                        swal({title: 'Oops!', text: data, icon: 'error', timer: 2000,});
                }

            },
            complete: function () {
                $('#btn-profile').text('Simpan');
            },
        });
    });

    $('#update-password').submit(function (e) {
        e.preventDefault();
            $.ajax({
                url:"/stap/profile/update/password",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () { 
                 $('#btn-password').text('Proses...');
                },
                success: function (data) {
                    if (data) {
                        swal({title: 'Berhasil!', text: 'Password berhasil di perbaharui!', icon: 'success', timer: 2000,});
                        setTimeout(function(){ location.reload(); }, 2500);
                    } else {
                        swal({title: 'Oops!', text: data, icon: 'error', timer: 2000,});
                }

            },
            complete: function () {
                $('#btn-password').text('Simpan');
            },
        });
    });
    
   
});

function previewImg(){
        const imgPreview = document.querySelector('#imgPrev');
        const image = document.querySelector('#image');
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob; 
    }
</script>
@endpush