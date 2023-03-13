@extends('layouts.stap.app')
@section('content')

<div id="appCapsule">
    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <div class="input-group">
                                    <input id="tanggalAwal" type="text" class="form-control datepicker start_date" name="tanggal_awal" placeholder="Tanggal Awal">
                                    <div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4  col-md-4">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <div class="input-group">
                                    <input id="tanggalAkhir" type="text" name="tanggal_akhir" placeholder="Tanggal Akhir" class="form-control datepicker end_date">
                                    <div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 justify-content-between">
                        <button id="tampilkan" type="button" class="btn btn-danger mt-1 btn-sortir"><ion-icon name="checkmark-outline" role="img" class="md hydrated" aria-label="checkmark outline"></ion-icon>Tampilkan</button>
                        <button id="printPage" class="btn btn-warning mt-1"><ion-icon name="print-outline" role="img" class="md hydrated" aria-label="print outline"></ion-icon> Cetak</button>
                        <button id="btnClear" type="button" class="btn btn-success mt-1 btn-clear"><ion-icon name="repeat-outline" role="img" class="md hydrated" aria-label="repeat outline"></ion-icon> Clear</button>
                    </div>  
                </div>
            </div>
        </div>
    </div>
<div class="section mt-2">
    <div class="section-title">Data Absensi</div>
    <div class="card">
        <div class="card">
            <div class="table-responsive" id="x-data-table">
                
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
<div class="row">
  <div class="col-md-3">
    <p>Hadir : <span class="badge badge-success">{{ $data['hadir'] }}</span></p>
  </div>

  <div class="col-md-3">
    <p>Terlambat : <span class="label badge badge-danger">{{ $data['terlambat'] }}</span></p>
  </div>
  

  <div class="col-md-3">
    <p>Sakit : <span class="badge badge-warning">{{ $data['sakit'] }}</span></p>
  </div>

  <div class="col-md-3">
    <p>Izin : <span class="badge badge-info">{{ $data['cuty'] }}</span></p>
  </div>
</div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('assets/stap') }}/js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">

    var page  = 1;
    var tanggalAwal = '';
    var tanggalAkhir = '';

    $(document).ready(function() {
        loadData();
        $('#tampilkan').click(function() {
            filterData();
        });

        $('#btnClear').click(function() {
            $('input').val('');
            filterData();
        });

        $('#printPage').click(function() {
            printPage();
        });
        $('.photo-pulang').magnificPopup({
    type: 'image'
    // other options
        });
    });

    function filterData(){
       tanggalAwal = $('#tanggalAwal').val();
       tanggalAkhir =  $('#tanggalAkhir').val();
       loadData();
    }

    async function loadData() {
        var param = {
            method: 'GET',
            url: '{{ url()->current() }}',
            data: {
                load: 'table',
                page: page,
                tanggal_awal: tanggalAwal,
                tanggal_akhir: tanggalAkhir,
            }
        }

        await transAjax(param).then(function(result) {
            $('#x-data-table').html(result)
        }).catch((err) => {
            console.log('Internal Server Error!');
        });
    }

    function loadPaginate(to) {
        page = to
        filterData()
    }

    $(".datepicker").datepicker({
        format: "dd-mm-yyyy",
        "autoclose": true
    });

    function printPage(){
        var tanggalAwal = $('#tanggalAwal').val();
        var tanggalAkhir = $('#tanggalAkhir').val();
        window.location.href = "/stap/history/print?tanggal_awal="+tanggalAwal+"&tanggal_akhir="+tanggalAkhir;
    }

</script>
@endpush