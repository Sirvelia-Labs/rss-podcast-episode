<?php

namespace RssPodcastEpisode\Components;

class FeedReader
{

    public static function get_feed($anchor_feed_url)
    {
        // Fetch the podcast feed XML from the feed URL
        $response = wp_remote_get($anchor_feed_url);
        $podcast_feed_xml = wp_remote_retrieve_body($response);

        // Check if the podcast feed XML is valid
        if (empty($podcast_feed_xml)) return [];

        // Load and parse the podcast feed XML
        $podcast_feed = simplexml_load_string($podcast_feed_xml);
        if (!$podcast_feed) return [];
        $channel = $podcast_feed->channel ?? '';
        $title = $channel->title ?? '';

        $items = [];
        foreach ($channel->item as $item) {
            $enclosure = $item->enclosure ?? [];

            $items[] = [
                'title' => (string) ($item->title ?? ''),
                'description' => (string) ($item->description ?? ''),
                'link' => (string) ($item->link ?? ''),
                'guid' => (string) ($item->guid ?? ''),
                'pubDate' => gmdate('d M Y', strtotime((string) $item->pubDate)),
                'duration' => ltrim((string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->duration, '0:'),
                'image' => (string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->image->attributes()->href,
                'enclosure' => (string) ($enclosure['url'] ?? '')
            ];
        }


        return [
            'items' => $items,
            'title' => $title,
        ];
    }

    public static function get_last_episode($anchor_feed_url)
    {
        // Fetch the podcast feed XML from the feed URL
        $response = wp_remote_get($anchor_feed_url);
        $podcast_feed_xml = wp_remote_retrieve_body($response);

        // Check if the podcast feed XML is valid
        if (empty($podcast_feed_xml)) return [];

        // Load and parse the podcast feed XML
        $podcast_feed = simplexml_load_string($podcast_feed_xml);
        if (!$podcast_feed) return [];
        $channel = $podcast_feed->channel;
        $title = $channel->title;

        $item = $channel->item[0];
        $enclosure = $item->enclosure ?? [];

        $episode = [
            'title' => (string) ($item->title ?? ''),
            'description' => (string) ($item->description ?? ''),
            'link' => (string) ($item->link ?? ''),
            'guid' => (string) ($item->guid ?? ''),
            'pubDate' => gmdate('d M Y', strtotime((string) $item->pubDate)),
            'duration' => ltrim((string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->duration, '0:'),
            'image' => (string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->image->attributes()->href,
            'enclosure' => (string) ($enclosure['url'] ?? '')
        ];

        return [
            'episode' => $episode,
            'title' => $title,
        ];
    }
}
