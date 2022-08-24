@php
    use Illuminate\Support\Facades\Auth;
    use App\Helper\Functions;
@endphp

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route("admin.user.index") }}">MY APP
        <span class="first-name">@if(Auth::check())({{ Auth::user() -> name }})@endif</span>
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(Auth::check())
                    <img style="width: 35px; border-radius: 50%"
                         src="{{ Functions::getImage("user", Auth::user() -> picture) }}">
                    <span class="first-name">{{ Auth::user() -> name }}</span>
                @endif  
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route("authAdmin.logout") }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<style>
    .first-name{
        font-size: 14px;
        opacity: .7;
    }
</style>
