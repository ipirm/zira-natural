@if ($paginator->lastPage() > 1)
    <div class="pages">
        <ul>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li>
                <a class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
    </ul>
    </div>
@endif
