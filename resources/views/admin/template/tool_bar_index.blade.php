
@php 
    if( isset($_GET["film"]) ){
        $filmID =  [ "filmID" => $_GET["film"] ] ;
    }else{
        $filmID = [] ;
    }
@endphp

<div class="tool-bar">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route("admin." . $controllerName . ".create" , $filmID ) }}" class="">
                <button type="button" class="btn btn-primary">
                    <span><i class="fa fa-plus"></i> New</span>
                </button>
            </a>
            <a href="#" class="">
                <button type="button" class="btn btn-danger">
                    <span><i class="fa fa-trash"></i> Delete</span>
                </button>
            </a>
{{--            @if(\Route::has('admin.' . $controllerName . ".ordering" ))--}}
{{--                <a href="javascript:ordering('{{ route('admin.' . $controllerName . ".ordering" ) }}')">--}}
{{--                    <button type="button" class="btn btn-warning">--}}
{{--                        <span><i class="fa fa-circle"></i> Thứ tự</span>--}}
{{--                    </button>--}}
{{--                </a>--}}
{{--            @endif--}}
        </div>


{{--        <div class="col-md-6">--}}
{{--            <div class="group-search text-right">--}}
{{--                <div class="dropdown box-search" style="display: inline-block">--}}
{{--                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">--}}
{{--                        {{ $params['search_list'][$params['search_type']] }}--}}

{{--                        <span class="caret"></span></button>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        @foreach($searchList as $k => $v)--}}
{{--                            <li><a onclick="changeSearch(this,'{{ $k }}', '{{ $v }}')" href="javascript:void(0)">{{ $v }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <input value="{{ $params['search_value'] }}" name="search_value" placeholder="search..." style="width: initial; display: inline-block" type="text" rows="2"  class="form-control" />--}}
{{--                <a onclick="searchAction()" href="javascript:void(0)" class="btn btn-primary">Search</a>--}}
{{--                <a onclick="clearSearchAction()" href="javascript:void(0)" class="btn btn-default">Clear</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
