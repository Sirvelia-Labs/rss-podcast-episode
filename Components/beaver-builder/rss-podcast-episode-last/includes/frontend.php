<?php
if ( ! defined( 'ABSPATH' ) ) exit;

use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;
use RssPodcastEpisode\Components\Escape;

wp_enqueue_style(RSSPODCASTEPISODE_NAME);
wp_enqueue_script(RSSPODCASTEPISODE_NAME);

$feed = $settings->podcast_url ? FeedReader::get_last_episode($settings->podcast_url) : false;
if($feed) {
    $template = BladeLoader::getInstance()->template('single-podcast', ['episode' => $feed['episode'], 'title' => $feed['title']]);
    echo wp_kses($template, Escape::alpine_template($template));
}