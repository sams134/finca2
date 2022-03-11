<div>
    <a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-xl">
            <img class="rounded-circle" src="{{ asset('img/team/3-thumb.png') }}" alt="" />

        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
        <div class="bg-white dark__bg-1000 rounded-2 py-2">
            <a class="dropdown-item" href="#!">Colocar Estatus</a>
            <a class="dropdown-item" href="{{route('profile.show')}}">Perfil y datos</a>
            <a class="dropdown-item" href="#!">Cuentanos algo...</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../pages/user/settings.html">Configuracion</a>

            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                Salir de Sesion
            </x-jet-dropdown-link>
            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                @csrf
            </form>
        </div>
    </div>
</div>
