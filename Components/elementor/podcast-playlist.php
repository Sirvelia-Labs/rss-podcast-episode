<?php

use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

class Elementor_PodcastPlaylist extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'podcast_playlist';
    }

    public function get_title()
    {
        return esc_html__('Podcast Playlist', 'rss-podcast-episode');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['podcast'];
    }

    public function get_keywords()
    {
        return ['podcast', 'rss'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('URL', 'rss-podcast-episode'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'podcast_url',
            [
                'label' => esc_html__('Podcast URL', 'rss-podcast-episode'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $feed = $settings['podcast_url'] ? FeedReader::get_feed($settings['podcast_url']) : [];
        echo BladeLoader::getInstance()->template('podcast-playlist', ['feed' => $feed['items'], 'title' => $feed['title']]);
    }
}
