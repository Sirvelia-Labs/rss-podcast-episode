<?php

namespace RssPodcastEpisode\Functionality;

use RssPodcastEpisode\Includes\BladeLoader;

class Elementor
{

    protected $plugin_name;
    protected $plugin_version;
    protected $blade;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;
        $this->blade = BladeLoader::getInstance();

        add_action('elementor/widgets/register', [$this, 'register_modules']);
    }

    public function register_modules($widgets_manager)
    {
        require_once RSSPODCASTEPISODE_PATH . 'Components/elementor/rss-podcast-episode-last.php';
        require_once RSSPODCASTEPISODE_PATH . 'Components/elementor/rss-podcast-episode-playlist.php';

        $widgets_manager->register(new \RssPodcastEpisodeLast());
        $widgets_manager->register(new \RssPodcastEpisodePlaylist());
    }
}
