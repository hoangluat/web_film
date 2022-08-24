@php
    if(empty($singleRecord)){
        $singleRecord = [];
        $form_action = route("admin." . $controllerName . ".store");
    }else{
        $form_action = route("admin." . $controllerName . ".update", ["id" => $singleRecord["id"]]);
    }
@endphp

@extends("admin.layout")
@section('content_main')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-dark">
                @if ($singleRecordFilm->kindoffilms->name == "Phim Lẻ") 
                    @if ($singleRecordFilm->watchfilms->count() < 1)
                    <form action="{{ $form_action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @include("admin.template.error")
                        <div class="content-tab">
                            <!------- Tab navigate ------->
                            @php
                                $keyActive = "general_tab";
                            @endphp
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($fieldForm as $index => $tabs)
                                    <li class="nav-item">
                                        <a class="nav-link @if($index == $keyActive) active @endif" data-toggle="tab"
                                           href="#{{ $index }}" role="tab">{{ $tabs["tab_label"] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <!------- End Tab ------->

                            <!------- Tab Content ------->
                            <div class="tab-content">
                                <!-- @foreach($fieldForm as $index => $items) -->
                                    <div class="tab-pane @if($index == $keyActive) active @endif"
                                         id="{{ $index }}" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="episode"> Tập Phim(HD)::</label>
                                                    <input autocomplete="off" class="form-control episode" name="episode"
                                                            value="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="iframefilm">Link Phim:</label>
                                                    <input autocomplete="off" class="form-control iframefilm" name="iframefilm"
                                                            value="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="kindoffilm_id">Loại Phim:</label>
                                                    <input autocomplete="off" class="form-control kindoffilm_idShow" name="kindoffilm_idShow"
                                                            value="{{$singleRecordFilm->kindoffilms->name}}" type="text" readonly>
                                                    <input  class="form-control kindoffilm_id " hidden name="kindoffilm_id"
                                                            value="{{$singleRecordFilm->kindoffilm_id}}" type="text" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="film_idShow">Tên Phim:</label>
                                                    <input autocomplete="off" class="form-control film_idShow" name="film_idShow"
                                                            value="{{$singleRecordFilm->name}}" type="text" readonly>
                                                    <input autocomplete="off" class="form-control film_id" name="film_id"
                                                            value="{{$singleRecordFilm->id}}" hidden type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- @endforeach -->
                            </div>
                            <!------- End Tab Content ------->
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a class="btn btn-dark" href="{{ route("admin." . $controllerName . ".index") }}">Cancel</a>
                    </div>
                </form>
                    @else
                        <p>Bạn đã thêm đủ số lượng</p>
                    @endif
                @else
                <form action="{{ $form_action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @include("admin.template.error")
                        <div class="content-tab">
                            <!------- Tab navigate ------->
                            @php
                                $keyActive = "general_tab";
                            @endphp
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($fieldForm as $index => $tabs)
                                    <li class="nav-item">
                                        <a class="nav-link @if($index == $keyActive) active @endif" data-toggle="tab"
                                           href="#{{ $index }}" role="tab">{{ $tabs["tab_label"] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <!------- End Tab ------->

                            <!------- Tab Content ------->
                            <div class="tab-content">
                                <!-- @foreach($fieldForm as $index => $items) -->
                                    <div class="tab-pane @if($index == $keyActive) active @endif"
                                         id="{{ $index }}" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="episode"> Tập Phim(HD)::</label>
                                                    <input autocomplete="off" class="form-control episode" name="episode"
                                                            value="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="iframefilm">Link Phim:</label>
                                                    <input autocomplete="off" class="form-control iframefilm" name="iframefilm"
                                                            value="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="kindoffilm_id">Loại Phim:</label>
                                                    <input autocomplete="off" class="form-control kindoffilm_idShow" name="kindoffilm_idShow"
                                                            value="{{$singleRecordFilm->kindoffilms->name}}" type="text" readonly>
                                                    <input  class="form-control kindoffilm_id " hidden name="kindoffilm_id"
                                                            value="{{$singleRecordFilm->kindoffilm_id}}" type="text" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="film_idShow">Tên Phim:</label>
                                                    <input autocomplete="off" class="form-control film_idShow" name="film_idShow"
                                                            value="{{$singleRecordFilm->name}}" type="text" readonly>
                                                    <input autocomplete="off" class="form-control film_id" name="film_id"
                                                            value="{{$singleRecordFilm->id}}" hidden type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- @endforeach -->
                            </div>
                            <!------- End Tab Content ------->
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a class="btn btn-dark" href="{{ route("admin." . $controllerName . ".index") }}">Cancel</a>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@stop
