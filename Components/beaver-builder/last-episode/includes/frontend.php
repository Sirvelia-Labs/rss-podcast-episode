<?php
use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

$feed = $settings->podcast_url ? FeedReader::get_last_episode($settings->podcast_url) : false;
echo $feed ? BladeLoader::getInstance()->template('single-podcast', ['episode' => $feed['episode'], 'title' => $feed['title']]) : '';