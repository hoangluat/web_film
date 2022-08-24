<style>
    .active a {
        background-color: #e20f56 !important;
        z-index: 999;
    }
</style>
@if($pagination -> hasPages())
<div class="pagination">
    <ul>
        @for($i = 1; $i <= $pagination -> lastPage(); ++$i)
            <li class="@if($i == $pagination -> currentPage()) active @endif">
                <a href="{{ $pagination -> url($i) }}">{{ $i }}</a>
            </li>
            @endfor

    </ul>
</div>
@endif
