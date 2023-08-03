@if ($paginator->hasPages())

        <div class="pagination w-full justify-between items-center text-white font-bold">

            {{-- Previous Page Link --}}
            <div>
                @if ($paginator->onFirstPage())
                <div class="disabled w-[30px] h-[30px] p-6 text-xl rounded-full bg-[#FCAF17] flex justify-center items-center  cursor-not-allowed" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </div>
            @else
                <div class=" w-[30px] h-[30px] p-6 text-xl rounded-full bg-[#FCAF17] flex justify-center items-center ">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </div>
            @endif
            </div>


            {{-- Pagination Elements --}}
            <div class="flex gap-2 justify-around">
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="disabled  w-[30px] h-[30px] p-6 text-xl rounded-full bg-[#FCAF17] flex justify-center items-center" aria-disabled="true"><span>{{ $element }}</span></div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="active disabled w-[30px] h-[30px] p-6 text-xl rounded-full bg-[#0054FF] flex justify-center items-center" aria-current="page"><span>{{ $page }}</span></div>
                        @else
                            <div class="disabled w-[30px] h-[30px] p-6 text-xl rounded-full bg-[#0055ffc8] flex justify-center items-center"><a href="{{ $url }}">{{ $page }}</a></div>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </div>


            {{-- Next Page Link --}}
            <div>
                @if ($paginator->hasMorePages())
                <div class="disabled w-[30px] h-[30px] p-6 text-xl rounded-full bg-[#FCAF17] flex justify-center items-center">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </div>
            @else
                <div class="disabled  w-[30px] h-[30px] p-6 text-xl rounded-full bg-[#FCAF17] flex justify-center items-center cursor-not-allowed" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </div>
            @endif
            </div>

        </div>

@endif
{{--  --}}

