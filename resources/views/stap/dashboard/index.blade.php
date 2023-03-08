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
                @if (date('H') < '10')
                    <div class="left"><span class="title"> Selamat Pagi</span>
                @elseif('H' > '15')
                    <div class="left"><span class="title"> Selamat Sore</span>
                @endif
                    <h1 class="total">{{ auth()->guard('stap')->user()->name }}</h1>
                </div>
            </div>
            <div class="wallet-footer">
                <div class="item"><a href="./absent">
                        <div class="icon-wrapper bg-primary"><ion-icon name="camera-outline"></ion-icon></div>
                        <strong>Absen</strong>
                    </a></div>
                <div class="item"><a href="./cuty">
                        <div class="icon-wrapper bg-primary"><ion-icon name="calendar-outline"></ion-icon></div>
                        <strong>Cuti</strong>
                    </a></div>
                <div class="item"><a href="./history">
                        <div class="icon-wrapper bg-success"><ion-icon name="document-text-outline"></ion-icon>
                        </div><strong>History</strong>
                    </a></div>
                <div class="item"><a href="./profile">
                        <div class="icon-wrapper bg-warning"><ion-icon name="person-outline"></ion-icon></div>
                        <strong>Profil</strong>
                    </a></div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="row mt-2">
            <div class="col-6"><a href="./absent">
                    <div class="stat-box bg-primary">
                        <div class="title text-white">Absen Masuk</div>
                        @if (isset($data['absen']['jam_masuk']))
                            <div class="value text-white">Sudah absen</div>
                        @else
                            <div class="value text-white">Belum absen</div>
                        @endif
                    </div>
                </a></div>
            <div class="col-6">
                <div class="stat-box bg-secondary">
                    <div class="title text-white">Absen Pulang</div>
                    @if (isset($data['absen']['jam_pulang']))
                            <div class="value text-white">Sudah absen</div>
                        @else
                            <div class="value text-white">Belum absen</div>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-4">
        <div class="section-title mb-1">Absensi Bulan
            <select id="getBulan" class="select select-change text-primary" name="bulan" required>
                <option value="1" {{ date('n') == '1' ? 'selected' : '' }}>Januari</option>
                <option value="2" {{ date('n') == '2' ? 'selected' : '' }}>Februari</option>
                <option value="3" {{ date('n') == '3' ? 'selected' : '' }}>Maret</option>
                <option value="4" {{ date('n') == '4' ? 'selected' : '' }}>April</option>
                <option value="5" {{ date('n') == '5' ? 'selected' : '' }}>Mei</option>
                <option value="6" {{ date('n') == '6' ? 'selected' : '' }}>Juni</option>
                <option value="7" {{ date('n') == '7' ? 'selected' : '' }}>Juli</option>
                <option value="8" {{ date('n') == '8' ? 'selected' : '' }}>Agustus</option>
                <option value="9" {{ date('n') == '9' ? 'selected' : '' }}>September</option>
                <option value="10" {{ date('n') == '10' ? 'selected' : '' }}>Oktober</option>
                <option value="12" {{ date('n') == '11' ? 'selected' : '' }}>November</option>
                <option value="12" {{ date('n') == '12' ? 'selected' : '' }}>Desember</option>
            </select><span class="text-primary">{{ date('Y') }}</span>
        </div>
    </div>
    <div class="section mt-2 mb-2">
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
    </script>
@endpush