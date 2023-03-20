<div class="appHeader bg-primary text-light">
    <div class="right">
        <div class="headerButton" data-toggle="dropdown" id="dropdownMenuLink" aria-haspopup="true">
            <img src="{{ asset('storage/stap/img/profile/' . auth()->guard('stap')->user()->image ) }}" alt="image" class="imaged w32">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" onclick="location.href='{{ route('stap.profile') }}';" href="{{ route('stap.profile') }}"><ion-icon size="small" name="person-outline"></ion-icon>Profil</a>
                <a class="dropdown-item" onclick="location.href='./logout';" href="./logout"><ion-icon size="small" name="log-out-outline"></ion-icon>Keluar</a>
            </div>
        </div>
    </div>
</div>