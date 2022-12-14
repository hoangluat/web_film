@if($pagination -> hasPages())
    @php
        //dd($pagination -> url(3) );
    @endphp
    <div class="d-flex align-items-center justify-content-between">
        <div class="justify-content-start">
            <span>Showing {{ $pagination -> firstItem() }} to {{ $pagination -> lastItem() }} items of {{ $pagination -> total() }} items</span>
        </div>
        <ul class="pagination justify-content-end">
            <li class="page-item @if( $pagination -> onFirstPage()) disabled @endif">
                <a class="page-link" href="{{ $pagination -> previousPageUrl() }}">Previous</a>
            </li>
            @for($i = 1; $i <= $pagination -> lastPage(); $i++)
                <li class="page-item">
                    <a class="page-link @if($i == $pagination -> currentPage())active @endif" href="{{ $pagination -> url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item @if($pagination -> currentPage() == $pagination -> lastPage() ) disabled @endif">
                <a class="page-link" href="{{ $pagination -> nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </div>
@endif

<style>
    .page-link.active{
        background: #dee2e6;
    }
</style>
