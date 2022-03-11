<ul class="nav flex-column">
    <li class="nav-item">
        @auth
        <a class="nav-link text-dark sidebar-name"><img src="/img/nono-logo.png" class="img" alt=""> NONÔ FC</a>
        @endauth
        @guest
        <a class="nav-link text-dark sidebar-name">Convidado</a>
        @endguest
    </li>

    @include('layouts.menu')
    
</ul>


