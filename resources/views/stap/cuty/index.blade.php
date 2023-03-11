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
                                    <input type="text" class="form-control datepicker start_date" name="start_date" placeholder="Tanggal Awal" required="">
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
                                    <input type="text" name="end_date" class="form-control datepicker end_date" placeholder="Tanggal Akhir">
                                    <div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 justify-content-between">
                        <button type="button" class="btn btn-danger mt-1 btn-sortir-cuty"><ion-icon name="checkmark-outline" role="img" class="md hydrated" aria-label="checkmark outline"></ion-icon>Tampilkan</button>
                        <button type="button" class="btn btn-success mt-1 btn-clear-cuty"><ion-icon name="repeat-outline" role="img" class="md hydrated" aria-label="repeat outline"></ion-icon> Clear</button>
                        <button type="button" class="btn btn-warning mt-1" data-toggle="modal" data-target="#modal-add"><ion-icon name="add-circle-outline" role="img" class="md hydrated" aria-label="add circle outline"></ion-icon> Tambah Cuti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-2">
        <div class="section-title">Data Permohonan Cuti</div>
        <div class="card">
            <div class="table-responsive" id="x-data-table">
                
            </div>
        </div>
    </div>
    <div class="modal fade modalbox" id="modal-add" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Tambah Permohonan Cuti</h5><a href="javascript:;" data-dismiss="modal">Close</a>
                </div>
                <div class="modal-body">
                    <form id="tambahIzin" autocomplete="off">
                        @csrf
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Nama</label>
                                <input type="hidden" name="stap_id" value="{{ auth()->guard('stap')->user()->id }}">
                                <input type="text" class="form-control" name="name" value="{{ auth()->guard('stap')->user()->name }}"  readonly="" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="label my-2">Kategori Izin</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                              <option value="1">Sakit</option>
                              <option value="2">Cuti</option>
                              <option value="3">Lainya</option>
                            </select>
                          </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Mulai Izin</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" id="cutystart" name="tanggal_awal" placeholder="09-03-2023" value="09-03-2023" required=""><div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Berakhir Izin</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" id="cutyend" name="tanggal_akhir" placeholder="09-03-2023" value="" required="">
                                    <div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="tanggal_masuk" placeholder="09-03-2023" value="" required=""><div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Jumlah Izin</label>
                                <input type="number" class="form-control" name="jumlah_izin" value="" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Keterangan</label>
                                <textarea rows="2" class="form-control cuty_description" name="keterangan" required=""></textarea><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <button id="buttonIzin" type="submit" class="btn btn-primary btn-lg btn-block mt-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modalbox" id="modal-update" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Permohonan Cuti</h5>
                    <a href="javascript:;" data-dismiss="modal">Close</a>
                </div>
                <div class="modal-body">
                    <form id="form-update-cuty" autocomplete="off">
                        <input type="hidden" id="city-id" name="cuty_id" value="" readonly="" required="">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Nama</label>
                                <input type="text" class="form-control" name="name" value="Devkh" style="background:#eee" readonly="" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Mulai Cuti</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" id="cuty-start" name="cuty_start" placeholder="09-03-2023" value="" required=""><div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Berakhir Cuti</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" id="cuty-end" name="cuty_end" placeholder="09-03-2023" value="" required=""><div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" id="date-work" name="date_work" placeholder="09-03-2023" value="" required="">
                                    <div class="input-group-addon"><ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="calendar outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Jumlah Cuti</label>
                                <input type="number" class="form-control" name="cuty_total" id="total" value="" required=""><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Keterangan</label>
                                <textarea rows="2" class="form-control cuty_description" id="cuty_description" name="cuty_description" required=""></textarea><i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <button type="submit" class="btn btn-danger btn-block btn-lg mt-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('assets/stap') }}/js/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        var page = 1;
        var tanggal_awal = '';
        var tanggal_akhir = '';

        $(document).ready(function() {
            loadTable();

            $('#tanggal_awal').change(function() {
                filterTable();
            });

            $('#tanggal_akhir').change(function() {
                filterTable();
            });

            $('#tambahIzin').submit(function (e) {
            e.preventDefault();
                $.ajax({
                    url:"/stap/cuty/store",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    beforeSend: function () { 
                        $('#buttonIzin').text('Proses...');
                    },
                    success: function (data) {
                        if (data) {
                            swal({title: 'Berhasil!', text: 'Permohonan Cuti Berhasil Dibuat', icon: 'success', timer: 2000,});
                            setTimeout(function(){ location.reload(); }, 2500);
                        } else {
                            swal({title: 'Oops!', text: data, icon: 'error', timer: 2000,});
                    }

                },
                complete: function () {
                    $('#buttonIzin').text('Simpan');
                },
                });
            });
            $(".datepicker").datepicker({
                format: "dd-mm-yyyy",
                "autoclose": true
            });
        });

        function filterTable() {
            var tanggal_awal = $('input[name=tanggal_awal]').val(); 
            var tanggal_akhir = $('input[name=tanggal_akhir]').val(); 
            loadTable();
        }

        async function loadTable() {
                var param = {
                    method: 'GET',
                    url: '{{ url()->current() }}',
                    data: {
                        load: 'table',
                        page: page,
                        tanggal_awal: tanggal_awal,
                        tanggal_akhir: tanggal_akhir,
                    }
                }

                await transAjax(param).then((result) => {
                    $('#x-data-table').html(result);
                }).catch((err) => {
                    console.log('err');
                });
            }

        function loadPaginate(to) {
            page = to
            filterTable()
        }
    </script>
@endpush