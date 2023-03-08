@extends('layouts.stap.app')
@section('content')
    <div class="appHeader bg-primary text-light">
    <div class="right">
        <div class="headerButton" data-toggle="dropdown" id="dropdownMenuLink" aria-haspopup="true"><img
                src="https://selfie.timkoding.com/sw-content/avatar.jpg" alt="image" class="imaged w32">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"><a class="dropdown-item"
                    onclick="location.href='./profile';" href="./profile"><ion-icon size="small"
                        name="person-outline"></ion-icon>Profil</a><a class="dropdown-item"
                    onclick="location.href='./logout';" href="./logout"><ion-icon size="small"
                        name="log-out-outline"></ion-icon>Keluar</a></div>
        </div>
    </div>
</div>
<div id="appCapsule">
    <div class="wallet-card">
        <div class="balance">
            @if (date('H') < '10')
            <div class="left"><span class="title"> Selamat Pagi</span>
            @elseif('H' > '15')
            <div class="left"><span class="title"> Selamat Sore</span>
            @endif
            <h1 class="total">{{ auth()->guard('stap')->user()->name }}</h1>
            </div>
            <div class="right">
                <span class="title">07 Mar 2023 </span><h4><span class="clock">10.59.22</span></h4>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="wallet-footer">
                <div class="col-md-12">
                    <input id="x-src" type="hidden" name="image">
                    <div id="results" class="webcam-capture-body text-center">
                        <div class="webcam-capture img-fluid">
                            <div class="x-selfie-img container">
                                <img class="img-fluid lazyload" data-src="{{ asset('assets') }}/stap/img/selfie.png" alt="">
                            </div>
                        </div>
                            <div class="form-group basic">
                                <button id="x-absent" class="btn btn-success btn-lg btn-block" onclick="openCamera(0)">
                                    Ambil photo selfi Anda
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
<script type="text/javascript">

var latLong = "";
var image = "";
var shutter = new Audio();

</script>

<script type="text/javascript">
function openCamera() {

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }else {
        swal({title: 'Oops!', text:'Maaf, browser Anda tidak mendukung geolokasi HTML5.', icon: 'error', timer: 3000,});
    }

    function successCallback(position) {
        setCamera();
        return latLong =  ""+ position.coords.latitude + ","+position.coords.longitude + "";
    }


    function errorCallback(error) {
        if(error.code == 1) {
            swal({title: 'Oops!', text:'Mohon untuk mengaktifkan lokasi Anda', icon: 'error', timer: 3000,});
        } else if(error.code == 2) {
            swal({title: 'Oops!', text:'Jaringan tidak aktif atau layanan penentuan posisi tidak dapat dijangkau.', icon: 'error', timer: 3000,});
        } else if(error.code == 3) {
            swal({title: 'Oops!', text:'Waktu percobaan habis sebelum bisa mendapatkan data lokasi.', icon: 'error', timer: 3000,});
        } else {
            swal({title: 'Oops!', text:'Waktu percobaan habis sebelum bisa mendapatkan data lokasi.', icon: 'error', timer: 3000,});
        }

    }

    function setCamera() {
        //set camera
        Webcam.set({
                width: 490,height: 450,
                image_format: 'jpeg',
                jpeg_quality:80,
            });

        var cameras = new Array();
        navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
            devices.forEach(function(device) {
            var i = 0;
                if(device.kind=== "videoinput"){ 
                    cameras[i]= device.deviceId;
                    i++;
                }
            });
        })

        Webcam.set('constraints',{
            width: 490,
            height: 450,
            image_format: 'jpeg',
            jpeg_quality:80,
            sourceId: cameras[0]
        });

        Webcam.attach('.webcam-capture');
        shutter.autoplay = false;
        shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : '/assets/stap/shutter.mp3';
        document.getElementById('x-absent').setAttribute('onclick', 'captureimage()');
    }
}

function captureimage() {
    shutter.play();
    Webcam.snap( function(data_uri) {
        document.getElementById('x-src').value = data_uri;
        document.getElementById('results').innerHTML = 
        `
            <img class="x-img-fluid" id="imageprev" style="border-radius: 15px" src="${data_uri}"/>;
            <div class="mt-3">
                <button onclick="absenStore()" class="btn btn-primary">Isi Absen</button>
                <button id="x-resetCamera" class="btn btn-warning">Coba Lagi</button>
            </div>
        `
        Webcam.reset();
        document.getElementById('x-resetCamera').setAttribute('onclick', 'resetCamera()');
        return image = data_uri;
    } );

}

function resetCamera()
{
    window.location.reload('/stap/absent');
}


</script>

<script type="text/javascript">
     //isi absen
    async function absenStore() {
            var param = {
                method: 'POST',
                url: '{{ route('stap.absen.store') }}',
                data: {
                    latLong: latLong,
                    image:  image,
                }
            }

            await transAjax(param).then((res) => {
                swal({text: res.message, icon: 'success', timer: 3000,}).then(() => {
                    window.location.href = '/stap/dashboard';
                });
            }).catch((err) => {
                console.log(err);
                swal({text: "Mohon Maaf Absen gagal!", icon: 'error', timer: 3000,}).then(() => {
                });
        });
    }

jQuery(function($) {
  setInterval(function() {
    var date = new Date(),
        time = date.toLocaleTimeString();
    $(".clock").html(time);
  }, 1000);
});
</script>
@endpush