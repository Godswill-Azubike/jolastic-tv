@if ($paginator->hasPages())
        <ul class="paginator">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginator__item paginator__item--prev">
                    <a aria-hidden="true"><i class="icon ion-ios-arrow-back"></i></a>
                </li>
            @else
                <li class="paginator__item">
                    <a href="{{ $paginator->previousPageUrl() }}"><i class="icon ion-ios-arrow-back"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginator__item"><a> {{ $element }} </a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginator__item paginator__item--active"><a> {{ $page }}</a></li>
                        @else
                            <li class="paginator__item"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginator__item paginator__item--next">
                    <a href="{{ $paginator->nextPageUrl() }}"><i class="icon ion-ios-arrow-forward"></i></a>
                </li>
            @else
                <li class="paginator__item paginator__item--next">
                    <a aria-hidden="true"><i class="icon ion-ios-arrow-forward"></i></a>
                </li>
            @endif
        </ul>
@endif
