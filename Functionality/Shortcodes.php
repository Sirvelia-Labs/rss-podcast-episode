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
	}

	public function add_shortcodes()
	{
		add_shortcode('show_last_podcast_episode', [$this, 'show_last_podcast_episode']);
		add_shortcode('show_podcast_list', [$this, 'show_podcast_list']);
	}

	public function show_last_podcast_episode($atts, $content = "")
	{
		wp_enqueue_style(RSSPODCASTEPISODE_NAME);
        wp_enqueue_script(RSSPODCASTEPISODE_NAME);

		$atts = shortcode_atts([
			'url' => ''
		], $atts, 'show_last_podcast_episode');

		$feed = $atts['url'] ? FeedReader::get_last_episode($atts['url']) : [];

		return $this->blade->template('single-podcast', [
			'episode' => $feed['episode'],
			'title' => $feed['title']
		]);
	}

	public function show_podcast_list($atts, $content = "")
	{
		wp_enqueue_style(RSSPODCASTEPISODE_NAME);
        wp_enqueue_script(RSSPODCASTEPISODE_NAME);

		$atts = shortcode_atts([
			'url' => ''
		], $atts, 'show_podcast_list');

		$feed = $atts['url'] ? FeedReader::get_feed($atts['url']) : [];

		return $this->blade->template('podcast-playlist', [
			'feed' => $feed['items'],
			'title' => $feed['title']
		]);
	}
}
