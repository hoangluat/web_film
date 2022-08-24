@extends("enduser.layout")
@section("front_content")

<div class="left-content">
    <div class="hide breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="web" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                href="https://animefull.tv/" itemprop="item"><b itemprop="name">Anime Full</b></a>
            <meta itemprop="position" content="1">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item"
                title="Phim Lẻ" href="https://animefull.tv/phim-le"><b itemprop="name">Phim Lẻ</b></a>
            <meta itemprop="position" content="2" />
        </li>
        <li><a href="https://animefull.tv/phim/code-geass-boukoku-no-akito-5-itoshiki-monotachi-e-18672">Code
                Geass: Boukoku no Akito 5 - Itoshiki Monotachi e</a></li>
        <li><a href="code-geass-boukoku-no-akito-5-itoshiki-monotachi-e-tap-hd-18672.html">Xem Phim</a></li>
    </div>
    <div style="background: #1d1d1d;margin-top:20px">
        <div class="p-2" id="player_message">
            <h1 class="font-bold"
                style="font: 25px 'UTMCafetaRegular';text-shadow: 1px 1px 1px #222;line-height: 30px;"> Code
                Geass: Boukoku no Akito 5 - Itoshiki Monotachi e Vietsub </h1>
        </div>
        <div class="player">
            <div class="box-player" id="box-player">
                <div id="media-player">
                    @if (count($watchfilms) > 0)
                        <div class="embed-responsive embed-responsive-16by9"><iframe rel="nofollow"
                        src="{{$watchfilms[0]->iframefilm}}"
                        width="100%" height="100%" allowfullscreen="true" mozallowfullscreen="true"
                        webkitallowfullscreen="true" frameborder="no" scrolling="no"></iframe></div>
                    @else
                        "Chưa có Phim"
                    @endif
                </div>
            </div>

        </div>
        <div class="abp-under">
            <div class="wap">
                <center>

                </center>
            </div>
        </div>
        <div class="" id="player_message">Cú pháp tìm kiếm phim trên Google: "<span style="color:lightgreen">Tên
                phim + animefull.tv</span>"</div>
        <div class="clear"></div>
        <div class="div-control" style="display:none">
            <div class="like-at-watch">
                <div class="list-server" id="list-server">
                    <div class="server-item">
                        <div style="display: inline-block;margin-right:15px"> <span><i
                                    class="fa fa-database"></i> Server</span> </div>
                        <div style="display: inline-block;"><span
                                class="btn btn-sm btn-success disabled btn-danger" title="GR" data-index="0">#1
                                GR</span><span class="btn btn-sm btn-success" title="HX" data-index="1">#2
                                HX</span></div>
                    </div>
                </div>
            </div><span class="hide video-btn" id="hideads" title="Tắt quảng cáo"><i class="fa fa-window-close"
                    aria-hidden="true"></i> Tắt QC</span><span class="hide video-btn" id="btn_lightbulb"
                title="Tắt đèn"><i class="fa fa-lightbulb-o"></i></span> <span class="hide video-btn active"
                id="btn_autonext" title="Tắt tự chuyển tập"><i class="fa fa-step-forward"></i></span>
        </div>
        <div class="clear"></div>
        <div class="film-info">
            <div class="cover bg-cover bg-center"
                style="background: url() no-repeat center;background-size: cover;"> </div>
        </div>
        <div class="clear"></div>
        <div class="film-info movie-detail-new">
            <div class="m-2 overflow-hidden">
                @if (!empty($watchfilms))
                @foreach ($watchfilms as $item)
                <div class="tab-wrapper-info"><a
                        href=""
                        title="Phim Code Geass: Boukoku no Akito 5 - Itoshiki Monotachi e"><span
                            class="tab-menus">Thông tin phim</span></a><a
                        href="{{route("films.filmtrailer",$item->films->slug)}}"><span
                            class="tab-menus">Trailer</span></a><span style="float:right" class="web">
                        <div class="fb-like"
                            data-href="https://animefull.tv/phim/18672-code-geass-boukoku-no-akito-5-itoshiki-monotachi-e"
                            data-layout="button_count" data-action="like" data-size="large" data-share="true">
                        </div>
                        <div class="fb-save"
                            data-uri="https://animefull.tv/phim/18672-code-geass-boukoku-no-akito-5-itoshiki-monotachi-e"
                            data-size="large"></div>
                    </span></div>
                    @break
                @endforeach
                @endif
            </div>
        </div>
        <div class="clear"></div>
        <div class="episodes p-2">
            <div class="caption"><span><i class="fa fa-television" aria-hidden="true"></i> VIETSUB <i
                        class="fa fa-angle-down"></i></span></div>
            <ul class="list-episode" id="list_episodes">
                @if ($film->kindoffilms->slug === 'phim-le')
                    @foreach ($watchfilms as $item)
                    <li><a id="ep-240977"
                        href="code-geass-boukoku-no-akito-5-itoshiki-monotachi-e-tap-hd-18672.html"
                        data-id="240977" title="Code Geass: Boukoku no Akito 5 - Itoshiki Monotachi e tập HD"
                        class="240977-1">{{$item->episode}}</a></li>
                    @endforeach
                @else
                    <ul class="list-episodes" id="list_episodes">
                    @if (!empty($watchfilms))
                        @foreach ($watchfilms as $item)
                        <li class="list-episode-item"><a id="ep-240937" class="{{$item->episode  == '1' ? 'active' : ''}}" href="javascript:void(0)" data-href="{{$item->iframefilm}}" data-id="240937"
                            title="Ai Mai Mi (Phần 1) tập 1" class="240937-1">Tập {{$item->episode}}</a></li>
                    @endforeach
                    @endif
                    </ul>
                @endif

            </ul>
            <style>
                .list-episode{
                    display:flex;
                    flex-wrap: wrap;
                }
                .list-episode-item a.active{
                    background: #c02f58;
                }
            </style>
            <div class="clear"></div> <br />
        </div>
    </div>
    <div class="comment">
        <div class="fb-comments" data-href="https://cmt.bilutv.link/phim/18672" data-numposts="5"
            data-width="100%" data-order-by="reverse_time" data-colorscheme=""></div>
    </div>
    <div class="list-series">
        <div class="block-film">
            <div class="caption"><a
                    href="https://animefull.tv/album/series-phim-hoat-hinh-code-geass-586"><span>SERIES</span></a>
            </div>
        </div>
        <ul class="list-film">
            <li class="film-item">
                <div class="film-k "><label class="current-status hide">Full 25/25 </label><label
                        class="current-info"></label><a href="https://animefull.tv/phim/code-geass-phan-1-16942"
                        title="Code Geass (Phần 1)">
                        <div class="list-img"
                            style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/16942/big.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Code Geass (Phần 1)</p>
                            <p class="real-name hide">Code Geass: Lelouch Of The Rebellion (2006)</p>
                        </div>
                    </a></div>
            </li>
            <li class="film-item">
                <div class="film-k "><label class="current-status hide">Full 25/25 </label><label
                        class="current-info"></label><a href="https://animefull.tv/phim/code-geass-phan-2-16943"
                        title="Code Geass (Phần 2)">
                        <div class="list-img"
                            style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/16943/big.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Code Geass (Phần 2)</p>
                            <p class="real-name hide">Code Geass: Hangyaku No Lelouch (2008)</p>
                        </div>
                    </a></div>
            </li>
            <li class="film-item">
                <div class="film-k "><label class="current-status hide">HD </label><label
                        class="current-info"></label><a
                        href="https://animefull.tv/phim/code-geass-boukoku-no-akito-1-yokuryuu-wa-maiorita-18668"
                        title="Code Geass: Boukoku no Akito 1 - Yokuryuu wa Maiorita">
                        <div class="list-img"
                            style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18668/big.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Code Geass: Boukoku no Akito 1 - Yokuryuu wa Maiorita</p>
                            <p class="real-name hide">Code Geass: Akito the Exiled - The Wyvern Arrives (2012)
                            </p>
                        </div>
                    </a></div>
            </li>
            <li class="film-item">
                <div class="film-k "><label class="current-status hide">HD </label><label
                        class="current-info"></label><a
                        href="https://animefull.tv/phim/code-geass-boukoku-no-akito-2-hikisakareshi-yokuryuu-18669"
                        title="Code Geass: Boukoku no Akito 2 - Hikisakareshi Yokuryuu">
                        <div class="list-img"
                            style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18669/big.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Code Geass: Boukoku no Akito 2 - Hikisakareshi Yokuryuu</p>
                            <p class="real-name hide">Code Geass: Akito the Exiled - The Wyvern Divided (2013)
                            </p>
                        </div>
                    </a></div>
            </li>
            <li class="film-item">
                <div class="film-k "><label class="current-status hide">HD </label><label
                        class="current-info"></label><a
                        href="https://animefull.tv/phim/code-geass-boukoku-no-akito-3-kagayaku-mono-ten-yori-otsu-18670"
                        title="Code Geass: Boukoku no Akito 3 - Kagayaku Mono Ten yori Otsu">
                        <div class="list-img"
                            style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18670/big.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Code Geass: Boukoku no Akito 3 - Kagayaku Mono Ten yori Otsu</p>
                            <p class="real-name hide">Code Geass: Akito the Exiled - The Brightness Falls (2015)
                            </p>
                        </div>
                    </a></div>
            </li>
            <li class="film-item">
                <div class="film-k "><label class="current-status hide">HD </label><label
                        class="current-info"></label><a
                        href="https://animefull.tv/phim/code-geass-boukoku-no-akito-4-nikushimi-no-kioku-kara-18671"
                        title="Code Geass: Boukoku no Akito 4 - Nikushimi no Kioku kara">
                        <div class="list-img"
                            style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18671/big.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Code Geass: Boukoku no Akito 4 - Nikushimi no Kioku kara</p>
                            <p class="real-name hide">Code Geass: Akito the Exiled - Memories of Hatred (2015)
                            </p>
                        </div>
                    </a></div>
            </li>
            <li class="film-item">
                <div class="film-k "><label class="current-status hide">HD </label><label
                        class="current-info"></label><a
                        href="https://animefull.tv/phim/code-geass-boukoku-no-akito-5-itoshiki-monotachi-e-18672"
                        title="Code Geass: Boukoku no Akito 5 - Itoshiki Monotachi e">
                        <div class="list-img"
                            style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18672/big.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Code Geass: Boukoku no Akito 5 - Itoshiki Monotachi e</p>
                            <p class="real-name hide">Code Geass: Akito the Exiled - To Beloved Ones (2016)</p>
                        </div>
                    </a></div>
            </li>
        </ul>
    </div><a href='https://animefull.tv/album/series-phim-hoat-hinh-code-geass-586'>
        <div class='post flexbox'>
            <div class='post-info'>
                <div class='post-title'>Series Phim Hoạt Hình Code Geass</div>
                <div class='content-album'>Trong cuộc chiến tranh nổ ra giữa mối bất đồng ngoại giao giữa Đế
                    Quốc Britannia và Nhật Bản, sau khi bị đánh bại Nhật đã trở thành một thuộc địa của
                    Britannia và đổi tên thành Khu Vực 11, còn người nhật thì bị gọi Eleven, Lelouch Lamperouge
                    tên thật là Lelouch Vi Britannia cùng em gái Nunnally Vi ...</div>
            </div>
        </div>
    </a>
    <div class="block-film">
        <div class="caption"><span> Phim Liên Quan</span></div>
    </div>
    <ul class="list-film">
        <li class="film-item">
            <div class="film-k p-left"><label class="current-status hide">HD VietSub</label><a
                    href="https://animefull.tv/phim/code-geass-boukoku-no-akito-4-nikushimi-no-kioku-kara-18671"
                    title="Code Geass: Boukoku no Akito 4 - Nikushimi no Kioku kara">
                    <div class="list-img"
                        style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18671/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Code Geass: Boukoku no Akito 4 - Nikushimi no Kioku kara</p>
                        <p class="real-name">Code Geass: Akito the Exiled - Memories of Hatred (2015)</p>
                    </div>
                </a></div>
        </li>
        <li class="film-item">
            <div class="film-k "><label class="current-status hide">HD VietSub</label><a
                    href="https://animefull.tv/phim/code-geass-boukoku-no-akito-3-kagayaku-mono-ten-yori-otsu-18670"
                    title="Code Geass: Boukoku no Akito 3 - Kagayaku Mono Ten yori Otsu">
                    <div class="list-img"
                        style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18670/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Code Geass: Boukoku no Akito 3 - Kagayaku Mono Ten yori Otsu</p>
                        <p class="real-name">Code Geass: Akito the Exiled - The Brightness Falls (2015)</p>
                    </div>
                </a></div>
        </li>
        <li class="film-item">
            <div class="film-k "><label class="current-status hide">HD VietSub</label><a
                    href="https://animefull.tv/phim/code-geass-boukoku-no-akito-2-hikisakareshi-yokuryuu-18669"
                    title="Code Geass: Boukoku no Akito 2 - Hikisakareshi Yokuryuu">
                    <div class="list-img"
                        style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18669/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Code Geass: Boukoku no Akito 2 - Hikisakareshi Yokuryuu</p>
                        <p class="real-name">Code Geass: Akito the Exiled - The Wyvern Divided (2013)</p>
                    </div>
                </a></div>
        </li>
        <li class="film-item">
            <div class="film-k "><label class="current-status hide">HD VietSub</label><a
                    href="https://animefull.tv/phim/code-geass-boukoku-no-akito-1-yokuryuu-wa-maiorita-18668"
                    title="Code Geass: Boukoku no Akito 1 - Yokuryuu wa Maiorita">
                    <div class="list-img"
                        style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18668/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Code Geass: Boukoku no Akito 1 - Yokuryuu wa Maiorita</p>
                        <p class="real-name">Code Geass: Akito the Exiled - The Wyvern Arrives (2012)</p>
                    </div>
                </a></div>
        </li>
    </ul>
</div>
@include("enduser.components.topfilmright" ,["seriesmovie" => @$seriesmovie , "oddmovie" => @$oddmovie])
@stop
