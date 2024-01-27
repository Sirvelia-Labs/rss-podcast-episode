<?php

use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

class Elementor_LastEpisode extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'last_episode';
    }

    public function get_title()
    {
        return esc_html__('Last Episode', 'rss-podcast-episode');
    }

    public function get_icon()
    {
        return 'eicon-play-o';
    }

    public function get_categories()
    {
        return ['podcast'];
    }

    public function get_keywords()
    {
        return ['podcast', 'rss'];
    }

    public function get_script_depends() {
		return [ RSSPODCASTEPISODE_NAME ];
	}

    public function get_style_depends() {
		return [ RSSPODCASTEPISODE_NAME ];
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
        $feed = $settings['podcast_url'] ? FeedReader::get_last_episode($settings['podcast_url']) : false;

        echo $feed ? BladeLoader::getInstance()->template('single-podcast', ['episode' => $feed['episode'], 'title' => $feed['title']]) : false;
    }
}
