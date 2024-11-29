<?php if (!defined('ABSPATH')) {
    exit();
} ?>

<div class="rpe-podcast-container" x-cloak x-data="singleAudioData(@js($episode))">

    <div class="rpe-last-container rpe-current-container rpe-item">

        <img x-on:click.stop="changePlaying()" loading="lazy" x-bind:src="item.image" class="rpe-current-img">

        <div class="rpe-inner">

            <p class="rpe-episode-title" x-text="item.title">
            </p>

            <div class="rpe-current-subtitle">
                <p class="rpe-current-podcast-title">{!! esc_html($title) !!}</p>
                <span>&nbsp; • &nbsp;</span>
                <p class="rpe-current-pubdate" x-text="item.pubDate"></p>
            </div>

            <audio class="rpe-audio" x-bind:src="item.enclosure" x-ref="audioin"></audio>

            <div class="rpe-playing-container">
                <template x-if="!playing">
                    <div class="rpe-not-playing"
                        x-on:click.stop="changePlaying()">
                    </div>
                </template>
                <template x-if="playing">
                    <div class="rpe-playing"
                        x-on:click.stop="changePlaying()">
                    </div>
                </template>
            </div>

            <div class="rpe-move-controls">
                <button class="rpe-move-back"
                    x-on:click.stop="moveBackSeconds">
                    <p class="">{!! esc_html__('-30s', 'rss-podcast-episode') !!}</p>
                </button>

                <button class="rpe-advance"
                    x-on:click.stop="advanceSeconds">
                    <p class="">{!! esc_html__('+30s', 'rss-podcast-episode') !!}</p>
                </button>
            </div>
                            
            <div class="rpe-times">
                <p class="rpe-current-time" x-text="currentTime"></p>
                <p class="rpe-current-duration" x-text="item.duration"></p>
            </div>

            <div class="rpe-progressbar" x-on:click="seek($event)" x-ref="progressBar">
                <div class="rpe-progress" style="width: 0%;" x-ref="progress"></div>
            </div>

        </div>

    </div>

</div>
