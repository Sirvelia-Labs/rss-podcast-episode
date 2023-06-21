<div class="pb-grid pb-grid-cols-5 lg:pb-h-40 lg:pb-pb-0 pb-pb-3 pb-shadow-[0_0px_60px_-15px_rgba(0,0,0,0.3)] pb-rounded-lg pb-overflow-hidden"
    x-cloak x-data="singleAudioData(@js($episode))">

    <img :src="item.image" class="pb-bg-cover pb-h-40 pb-hidden lg:pb-inline">

    <div class="pb-col-span-5 lg:pb-col-span-4 pb-flex pb-flex-col">

        <div class="pb-flex-1 pb-px-4 pb-py-2">
            <div class="pb-grid pb-grid-cols-4">
                <div class="pb-col-span-4 lg:pb-col-span-3 pb-flex pb-flex-col pb-gap-y-2">
                    <p class="pb-text-lg lg:pb-text-2xl pb-font-bold pb-text-black pb-line-clamp-1" x-text="item.title">
                    </p>
                    <div class="pb-flex pb-text-sm lg:pb-text-base">
                        <p class="">{!! $title !!}</p>
                        <span>&nbsp; • &nbsp;</span>
                        <p class="pb-whitespace-nowrap" x-text="item.pubDate"></p>
                    </div>

                    <audio :src="item.enclosure" x-ref="audioin"></audio>

                    <div
                        class="pb-rounded-full pb-w-8 pb-h-8 pb-bg-green-400 pb-z-10 hover:pb-scale-110 pb-flex pb-justify-center pb-items-center">
                        <template x-if="!playing">
                            <div class="pb-border-b-transparent pb-border-b-[8px] pb-border-t-transparent pb-border-t-[8px] pb-border-l-[12px] pb-border-l-black"
                                x-on:click.stop="changePlaying()">
                            </div>
                        </template>
                        <template x-if="playing">
                            <div class="pb-border-black pb-border-l-4 pb-border-r-4 pb-w-1/2 pb-h-1/2"
                                x-on:click.stop="changePlaying()">
                            </div>
                        </template>
                    </div>

                </div>
            </div>
        </div>

        <div class="pb-flex pb-justify-between pb-px-4">
            <p x-text="currentTime"></p>
            <p x-text="item.duration"></p>
        </div>

        <div class="pb-w-full pb-h-2 pb-bg-slate-100" x-on:click="seek($event)" x-ref="progressBar">
            <div class="pb-h-full pb-bg-green-400" style="width: 0%;" x-ref="progress">
            </div>
        </div>

    </div>

</div>
