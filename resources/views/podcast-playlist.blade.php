<?php if (!defined('ABSPATH')) {
    exit();
} ?>

<div class="rpe-podcast-container" x-cloak x-data="audioData(@js($feed))">

    <div class="rpe-current-container rpe-item">

        <img loading="lazy" x-bind:src="items[selectedItem].image" class="rpe-current-img">

        <div class="rpe-inner">

            <p class="rpe-episode-title"
                x-text="items[selectedItem].title">
            </p>
            
            <div class="rpe-current-subtitle">
                <p class="rpe-current-podcast-title">{!! esc_html($title) !!}</p>
                <span>&nbsp; • &nbsp;</span>
                <p class="rpe-current-pubdate" x-text="items[selectedItem].pubDate"></p>
            </div>

            <audio class="rpe-audio" x-bind:src="items[selectedItem].enclosure" x-ref="audioin"></audio>

            <div class="rpe-playing-container">
                <template x-if="!playing">
                    <div class="rpe-not-playing"
                        x-on:click.stop="changePlaying(selectedItem)">
                    </div>
                </template>
                <template x-if="playing">
                    <div class="rpe-playing"
                        x-on:click.stop="changePlaying(selectedItem)">
                    </div>
                </template>
            </div>

            <div class="rpe-move-controls">
                <div class="rpe-move-back"
                    x-on:click.stop="moveBackSeconds">
                    <p class="">{!! esc_html__('-30s', 'rss-podcast-episode') !!}</p>
                </div>

                <div class="rpe-advance"
                    x-on:click.stop="advanceSeconds">
                    <p class="">{!! esc_html__('+30s', 'rss-podcast-episode') !!}</p>
                </div>
            </div>

            <div class="rpe-times">
                <p class="rpe-current-time" x-text="currentTime"></p>
                <p class="rpe-current-duration" x-text="items[selectedItem].duration"></p>
            </div>

            <div class="rpe-progressbar" x-on:click="seek($event)" x-ref="progressBar">
                <div class="rpe-progress" style="width: 0%;" x-ref="progress"></div>
            </div>

        </div>

    </div>


    <div class="rpe-playlist podcast-scrollbar">

        <template x-for="(item,index) in items" x-bind:key="index">
            <div x-bind:class="(selectedItem === index) ? 'rpe-selected-item' : 'rpe-unselected-item'" class="rpe-item" x-on:click="changePlaying(index)">

                <div class="rpe-item-img-container">
                    
                    <div class="rpe-item-playing-container">
                        <template x-if="selectedItem !== index || !playing">
                            <div class="rpe-item-not-playing"></div>
                        </template>
                        <template x-if="selectedItem === index && playing">
                            <div class="rpe-item-playing"
                                x-on:click.stop="$refs.audioin.pause(); playing = false">
                            </div>
                        </template>
                    </div>
                    
                    <img loading="lazy" x-bind:src="item.image" class="rpe-item-img">

                    <template x-if="selectedItem === index">
                        <div class="rpe-item-selected-icon"></div>
                    </template>

                </div>

                <div class="rpe-inner">
                    <p class="rpe-episode-title" x-text="item.title"></p>

                    <div class="rpe-times">
                        <p class="rpe-item-pubdate" x-text="item.pubDate"></p>
                        <p class="rpe-item-duration" x-text="item.duration"></p>
                    </div>

                    {{-- <div class="rpe-item-description-container">
                        <div x-cloak class="rpe-item-description" x-html="item.description"></div>

                        <template x-if="showMoreItem !== index">
                            <p class="rpe-item-seemore" x-on:click.stop="showMoreItem = index">{!! esc_html__('See more', 'rss-podcast-episode') !!}</p>
                        </template>

                        <template x-if="showMoreItem === index">
                            <p class="rpe-item-seeless" x-on:click.stop="showMoreItem = null">{!! esc_html__('See less', 'rss-podcast-episode') !!}</p>
                        </template>
                    </div> --}}

                </div>

            </div>
        </template>

    </div>
</div>
