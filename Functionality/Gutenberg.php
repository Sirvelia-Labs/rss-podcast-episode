<?php

namespace RssPodcastEpisode\Functionality;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;
use RssPodcastEpisode\Includes\BladeLoader;

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
        Block::make(__('Podcast: Single Podcast'))
            ->add_fields(array(
                Field::make('separator', 'single_separator', __('Single Podcast', 'rss-podcast-episode')),
                Field::make('text', 'url_single_podcast', __('URL')),
            ))
            ->set_icon('format-audio')
            ->set_category('sirvelia')
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
                echo $this->blade->template('blocks/single-podcast', array('fields' => $fields));
            });


        Block::make(__('Podcast: Podcast Playlist'))
            ->add_fields(array(
                Field::make('separator', 'playlist_separator', __('Podcast Playlist', 'rss-podcast-episode')),
                Field::make('text', 'url_podcast_playlist', __('URL')),
            ))
            ->set_icon('playlist-audio')
            ->set_category('sirvelia')
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
                echo  $this->blade->template('blocks/podcast-playlist', array('fields' => $fields));
            });
    }
}