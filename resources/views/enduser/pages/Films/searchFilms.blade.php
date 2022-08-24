@extends("enduser.layout")
@section("front_content")

<div class="left-content">
    <div class="hide breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a
                href="https://animefull.tv/" itemprop="item"> <b itemprop="name"> Anime Full </b> </a>
            <meta itemprop="position" content="1">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a
                itemprop="item" title="	Phim  " href=".html"> <b itemprop="name"> Phim {{isset($keyword) ? $keyword : ''}} </b> </a>
            <meta itemprop="position" content="2" />
        </li> <span>
            <h1> Phim {{isset($keyword) ? $keyword : ''}} </h1>
        </span>
    </div>
    <div class="block-film">
        <h2 class="caption"> 
            <span> Phim  {{isset($keyword) ? $keyword : ''}}  </span> 
        </h2>
        <form class="form-filter" action = {{route('showSortList')}} methods = "GET">
            {{-- <div class="filter-item"> <select class="input form-control" name="order" id="order">
                    <option value="">-- Sắp xếp --</option>
                    <option value="publish_date">Mới cập nhật </option>
                    <option value="publish_year">Năm xuất bản </option>
                    <option value="name">Tên phim </option>
                    <option value="view">Lượt xem </option>
                </select> </div> --}}
            <div class="filter-item"> 
                <select class="input form-control" name="type" id="type">
                    <option value="">-- Loại --</option>
                         @foreach ($kindFilms as $item)
                        <option value={{$item->slug}}>{{$item->name}}</option>
                         @endforeach
                </select> 
            </div>
            <div class="filter-item">
                 <select class="input form-control" name="cat_id" id="cat_id">
                    <option value="">-- Thể loại --</option>
                    @foreach ($typeList as $item)
                    <option value={{$item->slug}}>{{$item->name}}</option>
                    @endforeach

                </select> 
            </div>
            <div class="filter-item">
                 <select class="input form-control" name="year" id="year">
                    <option value="">-- Năm --</option>
                    @if (isset($years))
                        @foreach ($years as $item)
                            <option value={{$item}}>{{$item}}</option>
                        @endforeach
                    @endif
                </select> </div> <input type="submit" class="btn btn-success" value="Lọc Phim" />
        </form>
        <ul class="list-film">
            @if ($films)
            @php

            @endphp
            @foreach ($films as $film)
            @php
                $type  = '';switch ($film->kindoffilms->name) {
                  
                    case 'Phim Lẻ':
                        $type = 'HD';
                        break;
                    case 'Phim Mới':
                        # code...
                        break;
                    case 'Phim Sắp Chiếu':
                        # code...
                        break;
                    default:
                        $type  = '';
                        break;
                }
                // dd($type);
            @endphp
            <li class="film-item">
                <div class="film-k p-left"><label class="current-status ">{{$type}} </label><label
                        class="current-info"></label><a
                        href="{{route("films.filmdetail",@$film -> slug)}}"
                        title="Tôi Gánh Trên Vai Một Triệu Sinh Mạng Phần 2">
                        <div class="list-img"
                            style="background-image:url({{ \App\Helper\Functions::getImage('films', $film ->image) }});">
                        </div>
                        <div class="title">
                            <p class="name">{{$film->name}}</p>
                            <p class="real-name">{{$film->name}} ({{$film->year}})</p>
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
            @else
                Không có phim này


            @endif
        </ul>
        <div class="clear"></div>
            <!-- paginatoin-area start -->
            <!-- @include("enduser.components.pagination", ["pagination" => $films]) -->
            <!-- paginatoin-area end -->
        <div class="the_tag_list">
            <h3> <b> <i> Phim Da Mới Nhất 2021 </i> </b> </h3>, <h3> <b> <i> Phim Da Hay Nhất 2021 </i>
                </b> </h3>, <h3> <b> <i> Phim Da Chọn Lọc 2021 </i> </b> </h3> <br /> Tải Phim Da Link
            Fshare Tốc Độ Cao,Tổng Hợp Phim Da Chiếu Rạp Hay Nhất, Tổng Hợp Phim Da Hay Nhất 2021, Tổng
            Hợp Phim Da Mới Nhất 2021, Tổng Hợp Phim Da HOT Nhất 2021, Tổng Hợp Phim Da BanhTV, Tổng Hợp
            Phim Da BiluTV, Tổng Hợp Phim Da PhimMoi, Tổng Hợp Phim Da Zing TV, Tổng Hợp Phim Da
            YêuPhimMới, Tổng Hợp Phim Da VTV16, Tổng Hợp Phim Da VuViPhimMoi, Tổng Hợp Phim Da
            PhimBatHu, Tổng Hợp Phim Da PhimNhanh, Tổng Hợp Phim Da HDSieuNhanh, Tổng Hợp Phim Da
            HDOnline, Tổng Hợp Phim Da Mọt Phim, Tổng Hợp Phim Da XemPhimSo, Tổng Hợp Phim Da TVHay,
            Tổng Hợp Phim Da XemVTV, Tổng Hợp Phim Da BomTan, Tổng Hợp Phim Da Động Phim
        </div>
    </div>
</div>

@include("enduser.components.topfilmright",["seriesmovie" => @$seriesmovie , "oddmovie" => @$oddmovie])
@stop

<style>
    .list-film .film-item {
        width: 24.5% !important;
    }
</style>