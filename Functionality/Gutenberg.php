<?php

namespace RssPodcastEpisode\Functionality;

use Carbon_Fields\Field;
use Carbon_Fields\Block;
use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

class Gutenberg
{

    protected $plugin_name;
    protected $plugin_version;
    protected $blade;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;
        $this->blade = BladeLoader::getInstance();

        add_action('after_setup_theme', array($this, 'load_cf'));
        add_action('carbon_fields_register_fields', array($this, 'add_gutenberg_blocks'));
    }

    public function load_cf()
    {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    public function add_gutenberg_blocks()
    {
        Block::make(__('Podcast: Last Episode'))
            ->add_fields(array(
                Field::make('separator', 'single_separator', __('Last Episode', 'rss-podcast-episode')),
                Field::make('text', 'url_single_podcast', __('Podcast URL')),
            ))
            ->set_icon('format-audio')
            ->set_category('rss-podcast-episode')
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
				wp_enqueue_style(RSSPODCASTEPISODE_NAME);
                wp_enqueue_script(RSSPODCASTEPISODE_NAME);
				
                $feed = $fields['url_single_podcast'] ? FeedReader::get_last_episode($fields['url_single_podcast']) : [];

                echo wp_kses($this->blade->template('single-podcast', ['episode' => $feed['episode'], 'title' => $feed['title']]), 'rsspodcastepisode-alpine');
            });


        Block::make(__('Podcast: Podcast Playlist'))
            ->add_fields(array(
                Field::make('separator', 'playlist_separator', __('Podcast Playlist', 'rss-podcast-episode')),
                Field::make('text', 'url_podcast_playlist', __('Podcast URL')),
            ))
            ->set_icon('playlist-audio')
            ->set_category('rss-podcast-episode')
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
				wp_enqueue_style(RSSPODCASTEPISODE_NAME);
                wp_enqueue_script(RSSPODCASTEPISODE_NAME);
				
                $feed = $fields['url_podcast_playlist'] ? FeedReader::get_feed($fields['url_podcast_playlist']) : [];

                echo wp_kses($this->blade->template('podcast-playlist', ['feed' => $feed['items'], 'title' => $feed['title']]), 'rsspodcastepisode-alpine');
            });
    }
}
