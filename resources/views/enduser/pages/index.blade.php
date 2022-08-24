@extends("enduser.layout")
@section("front_content")
<div class="left-content">
    <ul id="top-slide">
        <div class="silder-banner owl-carousel">
            @foreach ($slidebars as  $slide)
                <li class="item">
                    <a title="{{$slide->name}}"" href="#">
                        <div class="slider-img"
                            style="background-image:url({{ \App\Helper\Functions::getImage('banner', $slide -> picture)}});">
                        </div>
                    </a>
                </li>
            @endforeach
        </div>
    </ul>
    @include("enduser.components.seriesmovie",["seriesmovie" => @$seriesmovie])
    @include("enduser.components.oddmovie",["oddmovie" => @$oddmovie])
</div>
@include("enduser.components.topfilmright")

@stop


<style>
    .tab-item{
        display: none;
    }
    .tab-item.active{
        display: block;
    }
</style>
