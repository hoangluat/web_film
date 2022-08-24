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
                                @foreach($fieldForm as $index => $items)
                                    <div class="tab-pane @if($index == $keyActive) active @endif"
                                         id="{{ $index }}" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                {!! App\Helper\Form::renderItems($items['items'], @$singleRecord) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!------- End Tab Content ------->
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a class="btn btn-dark" href="{{ route("admin." . $controllerName . ".index") }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
