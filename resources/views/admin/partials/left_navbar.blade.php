<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                 <!---- Films Navigate ---->
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#films" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-secret"></i></div>
                    Film
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="films" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route("admin.films.index") }}">List Films</a>
                        <a class="nav-link" href="{{ route("admin.kindoffilms.index") }}">List Kind OF Films</a>
                        <a class="nav-link" href="{{ route("admin.typefilms.index") }}">List Type Film</a>
                    </nav>
                </div>


                <!---- Menu Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.nationals.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                    Quốc Gia
                </a>
                <!---- Menu Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.menu.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                    Menu
                </a>

                <!---- Menu Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.banner.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                    Banner
                </a>

                <!---- User Navigate ---->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-secret"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="users" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route("admin.user.index") }}">List User</a>
                        <a class="nav-link" href="{{ route("admin.role.index") }}">List Role</a>
                    </nav>
                </div>
                 <!---- config ---->
                 <a class="nav-link collapsed" href="{{ route('admin.config.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                    Config
                </a>
                <!---- widget ---->
                <a class="nav-link collapsed" href="{{ route('admin.widget.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                    Widget
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            @if(\Illuminate\Support\Facades\Auth::check())
                {{ \Illuminate\Support\Facades\Auth::user()->email }}
            @endif
        </div>
    </nav>
</div>
