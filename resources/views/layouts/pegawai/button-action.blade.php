<div class="appBottomMenu"><a href="./dashboard" class="item {{ Request::is('pegawai/dashboard') ? 'active' : '' }}">
    <div class="col"><ion-icon name="home-outline"></ion-icon><strong>Home</strong></div>
</a><a href="absent" class="item {{ Request::is('pegawai/absent') ? 'active' : '' }}">
    <div class="col"><ion-icon name="camera-outline"></ion-icon><strong>Absen</strong></div>
</a><a href="./izin" class="item {{ Request::is('pegawai/izin') ? 'active' : '' }}">
    <div class="col"><ion-icon name="calendar-outline"></ion-icon><strong>Izin</strong></div>
</a><a href="./history" class="item {{ Request::is('pegawai/history') ? 'active' : '' }}">
    <div class="col"><ion-icon name="document-text-outline"></ion-icon><strong>History</strong></div>
</a><a href="{{ route('pegawai.profile') }}" class="item {{ Request::is('pegawai/profile') ? 'active' : '' }}">
    <div class="col"><ion-icon name="person-outline"></ion-icon><strong>Profil</strong></div>
</a>
</div>