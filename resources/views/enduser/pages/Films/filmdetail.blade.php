@extends("enduser.layout")
@section("front_content")

<div class="left-content">
    <div class="dynamic-header-overlay">
        <div class="containerss container-fixss" style="background: #1d1d1d;margin-top:20px">
            <div class="hide breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li class="web" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="../index.html" itemprop="item"><b itemprop="name">Anime Full</b></a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" title="Phim Lẻ" href="../phim-le.html"><b itemprop="name">Phim
                            Lẻ</b></a>
                    <meta itemprop="position" content="2" />
                </li>
                <li><a href="psycho-pass-3-first-inspector-18513.html">{{$filmdetail->name}}</a></li>
            </div>
            <div class="film-info movie-detail-new">
                <div class="cover bg-cover bg-center" style="background: url({{\App\Helper\Functions::getImage('films', $filmdetail ->imagebanner) }}) no-repeat center;background-size: cover;">
                    <div class="dynamic-thumb-overlay">
                        <div class="thumb-info"><img title="Psycho-Pass 3: First Inspector (2020)" alt="Psycho-Pass 3: First Inspector (2020)" src="{{\App\Helper\Functions::getImage('films', $filmdetail ->image) }}"></div><label class="current-share"></label>
                        <div class="movie-name">
                            <h1 class="text-3xl font-bold pr-80"> {{$filmdetail->name}} </h1>
                            <h2 class="py-2 pr-80 cl-c">{{$filmdetail->name}}</h2>
                        </div>
                        <div class="absolute bottom-15 right-0 text-center">
                            @if (Auth::id())
                            @if (!empty($itemWish) && $itemWish->slug == $filmdetail->slug )
                            <div id="removeHistory" data-filmid="{{$filmdetail->id}}" class="favourite"><button class="wishlist-btn" data-url="{{ route("wishList.deleteWishFilm", ["id" => $filmdetail->id]) }}"><span id="favourite-content"><svg xmlns="http://www.w3.org/2000/svg" fill="#c02f58" viewBox="0 0 24 24" stroke="currentColor" class="float-left w-12">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                            </path>
                                        </svg></span> <span class="sr-only">Bỏ Yêu Thích</span> </button></div>
                            @else
                            <div id="addHistory" data-filmid="18513" class="favourite"><button class="wishlist-btn" data-url="{{ route("wishList.addWishList", ["id" => $filmdetail->id]) }}"><span id="favourite-content"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="float-left w-12">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                            </path>
                                        </svg></span> <span class="sr-only">Yêu Thích</span> </button></div>
                            @endif
                            @else
                            <div id="addHistoryU" data-filmid="18513" class="favourite"><button class="wishlist-btn" id="wishlist-btn"><span id="favourite-content"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="float-left w-12">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                            </path>
                                        </svg></span> <span class="sr-only">Yêu Thích</span> </button></div>
                            @endif

                            <div class="views px-3"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg> <span>306</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="film-info movie-detail-new">
                <div class="m-2 overflow-hidden">
                    <div class="tab-wrapper-info"><a href="{{route("films.filmwatch",$filmdetail->slug)}}" class="tab-menus active-menus"><i class="fa fa-play" aria-hidden="true"></i> Xem
                            Phim</a><a href="{{route("films.filmtrailer",$filmdetail->slug)}}" title="Xem Trailer Phim Psycho-Pass 3: First Inspector"><span class="tab-menus">Trailer</span></a><span style="float:right" class="web">
                            <div class="fb-like" data-href="https://animefull.tv/phim/18513-psycho-pass-3-first-inspector" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
                            <div class="hide fb-save" data-uri="https://animefull.tv/phim/18513-psycho-pass-3-first-inspector" data-size="large"></div>
                        </span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="containerss container-fixss" style="background: #1d1d1d;">
        <div class="p-2">
            <div class="tags-info"><span class="dd1">NOR</span><span class="yy2">7.5</span><span class="tags-item-info"><a href="../quoc-gia/nhat-ban.html" title="Phim Nhật Bản"></a></span><span class="tags-item-info"><a href="../danh-sach/phim-nam-2020.html" title="Phim 2020‏">{{$filmdetail->year}}</a></span><span class="tags-item-info">NA</span></div>
            <div class="clear"></div>
        </div>
        <div id="left-info">
            <div class="p-2" style="display: block;">
                <ul class="meta-data cl-c">
                    <div class="info-y">
                        <li>Trạng thái: <strong>{{$filmdetail->ttstatus}} </strong></li>
                        <li> Đạo diễn: {{$filmdetail->director ? $filmdetail->director : 'NA'}} </li>
                        <li> Diễn viên: {{$filmdetail->actor ? $filmdetail->actor : 'NA'}} </li>
                        <li> Thể loại: @foreach ($typefilms as $key => $type )

                            @endforeach
                        </li>
                        <li> Thời lượng: {{$filmdetail->duration ? $filmdetail->duration ."P" : 'NA'}}</li>
                    </div>
                    <div class="box-rating">
                        <div id="star" data-score="0" style="cursor: pointer;"></div>
                        <div class="rating_wrap mt-50">
                            <div class="rating_list">
                                <div class="review_info mb-10 rating-stars">
                                    <ul class="product-rating d-flex mb-10" id="stars">
                                        <li class="star" data-count="1"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="2"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="3"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="4"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="5"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="6"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="7"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="8"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="9"><i class='fa fa-star fa-fw'></i></li>
                                        <li class="star" data-count="10"><i class='fa fa-star fa-fw'></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="div_average" style="line-height: 16px; margin: 0 5px; "><span class="average" id="average">6.3</span> <span class="rate_count"><i class="fas fa-chart-bar"></i> -<span id="rate_count">Hãy là người đầu tiên đánh giá</span></span></div><input id="film_id" type="hidden" value="18513">
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <div id="right-info" class="block-film-content p-2">
            <div class="tags-info"><span class="wnone">NỘI DUNG PHIM</span></div>
            <div class="film-content">
                <p class="content-h">{{$filmdetail->description}}</p>
            </div>
        </div>
        <div class="clear"></div>
        <div class="" id="tab-lichchieu" style="display:nonee"></div>
        <div class="clear"></div>
        <div class="clear"></div>
        <div class="list-series">
            <div class="block-film">
                <div class="caption"><a href="../album/series-phim-hoat-hinh-he-so-pham-toi-471.html"><span>SERIES</span></a>
                </div>
            </div>
            <ul class="list-film">
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">HD </label><label class="current-info"></label><a href="he-so-pham-toi-4956.html" title="Hệ Số Phạm Tội">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/4956/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Hệ Số Phạm Tội</p>
                                <p class="real-name hide">Psycho-Pass: The Movie (2015)</p>
                            </div>
                        </a></div>
                </li>
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">Trọn bộ (22/22 Tập)</label><label class="current-info"></label><a href="he-so-pham-toi-phan-1-17019.html" title="Hệ Số Phạm Tội (Phần 1)">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/17019/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Hệ Số Phạm Tội (Phần 1)</p>
                                <p class="real-name hide">Psycho-Pass (2012)</p>
                            </div>
                        </a></div>
                </li>
               
                
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">Full 11/11 </label><label class="current-info"></label><a href="he-so-pham-toi-phan-2-6402.html" title="Hệ Số Phạm Tội (Phần 2)">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/6402/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Hệ Số Phạm Tội (Phần 2)</p>
                                <p class="real-name hide">Psycho-Pass 2 (2014)</p>
                            </div>
                        </a></div>
                </li>
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">Tập 8 </label><label class="current-info"></label><a href="he-so-pham-toi-phan-3-18508.html" title="Hệ Số Phạm Tội (Phần 3)">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18508/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Hệ Số Phạm Tội (Phần 3)</p>
                                <p class="real-name hide">Psycho-Pass 3 (2019)</p>
                            </div>
                        </a></div>
                </li>
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">HD </label><label class="current-info"></label><a href="psycho-pass-3-first-inspector-18513.html" title="Psycho-Pass 3: First Inspector">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18513/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Psycho-Pass 3: First Inspector</p>
                                <p class="real-name hide">Psycho-Pass 3: First Inspector (2020)</p>
                            </div>
                        </a></div>
                </li>
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">HD </label><label class="current-info"></label><a href="psycho-pass-ss-case-1-tsumi-to-batsu-18510.html" title="Psycho-Pass SS Case 1: Tsumi to Batsu">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18510/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Psycho-Pass SS Case 1: Tsumi to Batsu</p>
                                <p class="real-name hide">Psycho-Pass: Sinners of the System Case.1 - Tsumi to
                                    Bachi (2019)</p>
                            </div>
                        </a></div>
                </li>
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">FHD </label><label class="current-info"></label><a href="psycho-pass-ss-case-2-first-guardian-14339.html" title="Psycho-Pass SS Case 2: First Guardian">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/14339/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Psycho-Pass SS Case 2: First Guardian</p>
                                <p class="real-name hide">Psycho-Pass: Sinners of the System Case.2 - First
                                    Guardian (2019)</p>
                            </div>
                        </a></div>
                </li>
                <li class="film-item">
                    <div class="film-k "><label class="current-status hide">HD </label><label class="current-info"></label><a href="psycho-pass-sinners-of-the-system-case3-onshuu-no-kanata-ni-18512.html" title="Psycho-Pass: Sinners of the System Case.3 - Onshuu no Kanata ni">
                            <div class="list-img" style="background-image:url(../../i3.wp.com/img.bilutv.cc/film/18512/big.jpg);">
                            </div>
                            <div class="title">
                                <p class="name">Psycho-Pass: Sinners of the System Case.3 - Onshuu no Kanata ni
                                </p>
                                <p class="real-name hide">Psycho-Pass: Sinners of the System Case.3 - Onshuu no
                                    Kanata ni (2019)</p>
                            </div>
                        </a></div>
                </li>
            </ul>
        </div><a href='../album/series-phim-hoat-hinh-he-so-pham-toi-471.html'>
            <div class='post flexbox'>
                <div class='post-info'>
                    <div class='post-title'>Series Phim Hoạt Hình Hệ Số Phạm Tội</div>
                    <div class='content-album'>Vào thế kỉ 22 tội phạm ngày càng chuyên nghiệp hơn, chúng luôn sử
                        dụng những công nghệ tối tân nhất để vi phạm pháp luật, để giữ được trật tự an ninh,
                        chính phủ Nhật đã đưa hệ thống Sibyl vào để thí nghiệm, nhằm hạn chế được tối đa mức độ
                        tội phạm thông qua công nghệ kiểm tra ...</div>
                </div>
            </div>
        </a>
    </div>
    <div class="block-film">
        <div class="caption"><span> Phim Liên Quan</span></div>
    </div>
    <ul class="list-film">

</ul>
<div class="tags"> <label><i class="fa fa-tags"></i> Từ khoá:</label> </div>
<h4 class="keywords">xem anime Psycho-Pass 3: First Inspector viesub, thuyết minh. Psycho-Pass 3: First
        Inspector viesub, Review anime Psycho-Pass 3: First Inspector </h4>
</div>
@include("enduser.components.topfilmright",["seriesmovie" => @$seriesmovie , "oddmovie" => @$oddmovie])


@stop