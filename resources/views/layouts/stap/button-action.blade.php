<div class="appBottomMenu"><a href="{{ route('stap.dashboard') }}" class="item {{ Request::is('stap/dashboard') ? 'active' : '' }}">
    <div class="col"><ion-icon name="home-outline"></ion-icon><strong>Home</strong></div>
</a><a href="absent" class="item {{ Request::is('stap/absent') ? 'active' : '' }}">
    <div class="col"><ion-icon name="camera-outline"></ion-icon><strong>Absen</strong></div>
</a><a href="./cuty" class="item {{ Request::is('stap/cuty') ? 'active' : '' }}">
    <div class="col"><ion-icon name="calendar-outline"></ion-icon><strong>Izin</strong></div>
</a><a href="./history" class="item {{ Request::is('stap/history') ? 'active' : '' }}">
    <div class="col"><ion-icon name="document-text-outline"></ion-icon><strong>History</strong></div>
</a><a href="{{ route('stap.profile') }}" class="item {{ Request::is('stap/profile') ? 'active' : '' }}">
    <div class="col"><ion-icon name="person-outline"></ion-icon><strong>Profil</strong></div>
</a>
</div>