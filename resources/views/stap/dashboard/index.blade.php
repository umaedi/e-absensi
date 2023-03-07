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
                <div class="left"><span class="title"> Selamat Pagi</span>
                    <h1 class="total">Dev</h1>
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
                        <div class="value text-white">Belum absen</div>
                    </div>
                </a></div>
            <div class="col-6">
                <div class="stat-box bg-secondary">
                    <div class="title text-white">Absen Pulang</div>
                    <div class="value text-white">Belum Absen</div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-4">
        <div class="section-title mb-1">Absensi Bulan
            <select class="select select-change text-primary" required>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03" selected>Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="12">November</option>
                <option value="12">Desember</option>
            </select><span class="text-primary">2023</span>
        </div>
        <div class="transactions">
            <div class="row">
                <div class="load-home" style="display:contents"></div>
            </div>
        </div>
    </div>
    <div class="section mt-2 mb-2">
        <div class="section-title">1 Minggu Terakhir</div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-dark rounded bg-primary">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Pulang</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="appBottomMenu"><a href="./" class="item">
        <div class="col"><ion-icon name="home-outline"></ion-icon><strong>Home</strong></div>
    </a><a href="{{ route('stap.absent') }}" class="item">
        <div class="col"><ion-icon name="camera-outline"></ion-icon><strong>Absen</strong></div>
    </a><a href="./cuty" class="item">
        <div class="col"><ion-icon name="calendar-outline"></ion-icon><strong>Cuti</strong></div>
    </a><a href="./history" class="item">
        <div class="col"><ion-icon name="document-text-outline"></ion-icon><strong>History</strong></div>
    </a><a href="./profile" class="item">
        <div class="col"><ion-icon name="person-outline"></ion-icon><strong>Profil</strong></div>
    </a></div>
@endsection