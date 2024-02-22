<?php
class RssPodcastEpisodeLast extends \FLBuilderModule
{

    public function __construct()
    {

        parent::__construct([
            'name' => __('Last Episode', 'rss-podcast-episode'),
            'description' => __('Displays the podcast last episode', 'rss-podcast-episode'),
            'group' => __('Podcast', 'rss-podcast-episode'),
            'category' => __('podcast', 'rss-podcast-episode'),
            'dir' => RSSPODCASTEPISODE_PATH . 'Components/beaver-builder/rss-podcast-episode-last',
            'url' => RSSPODCASTEPISODE_URL . 'Components/beaver-builder/rss-podcast-episode-last',
            'icon' => 'button.svg',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ]);
    }
}

if ( ! defined( 'ABSPATH' ) ) exit;

\FLBuilder::register_module('RssPodcastEpisodeLast', array(
    'podcast-tab'      => [
        'title'         => __('Config', 'rss-podcast-episode'),
        'sections'      => [
            'podcast-section'  => [
                'title'         => __('URL', 'rss-podcast-episode'),
                'fields'        => [
                    'podcast_url'     => [
                        'type'          => 'text',
                        'label'         => __('Podcast URL', 'rss-podcast-episode'),
                    ],
                ]
            ]
        ]
    ]
));
