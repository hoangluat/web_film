
<div class="right-content only-pc">
    <div class="hide container-card">
        <div class="wrapper"> <img src="Theme/images/logo-s512.png" alt="">
            <div class="place">Tham gia thành viên của BiluTV để xem phim không có quảng cáo gây khó
                chịu hoàn toàn miễn phí</div>
        </div>
        <div class="content">
            <p></p>
            <div class="buttons">
                <div class="buttons-center">
                    <div class="btn-card"> <a href="thanh-vien/dang-ky.html"><button>Đăng
                                Ký</button></a> </div>
                    <div class="btn-card"> <a href="thanh-vien/dang-nhap.html"><button>Đăng
                                nhập</button></a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="web most-view block">
        <div class="caption"> <span class="uppercase"><a href="thinh-hanh.html"
                    title="Phim Hay Nhất">TOP Thịnh Hành</a></span> </div>
        <div class="clear"></div>
        <div class="widget-title tab-wrapper"><span class="tabs">
                <div class="tab active">
                    <div class="name"><a title="Phim Bộ" href="#">Phim Bộ</a></div>
                </div>
                <div class="tab">
                    <div class="name"><a title="Phim Lẻ" href="#">Phim Lẻ</a></div>
                </div>
            </span>
        </div>
        <div class="tab-item active" id="boday">
            <ul class="list-film"><a href="phim/dau-la-dai-luc-3d-s1-2728.html"
                    title="Đấu La Đại Lục 3D">
                   @if (isset($seriesmovie))
                   @foreach ($seriesmovie as $item)
                   <a href="{{route("films.filmdetail",@$item -> slug)}} ">
                    <li class="film-item-ver">
                        <div class="avatar"
                            style="background-image:url({{\App\Helper\Functions::getImage('films', $item ->image) }});">
                        </div>
                        <div class="title">
                            <p class="name">{{$item->name}}</p>
                            <p class="real-name">{{$item->name}}</p>
                        </div>
                        <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 9,023 lượt
                                xem</i></p>
                    </li>
                    </a>
                   @endforeach
                   @endif
                </a><a href="phim/ma-dao-to-su-phan-3-18405.html" title="Ma Đạo Tổ Sư (Phần 3)">
            </ul>
        </div>
        <div class="tab-item " id="boday">
            <ul class="list-film "><a href="phim/dau-la-dai-luc-3d-s1-2728.html"
                    title="Đấu La Đại Lục 3D">
                    @if (isset($oddmovie))
                    @foreach ($oddmovie as $item)
                    <a href="{{route("films.filmdetail",@$item -> slug)}}">
                        <li class="film-item-ver">
                            <div class="avatar"
                                style="background-image:url({{\App\Helper\Functions::getImage('films', $item ->image) }});">
                            </div>
                            <div class="title">
                                <p class="name">{{$item->name}}</p>
                                <p class="real-name">{{$item->name}}</p>
                            </div>
                            <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 9,023 lượt
                                    xem</i></p>
                        </li>
                    </a>
                    @endforeach
                    @endif

            </ul>
        </div>
    <div class="web most-view block">
        <div class="caption"> <span class="uppercase"><a href="the-loai/trailer.html"
                    title="Phim Sắp Chiếu">Phim Sắp Chiếu</a></span> </div>
        <div class="clear"></div>
        <ul class="list-film top10" style="max-height:300px;overflow-y:auto;padding-right:5px"> <a
                href="phim/that-nghiep-chuyen-sinh-phan-2-18461.html"
                title="Thất Nghiệp Chuyển Sinh Phần 2">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/18461/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Thất Nghiệp Chuyển Sinh Phần 2</p>
                        <p class="real-name">Mushoku Tensei: Jobless Reincarnation 2 (2021)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 5,222 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/moc-lan-hoanh-khong-xuat-the-17532.html"
                title="Mộc Lan: Hoành Không Xuất Thế">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/17532/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Mộc Lan: Hoành Không Xuất Thế</p>
                        <p class="real-name">Kung Fu Mulan (2020)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 51,693 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/ton-ngo-khong-dai-nao-new-york-6144.html"
                title="Tôn Ngộ Không Đại Náo New York">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/6144/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Tôn Ngộ Không Đại Náo New York</p>
                        <p class="real-name">Monkey King Reloaded (2017)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 15,989 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/bilal-chien-binh-sa-mac-4789.html" title="Bilal: Chiến Binh Sa Mạc">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/4789/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Bilal: Chiến Binh Sa Mạc</p>
                        <p class="real-name">Bilal: A New Breed of Hero (2017)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 6,654 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/chuyen-co-tich-ban-dem-4696.html" title="Chuyện Cổ Tích Ban Đêm">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/4696/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Chuyện Cổ Tích Ban Đêm</p>
                        <p class="real-name">Tales Of The Night (2016)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 5,653 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/loi-tien-tri-cua-gia-dinh-ech-3965.html"
                title="Lời Tiên Tri Của Gia Đình Ếch">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/3965/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Lời Tiên Tri Của Gia Đình Ếch</p>
                        <p class="real-name">La Prophétie Des Grenouilles (2016)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 4,876 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/ngay-qua-den-3696.html" title="Ngày Quạ Đen">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/3696/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Ngày Quạ Đen</p>
                        <p class="real-name">Le Jour Des Corneilles (2016)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 6,778 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/nhoc-ma-sieu-quay-2930.html" title="Nhóc Ma Siêu Quậy">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/2930/poster3ab3.jpg?v=1628278513);">
                    </div>
                    <div class="title">
                        <p class="name">Nhóc Ma Siêu Quậy</p>
                        <p class="real-name">The Little Vampire 3D (2017)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 13,455 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/last-exile-ginyoku-no-fam-movie-over-the-wishes-9189.html"
                title="Last Exile: Ginyoku no Fam Movie - Over the Wishes">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/9189/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Last Exile: Ginyoku no Fam Movie - Over the Wishes</p>
                        <p class="real-name">Last Exile: Ginyoku no Fam Movie - Over the Wishes (2016)
                        </p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 14,335 lượt xem</i>
                    </p>
                </li>
            </a><a href="phim/ho-canh-cut-biet-doi-rung-xanh-8799.html"
                title="Hổ Cánh Cụt &amp; Biệt Đội Rừng Xanh">
                <li class="film-item-ver">
                    <div class="avatar"
                        style="background-image:url(../i3.wp.com/img.bilutv.cc/film/8799/poster.jpg);">
                    </div>
                    <div class="title">
                        <p class="name">Hổ Cánh Cụt &amp; Biệt Đội Rừng Xanh</p>
                        <p class="real-name">The Jungle Bunch (2017)</p>
                    </div>
                    <p class="view"><i><i class="fa fa-eye" aria-hidden="true"></i> 8,088 lượt xem</i>
                    </p>
                </li>
            </a> </ul>
    </div>
    <div class="clear"></div>
    <div class="most-view block">Anime Full - trang web xem phim hoạt hình, anime, cn animation mới
        online miễn phí chất lượng Full HD, cập nhật nhiều phim hay vietsub, thuyết minh, phim chiếu rạp
        nhanh nhất, animefull.tv luôn đồng hành và mang đến trải nghiệm xem phim tốt nhất đến với những
        mọt phim!</div>
</div>


<style>
    .tab-item{
        display: none;
    }
    .tab-item.active {
        display: block;
    }
</style>
