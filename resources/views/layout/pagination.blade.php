@if ($paginator->hasPages())
    <nav class="d-inline-block m-auto">
        <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="paginate_button page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="paginate_button page-item">
                        <a class="page-link" href="{{ str_contains(\Illuminate\Support\Facades\Request::fullUrl() , '?') ? str_replace(('page='.substr($paginator->currentPage(), -1)) , '' , \Illuminate\Support\Facades\Request::fullUrl())  . '&page='.substr($paginator->previousPageUrl(), -1) : $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="paginate_button page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="paginate_button page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="paginate_button page-item"><a class="page-link" href="{{ str_contains(\Illuminate\Support\Facades\Request::fullUrl() , '?') ? str_replace(('page='.substr($paginator->currentPage(), -1)) , '' , \Illuminate\Support\Facades\Request::fullUrl())  . '&page='.$page : $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="paginate_button page-item">
                        <a class="page-link" href="{{ str_contains(\Illuminate\Support\Facades\Request::fullUrl() , '?') ? str_replace(('page='.substr($paginator->currentPage(), -1)) , '' , \Illuminate\Support\Facades\Request::fullUrl())  . '&page='.substr($paginator->nextPageUrl(), -1) : $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="paginate_button page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
