<?php
use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

$feed = $settings->podcast_url ? FeedReader::get_feed($settings->podcast_url) : [];
echo BladeLoader::getInstance()->template('podcast-playlist', ['feed' => $feed['items'], 'title' => $feed['title']]);