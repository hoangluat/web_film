
<div class="table-content">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                @foreach($fieldList as $key => $value)
                    <th scope="col" class="col-label">{{ $value["label"] }}</th>
                @endforeach
                    <th scope="col" class="col-label">Action</th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach($data as $record)
            {{-- @php
                echo($record)
            @endphp --}}
                <tr>
                    @foreach($fieldList as $key => $name)
                    @if(isset($name['modal']))
                    @php
                        $kindoffilm = $name['modal']::where('id',$record -> {$name["name"]})->first();
                    @endphp
                    @endif
                        @switch($name["type"])
                            @case("id")
                                <th scope="row">{{ $record -> {$name["name"]} }}</th>
                            @break
                            @case("text")
                                <td>{{ $record -> {$name["name"]} }}</td>
                            @break
                            @case("first_name")
                                <td>{{ $record -> {$name["name"]} }}</td>
                            @break
                            @case("last_name")
                                <td>{{ $record -> {$name["name"]} }}</td>
                            @break
                            @case("foreign")
                                <td>{{ $record -> {$name["name"]} == $kindoffilm['id'] ? $kindoffilm['name'] : '' }}</td>

                            @break
                            @case("status")
                                @if( $record -> {$name["name"]} == "active")
                                    <td>
                                        <label class="label label-success">{{ $record -> {$name["name"]} }}</label>
                                    </td>
                                @else
                                    <td>
                                        <label class="label label-danger">{{ $record -> {$name["name"]} }}</label>
                                    </td>
                                @endif
                            @break
                            @case("role")
                                @php
                                    $roleName = $record -> roles -> pluck('name') -> toArray();
                                @endphp
                                <td>
                                    @foreach($roleName as $value)
                                        <label class="label label-success">{{ $value }}</label>
                                    @endforeach
                                </td>
                            @break
                            @case("picture")
                                <td class="show-image">
                                    <img src="{{ \App\Helper\Functions::getImage($folderUpload, $record -> {$name["name"]}) }}">
                                </td>
                            @break
                            @case("link")
                                <th scope="row"><a href = "{{ route("admin.listfilms.index", [  "film" => $record['id'] ] )}}">Thêm Tập </a></th>
                            @break
                            <!-- @case("dateFormat")
                                <td>{{ $record -> {$name["name"]} -> format('d/m/Y') }}</td>
                            @break -->
                        @endswitch
                    @endforeach
                    <td>@include("admin.template.action")</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .table-content{
        padding: 15px 0;
    }
    .col-label{
        text-transform: capitalize;
    }
    th,td{
        text-align: center;
    }
</style>
