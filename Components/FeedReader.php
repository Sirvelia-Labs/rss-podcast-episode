<?php

namespace RssPodcastEpisode\Components;

class FeedReader
{

    public static function get_feed($anchor_feed_url)
    {
        // Fetch the podcast feed XML from the Anchor feed URL
        $response = wp_remote_get($anchor_feed_url);
        $podcast_feed_xml = wp_remote_retrieve_body($response);

        // Check if the podcast feed XML is valid
        if (empty($podcast_feed_xml)) return [];

        // Load and parse the podcast feed XML
        $podcast_feed = simplexml_load_string($podcast_feed_xml);
        if (!$podcast_feed) return [];

        $items = [];
        foreach ($podcast_feed->channel->item as $item) {
            $items[] = [
                'title' => (string) $item->title,
                'description' => (string) $item->description,
                'link' => (string) $item->link,
                'guid' => (string) $item->guid,
                'pubDate' => date('d M Y', strtotime((string) $item->pubDate)),
                'duration' => ltrim((string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->duration, '0:'),
                'image' => (string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->image->attributes()->href,
                'enclosure' => (string) $item->enclosure['url']
            ];
        }

        pb_log($items);

        return $items;
    }
}
