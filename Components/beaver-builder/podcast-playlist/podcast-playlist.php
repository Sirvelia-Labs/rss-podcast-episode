<?php
class PodcastPlaylist extends \FLBuilderModule
{

    public function __construct()
    {
        parent::__construct([
            'name' => __('Podcast Playlist', 'rss-podcast-episode'),
            'description' => __('Displays the podcast last episode', 'rss-podcast-episode'),
            'group' => __('Podcast', 'rss-podcast-episode'),
            'category' => __('podcast', 'rss-podcast-episode'),
            'dir' => RSSPODCASTEPISODE_PATH . 'Components/beaver-builder/podcast-playlist',
            'url' => RSSPODCASTEPISODE_URL . 'Components/beaver-builder/podcast-playlist',
            'icon' => 'button.svg',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ]);
    }
}

\FLBuilder::register_module('PodcastPlaylist', [
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
]);
