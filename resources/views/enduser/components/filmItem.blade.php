<div class="block-film">
    <div class="tabb2 tabb-item" id="phimleall" style="display: block;">
        <ul class="list-film">
            @if ($wishlist)
            @foreach ($wishlist as $film)
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
            @endif
        </ul>
    </div>

</div>
