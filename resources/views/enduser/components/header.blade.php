<?php
    $logo = \App\Models\Config::first();

?>
<div id="header">
        <div class="container"> <a class="logo" href="index.html" title="Trang chủ - Anime Full"><img
                    src="{{ \App\Helper\Functions::getImage('config',$logo-> logo) }}" style="height:50px;wight: 60px;" alt="Anime Full, xem phim online miễn phí"
                    title="Anime Full, xem phim online miễn phí" /></a>
            <div class="search-container relative">
                <form action={{route('films.searchFilms')}} class="form-search"> <input id="keyword" name="keyword"
                        type="text" autocomplete="off" placeholder="Nhập tên phim, diễn viên..."> <i
                        class="fa fa-search" onclick="$(this).parent().submit()" style="cursor:pointer"></i>
                    <div id="suggestions" class="suggestions top-search-box" style="display: none;"></div>
                </form>
            </div>
            <ul id="menu-user">
                <li> <a href="{{ route("wishList.showWishList") }}"><span><i class="fa fa-heart-o" aria-hidden="true"></i> Thích <span
                                class="count-pc" id="count-bookmark-pc">@if(!empty($wishlist)){{ count($wishlist) }} @else 0 @endif</span> </span></a> </li>
            @if(!\Illuminate\Support\Facades\Auth::check())
                <li> <a href="{{route("auth.register")}}"><i class="fa fa-registered" aria-hidden="true"></i><span>Đăng ký</span></a> </li>
            @else
                <li> <a href="{{route("profiles.get")}}"><i class="fas fa-user-circle " style="margin-right:4px" aria-hidden="true"></i><span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span></a> </li>
            @endif                
            @if(!\Illuminate\Support\Facades\Auth::check())
                <li> <a href="{{route("auth.login")}}"><i class="fa fa-sign-in" aria-hidden="true"></i><span>Đăng nhập</span></a> </li>
            @else
                <li> <a href="{{route("auth.logout")}}"><i class="fas fa-sign-out-alt" style="margin-right:4px" aria-hidden="true"></i><span>Đăng Xuất</span></a> </li>
            @endif

            </ul>
        </div>
    </div>
    <div id="main-menu" class="main-menu desktop">
        <div class="container">
            @php
                $main_menu = Menu::get(2);
                // dd($main_menu);
            @endphp
            <ul>
                <li class="menu-home"> <a href="{{route("page.index")}}" title="Anime Full"> <i class="fa fa-home"></i> </a> </li>
                @foreach($main_menu as $menu)
                        <li><a href="{{ $menu['link'] }}" title=""> <span>  {{ $menu['label'] }}  @if( $menu['child'] )  <i
                            class="fa fa-caret-down"></i> @endif</span></a>
                            @if( $menu['child'] )
                            <ul class="sub-menu span-3 absolute" id="main-menuz">
                                @foreach( $menu['child'] as $child )
                                <li class="menu-item"><a href="{{ $child['link'] }} " title="{{ $child['label'] }}">{{ $child['label'] }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
            </ul>
        </div>
    </div>
    </div>
    <div class="jsx-3084556328 main">
        <div class="jsx-3084556328 channels">
            <div class="jsx-3084556328 item"><a class="jsx-3084556328">
                    <div class="btn-humbers"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <div class="jsx-3084556328 item-label">MENU</div>
                </a></div>
            <div class="jsx-3084556328 item "><a href="phim-bo.html" class="jsx-3084556328"><i class="fa fa-film"
                        aria-hidden="true"></i>
                    <div class="jsx-3084556328 item-label">Phim Bộ</div>
                </a></div>
            <div class="jsx-3084556328 item "><a href="phim-le.html" class="jsx-3084556328"><i
                        class="fa fa-file-video-o" aria-hidden="true"></i>
                    <div class="jsx-3084556328 item-label">Phim Lẻ</div>
                </a></div>
            <div class="jsx-3084556328 item "><a href="thinh-hanh.html" class="jsx-3084556328"><i
                        class="fa fa-line-chart" aria-hidden="true"></i>
                    <div class="jsx-3084556328 item-label">Thịnh Hành</div>
                </a></div>
            <div class="jsx-3084556328 item "><a href="tu-phim.html" class="jsx-3084556328"><i class="fa fa-heart-o"
                        aria-hidden="true"></i>
                    <div class="jsx-3084556328 item-label">Cá nhân </div><span class="count" id="count-bookmark"></span>
                </a></div>
        </div>
    </div>
