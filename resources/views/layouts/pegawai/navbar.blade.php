<div class="appHeader bg-primary text-light">
    <div class="right">
        <div class="headerButton" data-toggle="dropdown" id="dropdownMenuLink" aria-haspopup="true">
            <img src="{{ asset('storage/pegawai/img/profile/' . auth()->guard('pegawai')->user()->image ) }}" alt="image" class="imaged w32">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" onclick="location.href='{{ route('pegawai.profile') }}';" href="{{ route('pegawai.profile') }}"><ion-icon size="small" name="person-outline"></ion-icon>Profil</a>
                <a class="dropdown-item" onclick="location.href='./logout';" href="./logout"><ion-icon size="small" name="log-out-outline"></ion-icon>Keluar</a>
            </div>
        </div>
    </div>
</div>