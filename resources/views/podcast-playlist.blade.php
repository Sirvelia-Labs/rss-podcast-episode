<div x-cloak x-data="{ showMoreItem: null, selectedItem: 0, playedItem: null }"
    class="pb-w-full pb-max-h-[700px] pb-overflow-y-scroll pb-shadow-[0_0px_60px_-15px_rgba(0,0,0,0.3)] podcast-scrollbar pb-gap-y-4 pb-flex pb-flex-col pb-p-6">


    @foreach ($feed as $item)
        <div class="pb-border pb-border-gray-200 pb-flex pb-flex-row pb-rounded-lg pb-p-6 pb-gap-x-6 pb-cursor-pointer"
            x-on:click="selectedItem = {{ $loop->index }}">
            <div class="pb-shrink-0 pb-w-14 pb-h-14 pb-relative pb-flex pb-justify-center pb-items-center">
                <div class="pb-w-full pb-h-full pb-rounded-md pb-flex pb-justify-center pb-items-center pb-relative">
                    <div
                        class="pb-rounded-full pb-w-1/2 pb-h-1/2 pb-bg-white pb-z-10 hover:pb-scale-110 pb-flex pb-justify-center pb-items-center">
                        <template x-if="playedItem !== {{ $loop->index }}">
                            <div class="pb-border-b-transparent pb-border-b-[8px] pb-border-t-transparent pb-border-t-[8px] pb-border-l-[12px] pb-border-l-black"
                                x-on:click.stop="playedItem = {{ $loop->index }}, selectedItem = {{ $loop->index }}">

                            </div>
                        </template>
                        <template x-if="playedItem === {{ $loop->index }}">
                            <div class="pb-border-black pb-border-l-4 pb-border-r-4 pb-w-1/2 pb-h-1/2"
                                x-on:click.stop="playedItem = null">

                            </div>
                        </template>
                    </div>

                    <img src="{{ $item['image'] }}" class="pb-absolute">
                </div>
                <template x-if="selectedItem === {{ $loop->index }}">
                    <div class="pb-w-2 pb-h-2 pb-bg-indigo-600 pb-rounded-full pb-absolute pb--left-4 pb-top-[24px]">

                    </div>
                </template>
            </div>

            <div class="pb-flex pb-flex-col pb-flex-shrink pb-flex-grow">
                <p class="pb-text-lg pb-font-bold pb-text-black pb-line-clamp-1">
                    {!! $item['title'] !!}</p>

                <div x-cloak class="pb-pt-4" :class="showMoreItem === {{ $loop->index }} ? '' : 'pb-line-clamp-2'">
                    {!! $item['description'] !!}</div>

                <template x-if="showMoreItem !== {{ $loop->index }}">
                    <p class="pb-text-black pb-font-bold pb-cursor-pointer pb-z-50"
                        x-on:click.stop="showMoreItem = {{ $loop->index }}">See more</p>
                </template>

                <template x-if="showMoreItem === {{ $loop->index }}">
                    <p class="pb-text-black pb-font-bold pb-cursor-pointer pb-z-50"
                        x-on:click.stop="showMoreItem = null">See less</p>
                </template>
            </div>

            <div class="pb-flex-col pb-justify-between pb-flex pb-flex-shrink pb-flex-grow pb-text-right">
                <p class="pb-whitespace-nowrap"> {!! $item['pubDate'] !!}</p>
                <p>{!! $item['duration'] !!}</p>
            </div>
        </div>
    @endforeach


</div>
