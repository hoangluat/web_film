
<div class="form-group file-upload">
    @if($item)
        <label for="{{ $item['name'] }}">{{ $item['label'] }}:</label>
        <input class="form-control" name="{{ $item['name'] }}" type="{{ $item['type'] }}" id="{{ $item['name'] }}">
        <p class="preview-img">
            <img style="width: 300px;" src="{{ \App\Helper\Functions::getImage( $folderUpload, @$old_record[$item['name']] ) }}">
        </p>
    @endif
</div>
@push('scripts')
    <script>
        // $('#{{ $item['name'] }}').filemanager('file');
    </script>
@endpush

