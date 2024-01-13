<?php
use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

wp_enqueue_style(RSSPODCASTEPISODE_NAME);
wp_enqueue_script(RSSPODCASTEPISODE_NAME);

$feed = $settings->podcast_url ? FeedReader::get_last_episode($settings->podcast_url) : [];
echo BladeLoader::getInstance()->template('single-podcast', ['episode' => $feed['episode'], 'title' => $feed['title']]);