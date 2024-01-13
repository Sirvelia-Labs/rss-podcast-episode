<?php
class LastEpisode extends \FLBuilderModule
{

    public function __construct()
    {

        parent::__construct([
            'name' => __('Last Episode', 'rss-podcast-episode'),
            'description' => __('Displays the podcast last episode', 'rss-podcast-episode'),
            'group' => __('Podcast', 'rss-podcast-episode'),
            'category' => __('podcast', 'rss-podcast-episode'),
            'dir' => RSSPODCASTEPISODE_PATH . 'Components/beaver-builder/last-episode',
            'url' => RSSPODCASTEPISODE_URL . 'Components/beaver-builder/last-episode',
            'icon' => 'button.svg',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ]);
    }
}

\FLBuilder::register_module('LastEpisode', array(
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
