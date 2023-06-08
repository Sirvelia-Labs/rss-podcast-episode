<div x-data="{ showMore: false }"
    class="pb-w-full pb-max-h-[700px] pb-overflow-y-scroll pb-shadow-[0_0px_60px_-15px_rgba(0,0,0,0.3)] podcast-scrollbar pb-gap-y-4 pb-flex pb-flex-col pb-p-6">
    @foreach ($feed as $item)
        <div class="pb-border pb-border-gray-400 pb-flex pb-flex-row pb-rounded-lg pb-p-6 pb-gap-x-6">
            <div class="pb-shrink-0 pb-w-14 pb-h-14"><img src="{{ $item['image'] }}"></div>

            <div class="pb-flex pb-flex-col pb-flex-shrink pb-flex-grow">
                <p class="pb-text-lg pb-font-bold pb-text-black pb-line-clamp-1">
                    {!! $item['title'] !!}</p>

                <p class="pb-line-clamp-1 pb-pt-4">{!! $item['description'] !!}</p>

                <template x-if="!showMore">
                    <p class="pb-text-black pb-font-bold cursor-pointer" x-on:click="showMore = true">See more</p>
                </template>

                <template x-if="showMore">
                    <p class="pb-text-black pb-font-bold cursor-pointer" x-on:click="showMore = false">See less</p>
                </template>
            </div>

            <div class="pb-flex-col pb-justify-between pb-flex pb-flex-shrink pb-flex-grow pb-text-right">
                <p class="pb-whitespace-nowrap"> {!! $item['pubDate'] !!}</p>
                <p>{!! $item['duration'] !!}</p>
            </div>
        </div>
    @endforeach
</div>
