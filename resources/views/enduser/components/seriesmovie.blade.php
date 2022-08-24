<div class="block-film">
    <h2 class="caption"> <span> <i class="fa fa-plus-square" aria-hidden="true"></i> <a
                title="Phim Bộ Mới Cập Nhật" href="phim-bo.html">Phim Bộ <i
                    class="fa fa-caret-right" aria-hidden="true"></i> </a> </span> </h2>
    <ul class="list1 tabss">
        <li class="tabb active"> <a href="#phimboall">All</a> </li>
        <li class="tabb"> <a href="#boanime">Nhật Bản</a> </li>
        <li class="tabb"> <a href="#bocnanimation">Trung Quốc</a> </li>
    </ul>
    <div class="tabb1 tabb-item" id="phimboall" style="display: block;">
        <ul class="list-film">
            @foreach ($seriesmovie as $film)
            <li class="film-item">
                <div class="film-k p-left"><label class="current-status ">Tập 10 </label><label
                        class="current-info"></label><a
                        href="{{route("films.filmdetail",@$film -> slug)}}"
                        title="Tôi Gánh Trên Vai Một Triệu Sinh Mạng Phần 2">
                        <div class="list-img"
                            style="background-image:url({{ \App\Helper\Functions::getImage('films', $film ->image) }});">
                        </div>
                        <div class="title">
                            <p class="name">{{$film->name}}</p>
                            <p class="real-name">{{$film->name}} (2021)</p>
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
    <div class="tabb1 tabb-item" id="boanime" style="display: none;">
        <ul class="list-film">
            <li class="film-item">
                <div class="film-k p-left"><label class="current-status ">Tập 10 </label><label
                        class="current-info"></label><a
                        href="phim/toi-ganh-tren-vai-mot-trieu-sinh-mang-phan-2-18273.html"
                        title="Tôi Gánh Trên Vai Một Triệu Sinh Mạng Phần 2">
                        <div class="list-img"
                            style="background-image:url(../i3.wp.com/img.bilutv.cc/film/18273/poster.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Tôi Gánh Trên Vai Một Triệu Sinh Mạng Phần 2</p>
                            <p class="real-name">I&#039;m standing on 1,000,000 lives 2 (2021)</p>
                        </div>
                    </a></div>
            </li>
        </ul>
    </div>
</div>

<style>
    .list-film .film-item{
        width: 24.5% ;
    }
</style>
