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
    <div class="section wallet-card-section pt-1">
        <div class="wallet-card">
            <div class="balance">
                @if (date('H') >= '4' && date('H') < '10')
                <div class="left"><span class="title"> Selamat Pagi</span>
                @elseif(date('H') >= '10' && date('H') < '15')
                    <div class="left"><span class="title"> Selamat Siang</span>
                @elseif(date('H') >= '15' && date('H') < '18')
                    <div class="left"><span class="title"> Selamat Sore</span>
                @else
                <div class="left"><span class="title"> Selamat Malam</span>
                @endif
                    <h1 class="total">{{ auth()->guard('stap')->user()->name }}</h1>
                </div>
                <div class="right">
                    <span class="title">{{ $data['tanggal'] }} </span><h4><span class="clock">10.59.22</span></h4>
                </div>
            </div>
            <div class="wallet-footer">
                <div class="item"><a href="./absent">
                        <div class="icon-wrapper bg-primary"><ion-icon name="camera-outline"></ion-icon></div>
                        <strong>Absen</strong>
                    </a></div>
                <div class="item"><a href="{{ route('stap.izin') }}">
                        <div class="icon-wrapper bg-primary"><ion-icon name="calendar-outline"></ion-icon></div>
                        <strong>Izin</strong>
                    </a></div>
                <div class="item"><a href="{{ route('stap.histories') }}">
                        <div class="icon-wrapper bg-success"><ion-icon name="document-text-outline"></ion-icon>
                        </div><strong>History</strong>
                    </a></div>
                <div class="item"><a href="{{ route('stap.profile') }}">
                        <div class="icon-wrapper bg-warning"><ion-icon name="person-outline"></ion-icon></div>
                        <strong>Profil</strong>
                    </a></div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="row mt-2">
            @if (empty($data['absen']['jam_masuk']))
            <div class="col-6">
                <a href="./absent">
                    <div class="stat-box bg-secondary">
                        <div class="title text-white">Absen Masuk</div>
                        <div class="value text-white">Belum absen</div>
                    </div>
                </a>
            </div>
            @else
            <div class="col-6">
                <div class="stat-box bg-primary">
                    <div class="title text-white">Absen Masuk</div>
                    <div class="value text-white">Sudah absen</div>
                </div>
            </div>
            @endif
       
            @if (empty($data['absen']['jam_pulang']))
            <div class="col-6">
                <a href="./absent">
                    <div class="stat-box bg-secondary">
                        <div class="title text-white">Absen Pulang</div>
                        <div class="value text-white">Belum absen</div>
                    </div>
                </a>
            </div>
            @else
            <div class="col-6">
                <div class="stat-box bg-primary">
                    <div class="title text-white">Absen Pulang</div>
                    <div class="value text-white">Sudah absen</div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="section mt-4">
        <div class="section-title mb-1">Absensi Bulan
            <select id="getBulan" class="select select-change text-primary" name="bulan" required>
                <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>Januari</option>
                <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>Februari</option>
                <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>Maret</option>
                <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
                <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>Mei</option>
                <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>Juni</option>
                <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>Juli</option>
                <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>Agustus</option>
                <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>September</option>
                <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>Oktober</option>
                <option value="12" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
                <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>Desember</option>
            </select><span class="text-primary">{{ date('Y') }}</span>
        </div>
    </div>
    <div class="section mt-2 mb-2">
        <div class="transactions"><div class="row"><div class="load-home" style="display:contents">
            <div class="col-6 col-md-3 mb-2">
                <a href="javascript:void(0)" class="item">
                    <div class="detail">
                        <div class="icon-block text-primary">
                            <ion-icon name="log-in" role="img" class="md hydrated" aria-label="log in"></ion-icon>
                        </div>
                        <div>
                            <strong>Hadir</strong>
                            <p>{{ $data['hadir'] }} Hari</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <a href="javascript:void(0)" class="item">
                    <div class="detail">
                        <div class="icon-block text-success">
                            <ion-icon name="person" role="img" class="md hydrated" aria-label="person"></ion-icon>
                        </div>
                        <div>
                            <strong>Izin</strong>
                            <p>0 Hari</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="javascript:void(0)" class="item">
                    <div class="detail">
                        <div class="icon-block text-secondary">
                           <ion-icon name="sad" role="img" class="md hydrated" aria-label="sad"></ion-icon>
                        </div>
                        <div>
                            <strong>Sakit</strong>
                            <p>0 Hari</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="javascript:void(0)" class="item">
                    <div class="detail">
                        <div class="icon-block text-danger">
                          <ion-icon name="alarm" role="img" class="md hydrated" aria-label="alarm"></ion-icon>
                        </div>
                        <div>
                            <strong>Terlambat</strong>
                            <p>{{ $data['terlambat'] }} hari</p>
                        </div>
                    </div>
                </a>
            </div>
            </div>
        </div>
    </div>
    <div class="section-title">1 Minggu Terakhir</div>
        <div class="card">
            <div class="table-responsive" id="x-data-table">
                
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        var bulan = "";
        $(document).ready(function() {
            loadData();

            $('#getBulan').change(function() {
                filterData();
            });
        });

        function filterData() {
            bulan = $('#getBulan').val();
            loadData();
        }

        async function loadData() {
            var param = {
                method: 'GET',
                url: '{{ url()->current() }}',
                data: {
                    load: 'table',
                    bulan: bulan,
                }
            }
            await transAjax(param).then((result) => {
                $('#x-data-table').html(result)

            }).catch((err) => {
                console.log('error');
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