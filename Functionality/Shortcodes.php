<?php

namespace RssPodcastEpisode\Functionality;

use RssPodcastEpisode\Includes\BladeLoader;
use RssPodcastEpisode\Components\FeedReader;

class Shortcodes
{

	protected $plugin_name;
	protected $plugin_version;

	private $blade;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;
		$this->blade = BladeLoader::getInstance();

		add_action('init', [$this, 'add_shortcodes']);
		add_filter('do_shortcode_tag', function ($output, $tag, $attr) {
			return "<span style='display: none;' class='plubo-shortcode' data-tag='$tag'></span>" . $output;
		}, 22, 3);
	}

	public function add_shortcodes()
	{
		add_shortcode('show_last_podcast_episode', [$this, 'show_last_podcast_episode']);
		add_shortcode('show_podcast_list', [$this, 'show_podcast_list']);
		return;
	}

	public function show_last_podcast_episode($atts, $content = "")
	{
		$atts = shortcode_atts([
			'url' => ''
		], $atts, 'show_last_podcast_episode');

		$feed = $atts['url'] ? FeedReader::get_feed($atts['url']) : [];
		return $this->blade->template('single-podcast', ['feed' => $feed]);
	}

	public function show_podcast_list($atts, $content = "")
	{
		$atts = shortcode_atts([
			'url' => ''
		], $atts, 'show_podcast_list');

		$feed = $atts['url'] ? FeedReader::get_feed($atts['url']) : [];
		return $this->blade->template('podcast-playlist', ['feed' => $feed]);
	}
}
