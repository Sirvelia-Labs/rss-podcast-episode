<?php
if ( ! defined( 'ABSPATH' ) ) exit;

use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

wp_enqueue_style(RSSPODCASTEPISODE_NAME);
wp_enqueue_script(RSSPODCASTEPISODE_NAME);

$feed = $settings->podcast_url ? FeedReader::get_last_episode($settings->podcast_url) : false;
echo $feed ? wp_kses(BladeLoader::getInstance()->template('single-podcast', ['episode' => $feed['episode'], 'title' => $feed['title']]), 'rsspodcastepisode-alpine') : esc_html('');