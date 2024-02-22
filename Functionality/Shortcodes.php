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
		add_shortcode('rsspodcastepisode_last', [$this, 'show_last_podcast_episode']);
		add_shortcode('rsspodcastepisode_playlist', [$this, 'show_podcast_list']);
	}

	public function show_last_podcast_episode($atts, $content = "")
	{
		wp_enqueue_style(RSSPODCASTEPISODE_NAME);
        wp_enqueue_script(RSSPODCASTEPISODE_NAME);

		$atts = shortcode_atts([
			'url' => ''
		], $atts, 'rsspodcastepisode_last');

		$feed = $atts['url'] ? FeedReader::get_last_episode( sanitize_text_field($atts['url']) ) : false;
		if(!$feed) return '';


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
		], $atts, 'rsspodcastepisode_playlist');

		$feed = $atts['url'] ? FeedReader::get_feed( sanitize_text_field($atts['url']) ) : false;
		if(!$feed) return '';

		return $this->blade->template('podcast-playlist', [
			'feed' => $feed['items'],
			'title' => $feed['title']
		]);
	}
}
