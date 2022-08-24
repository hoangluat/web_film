<div class="block-film">
    <h2 class="caption"> <span> <i class="fa fa-plus-square" aria-hidden="true"></i> <a
                title="Phim Lẻ Mới Cập Nhật" href="phim-le.html">Phim Lẻ <i
                    class="fa fa-caret-right" aria-hidden="true"></i> </a> </span> </h2>
    <ul class="list2 tabss">
        <li class="tabb active"> <a href="#phimleall">All</a> </li>
        <li class="tabb"> <a href="#leanime">Nhật Bản</a> </li>
        <li class="tabb"> <a href="#lecnanimation">Trung Quốc</a> </li>
    </ul>
    <div class="tabb2 tabb-item" id="phimleall" style="display: block;">
        <ul class="list-film">
            @foreach ($oddmovie as $film)
            <li class="film-item">
                <div class="film-k p-left"><label class="current-status ">HD </label><label
                        class="current-info"></label><a
                        href="{{route("films.filmdetail",@$film -> slug)}}"
                        title="Psycho-Pass 3: First Inspector">
                        <div class="list-img"
                            style="background-image:url({{ \App\Helper\Functions::getImage('films', $film ->image) }});">
                        </div>
                        <div class="title">
                            <p class="name">{{$film->name}}</p>
                            <p class="real-name">{{$film->name}} (2021)</p>
                        </div>
                    </a></div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="tabb2 tabb-item" id="lecnanimation" style="display: none;">
        <ul class="list-film">
            <li class="film-item">
                <div class="film-k p-left"><label class="current-status ">FHD </label><label
                        class="current-info"></label><a
                        href="phim/tan-phong-than-na-tra-trung-sinh-18069.html"
                        title="Tân Phong Thần: Na Tra Trùng Sinh">
                        <div class="list-img"
                            style="background-image:url(../i3.wp.com/img.bilutv.cc/film/18069/poster.jpg);">
                        </div>
                        <div class="title">
                            <p class="name">Tân Phong Thần: Na Tra Trùng Sinh</p>
                            <p class="real-name">New Gods: Nezha Reborn (2021)</p>
                        </div>
                    </a></div>
            </li>

        </ul>
    </div>
</div>
