<div class="pb-shadow-[0_0px_60px_-15px_rgba(0,0,0,0.3)] pb-rounded-lg pb-overflow-hidden" x-cloak
    x-data="{ showMoreItem: null, selectedItem: 0, playedItem: null, items: @js($feed) }">
    {{-- TODO: PONER PB-H-40 --}}
    <div class="pb-grid pb-grid-cols-5" x-data="audioData">
        <div class="pb-w-40 pb-h-40 pb-z-20">
            <img :src="items[selectedItem].image">
        </div>
        <div class="pb-col-span-4 pb-flex pb-flex-col">
            {{-- <p x-text="items[selectedItem].title"></p> --}}

            <div class=" pb-flex-1 pb-p-4">
                <div class="pb-grid pb-grid-cols-4">
                    <div class="pb-col-span-3 pb-flex pb-flex-col pb-gap-y-2">
                        <p class="pb-text-2xl pb-font-bold pb-text-black pb-line-clamp-1"
                            x-text="items[selectedItem].title">
                        </p>
                        <div class="pb-flex">
                            <p>Así lo hacen | Put*s Locos</p>
                            <span>&nbsp; • &nbsp;</span>
                            <p class="pb-whitespace-nowrap" x-text="items[selectedItem].pubDate"></p>

                        </div>

                        {{-- TODO: EJEMPLOS --}}
                        <p x-text="currentTime"></p>
                        <audio :src="items[selectedItem].enclosure" controls x-ref="audioin"></audio>

                    </div>
                </div>
            </div>
            <div class="pb-w-full pb-h-2 pb-bg-slate-100" x-on:click="seek($event)">
                <div class="pb-h-full pb-bg-green-400" style="width: 0%;" x-ref="progress">
                </div>
            </div>

        </div>

    </div>
    <div
        class="pb-w-full pb-max-h-[700px] pb-overflow-y-scroll podcast-scrollbar pb-gap-y-4 pb-flex pb-flex-col pb-p-6">


        <template x-for="(item,index) in items" :key="index">
            <div class="pb-border pb-border-gray-200 pb-flex pb-flex-row pb-rounded-lg pb-p-6 pb-gap-x-6 pb-cursor-pointer"
                x-on:click="selectedItem = index">
                <div class="pb-shrink-0 pb-w-14 pb-h-14 pb-relative pb-flex pb-justify-center pb-items-center">
                    <div
                        class="pb-w-full pb-h-full pb-rounded-md pb-flex pb-justify-center pb-items-center pb-relative">
                        <div
                            class="pb-rounded-full pb-w-1/2 pb-h-1/2 pb-bg-white pb-z-10 hover:pb-scale-110 pb-flex pb-justify-center pb-items-center">
                            <template x-if="playedItem !== index">
                                <div class="pb-border-b-transparent pb-border-b-[8px] pb-border-t-transparent pb-border-t-[8px] pb-border-l-[12px] pb-border-l-black"
                                    x-on:click.stop="playedItem = index; selectedItem = index; $refs.audioin.play()">
                                </div>
                            </template>
                            <template x-if="playedItem === index">
                                <div class="pb-border-black pb-border-l-4 pb-border-r-4 pb-w-1/2 pb-h-1/2"
                                    x-on:click.stop="playedItem = null; $refs.audioin.pause()">

                                </div>
                            </template>
                        </div>

                        <img :src="item.image" class="pb-absolute">
                    </div>
                    <template x-if="selectedItem === index">
                        <div
                            class="pb-w-2 pb-h-2 pb-bg-indigo-600 pb-rounded-full pb-absolute pb--left-4 pb-top-[24px]">

                        </div>
                    </template>
                </div>

                <div class="pb-flex pb-flex-col pb-flex-shrink pb-flex-grow">
                    <p class="pb-text-lg pb-font-bold pb-text-black pb-line-clamp-1" x-text="item.title">
                    </p>

                    <div x-cloak class="pb-pt-4" :class="showMoreItem === index ? '' : 'pb-line-clamp-2'"
                        x-html="item.description">
                    </div>

                    <template x-if="showMoreItem !== index">
                        <p class="pb-text-black pb-font-bold pb-cursor-pointer pb-z-50"
                            x-on:click.stop="showMoreItem = index">See more</p>
                    </template>

                    <template x-if="showMoreItem === index">
                        <p class="pb-text-black pb-font-bold pb-cursor-pointer pb-z-50"
                            x-on:click.stop="showMoreItem = null">See less</p>
                    </template>
                </div>

                <div class="pb-flex-col pb-justify-between pb-flex pb-flex-shrink pb-flex-grow pb-text-right">
                    <p class="pb-whitespace-nowrap" x-text="item.pubDate"></p>
                    <p x-text="item.duration"></p>
                </div>
            </div>
        </template>


    </div>
</div>

<style>
    #progressBar {
        width: 100%;
        height: 10px;
        background-color: #ddd;
    }
</style>
