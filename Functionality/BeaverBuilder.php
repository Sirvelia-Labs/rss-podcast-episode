<?php

namespace RssPodcastEpisode\Functionality;

use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

class BeaverBuilder
{

    protected $plugin_name;
    protected $plugin_version;
    protected $blade;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;
        $this->blade = BladeLoader::getInstance();

        add_action('init', array($this, 'load_modules'));
    }

    public function load_modules()
    {
        if ( class_exists( 'FLBuilder' ) ) {
            require_once RSSPODCASTEPISODE_PATH . 'Components/beaver-builder/last-episode/last-episode.php';
            require_once RSSPODCASTEPISODE_PATH . 'Components/beaver-builder/podcast-playlist/podcast-playlist.php';
        }
    }

}
