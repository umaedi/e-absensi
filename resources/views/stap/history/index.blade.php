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
<div id="appCapsule"><div class="section mt-2"><div class="card"><div class="card-body"><div class="row text-center"><div class="col-sm-4 col-md-4"><div class="form-group basic"><div class="input-wrapper"><div class="input-group"><input type="text" class="form-control datepicker start_date" name="start_date" placeholder="Tanggal Awal" required=""><div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon></div></div></div></div></div><div class="col-sm-4  col-md-4"><div class="form-group basic"><div class="input-wrapper"><div class="input-group"><input type="text" name="end_date" class="form-control datepicker end_date" value="09-03-2023"><div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon></div></div></div></div></div><div class="col-sm-4 col-md-4 justify-content-between"><button type="button" class="btn btn-danger mt-1 btn-sortir"><ion-icon name="checkmark-outline" role="img" class="md hydrated" aria-label="checkmark outline"></ion-icon>Tampilkan</button><button type="button" class="btn btn-warning mt-1" data-toggle="modal" data-target="#modal-print"><ion-icon name="print-outline" role="img" class="md hydrated" aria-label="print outline"></ion-icon> Cetak</button><button type="button" class="btn btn-success mt-1 btn-clear"><ion-icon name="repeat-outline" role="img" class="md hydrated" aria-label="repeat outline"></ion-icon> Clear</button></div></div></div></div></div><div class="section mt-2"><div class="section-title">Data Absensi</div><div class="card"><div class="table-responsive"><div class="loaddata"><div id="swdatatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="swdatatable_length"><label>Show <select name="swdatatable_length" aria-controls="swdatatable" class="form-control input-sm"><option value="35">35</option><option value="40">40</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-6"><div id="swdatatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="swdatatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table rounded dataTable no-footer" id="swdatatable" role="grid" aria-describedby="swdatatable_info">
    <thead>
        <tr role="row"><th scope="col" class="align-middle text-center sorting_asc" width="10" tabindex="0" aria-controls="swdatatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 17.7917px;">No</th><th scope="col" class="align-middle sorting" tabindex="0" aria-controls="swdatatable" rowspan="1" colspan="1" aria-label="Tanggal: activate to sort column ascending" style="width: 179.344px;">Tanggal</th><th scope="col" class="align-middle sorting" tabindex="0" aria-controls="swdatatable" rowspan="1" colspan="1" aria-label="Absen Masuk: activate to sort column ascending" style="width: 255.406px;">Absen Masuk</th><th scope="col" class="align-middle sorting" tabindex="0" aria-controls="swdatatable" rowspan="1" colspan="1" aria-label="Absen Pulang: activate to sort column ascending" style="width: 261.969px;">Absen Pulang</th><th scope="col" class="align-middle hidden-sm sorting" tabindex="0" aria-controls="swdatatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 150.094px;">Status</th><th scope="col" class="align-middle sorting" tabindex="0" aria-controls="swdatatable" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 115.396px;">Aksi</th></tr>
    </thead>
    <tbody>
    <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr></tbody>
</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="swdatatable_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="swdatatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="swdatatable_previous"><a href="#" aria-controls="swdatatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button next disabled" id="swdatatable_next"><a href="#" aria-controls="swdatatable" data-dt-idx="1" tabindex="0">Next</a></li></ul></div></div></div></div>
<hr>
<div class="container">
<div class="row">
  <div class="col-md-3">
    <p>Hadir : <span class="badge badge-success">0</span></p>
  </div>

  <div class="col-md-3">
    <p>Terlambat : <span class="label badge badge-danger">0</span></p>
  </div>
  

  <div class="col-md-3">
    <p>Sakit : <span class="badge badge-warning">0</span></p>
  </div>

  <div class="col-md-3">
    <p>Izin : <span class="badge badge-info">0</span></p>
  </div>
</div>
</div>
<script>
  $('#swdatatable').dataTable({
    "iDisplayLength":35,
    "aLengthMenu": [[35, 40, 50, -1], [35, 40, 50, "All"]]
  });
  $('.image-link').magnificPopup({type:'image'});
</script>
</div></div></div><div class="alert alert-warning mt-2" role="alert"><ion-icon name="alert-circle-outline" role="img" class="md hydrated" aria-label="alert circle outline"></ion-icon> Untuk melihat foto absen silahkan klik pada waktu masuk/pulang</div></div><div class="modal fade action-sheet inset" id="modal-print" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Cetak / Explore</h5><a href="javascript:void(0);" class="close" style="position: absolute;right:15px;top: 10px;" data-dismiss="modal" aria-hidden="true"><ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon></a></div><div class="modal-body"><div class="action-sheet-content"><div class="form-group basic"><div class="input-wrapper"><label class="label">Pilih Tipe</label><select class="form-control custom-select type" name="type" required=""><option value="pdf">PDF</option><option value="excel">EXCEL</option></select></div></div><div class="form-group basic"><button type="button" class="btn btn-danger btn-block btn-lg mt-2 btn-print"><ion-icon name="print-outline" role="img" class="md hydrated" aria-label="print outline"></ion-icon> Cetak</button></div></div></div></div></div></div><div class="modal fade action-sheet inset" id="modal-show" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" style="z-index:10000"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Absen Tanggal <span class="status-date badge badge-success"></span></h5><a href="javascript:void(0);" class="close" style="position: absolute;right:15px;top: 10px;" data-dismiss="modal" aria-hidden="true"><ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon></a></div><div class="modal-body"><div class="action-sheet-content"><form id="update-history"><input type="hidden" name="presence_id" id="presence_id" readonly=""><div class="form-group basic"><div class="input-wrapper"><label class="label">Kehadiran</label><select class="form-control custom-select" name="present_id" id="status" required=""><option value="1">Hadir</option><option value="3">Izin</option><option value="2">Sakit</option></select></div></div><div class="form-group basic"><label class="label">Keterangan</label><div class="input-wrapper"><textarea id="information" rows="2" class="form-control" name="information" placeholder="Keterangan"></textarea></div><span class="small">Kosongkan jika tidak memberi keterangan</span></div><div class="form-group basic"><button type="submit" class="btn btn-danger btn-block btn-lg">Simpan</button></div></form></div></div></div></div></div></div>
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
                swal({text: err.responseJSON.message, icon: 'error', timer: 3000,}).then(() => {
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