<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="pb-shadow-[0_0px_60px_-15px_rgba(0,0,0,0.3)] pb-rounded-lg pb-overflow-hidden" x-cloak
    x-data="audioData(@js($feed))">
    <div class="pb-grid pb-grid-cols-5 lg:pb-h-40 lg:pb-pb-0 pb-pb-3">

        <img x-bind:src="items[selectedItem].image" class="pb-object-cover pb-h-40 pb-hidden lg:pb-inline">

        <div class="pb-col-span-5 lg:pb-col-span-4 pb-flex pb-flex-col">

            <div class="pb-flex-1 pb-px-4 pb-py-2">
                <div class="pb-grid pb-grid-cols-4">
                    <div class="pb-col-span-4 lg:pb-col-span-3 pb-flex pb-flex-col pb-gap-y-2">
                        <p class="pb-text-lg lg:pb-text-2xl pb-font-bold pb-text-black pb-line-clamp-1"
                            x-text="items[selectedItem].title">
                        </p>
                        <div class="pb-flex pb-text-sm lg:pb-text-base">
                            <p class="">{!! esc_html($title) !!}</p>
                            <span>&nbsp; • &nbsp;</span>
                            <p class="pb-whitespace-nowrap" x-text="items[selectedItem].pubDate"></p>
                        </div>

                        <audio x-bind:src="items[selectedItem].enclosure" x-ref="audioin"></audio>

                        <div
                            class="pb-rounded-full pb-w-8 pb-h-8 pb-bg-green-400 pb-z-10 hover:pb-scale-110 pb-flex pb-justify-center pb-items-center pb-cursor-pointer">
                            <template x-if="!playing">
                                <div class="pb-border-b-transparent pb-border-b-[8px] pb-border-t-transparent pb-border-t-[8px] pb-border-l-[12px] pb-border-l-black"
                                    x-on:click.stop="changePlaying(selectedItem)">
                                </div>
                            </template>
                            <template x-if="playing">
                                <div class="pb-border-black pb-border-l-4 pb-border-r-4 pb-w-1/2 pb-h-1/2"
                                    x-on:click.stop="changePlaying(selectedItem)">
                                </div>
                            </template>
                        </div>

                    </div>

                    <div class="pb-col-span-4 lg:pb-col-span-1 pb-h-full pb-flex pb-flex-col">
                        <div class="pb-mt-auto pb-flex pb-justify-end pb-gap-x-2">
                            <div class="pb-rounded-full pb-p-1 pb-cursor-pointer pb-border-black pb-border-2 hover:pb-bg-black hover:pb-text-white"
                                x-on:click.stop="moveBackSeconds">
                                <p class="pb-text-sm pb-font-semibold">-30s</p>
                            </div>

                            <div class="pb-rounded-full pb-p-1 pb-cursor-pointer pb-border-black pb-border-2 hover:pb-bg-black hover:pb-text-white"
                                x-on:click.stop="advanceSeconds">
                                <p class="pb-text-sm pb-font-semibold">+30s</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-flex pb-justify-between pb-px-4">
                <p x-text="currentTime"></p>
                <p x-text="items[selectedItem].duration"></p>
            </div>

            <div class="pb-w-full pb-h-2 pb-bg-slate-100" x-on:click="seek($event)" x-ref="progressBar">
                <div class="pb-h-full pb-bg-green-400" style="width: 0%;" x-ref="progress">
                </div>
            </div>

        </div>

    </div>
    <div
        class="pb-w-full pb-max-h-[700px] pb-overflow-y-scroll podcast-scrollbar pb-gap-y-4 pb-flex pb-flex-col pb-p-2 lg:pb-p-6">


        <template x-for="(item,index) in items" x-bind:key="index">
            <div x-bind:class="(selectedItem === index) ? 'pb-border-green-400' : 'pb-border-gray-200'" class="pb-border pb-flex pb-flex-row pb-rounded-lg pb-p-4 lg:pb-p-6 pb-gap-x-6 pb-cursor-pointer"
                x-on:click="changePlaying(index)">
                <div
                    class="pb-shrink-0 pb-w-14 pb-h-14 pb-relative pb-justify-center pb-items-center pb-hidden lg:pb-flex">
                    <div class="pb-w-full pb-h-full pb-rounded-md pb-justify-center pb-items-center pb-relative pb-flex">
                        <div class="pb-rounded-full pb-w-1/2 pb-h-1/2 pb-bg-white pb-z-10 hover:pb-scale-110 pb-flex pb-justify-center pb-items-center">
                            <template x-if="selectedItem !== index || !playing">
                                <div
                                    class="pb-border-b-transparent pb-border-b-[8px] pb-border-t-transparent pb-border-t-[8px] pb-border-l-[12px] pb-border-l-black">
                                </div>
                            </template>
                            <template x-if="selectedItem === index && playing">
                                <div class="pb-border-black pb-border-l-4 pb-border-r-4 pb-w-1/2 pb-h-1/2"
                                    x-on:click.stop="$refs.audioin.pause(); playing = false">
                                </div>
                            </template>
                        </div>

                        <img x-bind:src="item.image" class="pb-absolute">
                    </div>

                    <template x-if="selectedItem === index">
                        <div class="pb-w-2 pb-h-2 pb-bg-green-400 pb-rounded-full pb-absolute pb--left-4 pb-top-[24px]">
                        </div>
                    </template>
                </div>

                <div class="pb-flex pb-flex-col pb-flex-1 pb-relative">

                    <p class="pb-text-lg pb-font-bold pb-text-black pb-line-clamp-2 lg:pb-line-clamp-1"
                        x-text="item.title">
                    </p>

                    <div
                        class="pb-flex-row pb-justify-between pb-flex pb-text-right lg:pb-hidden pb-pt-2">
                        <p class="pb-whitespace-nowrap pb-text-sm" x-text="item.pubDate"></p>
                        <p class="pb-text-sm" x-text="item.duration"></p>
                    </div>

                    <div class="pb-hidden lg:pb-inline">
                        <div x-cloak class="pb-pt-4" x-bind:class="showMoreItem === index ? '' : 'pb-line-clamp-2'"
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
                </div>

                <div
                    class="pb-flex-col pb-justify-between lg:pb-flex pb-hidden pb-text-right">
                    <p class="pb-whitespace-nowrap" x-text="item.pubDate"></p>
                    <p x-text="item.duration"></p>
                </div>
            </div>
        </template>


    </div>
</div>