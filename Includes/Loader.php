<?php

namespace RssPodcastEpisode\Includes;

class Loader
{
	protected $plugin_name;
	protected $plugin_version;

	public function __construct()
	{
		$this->plugin_version = defined('RSSPODCASTEPISODE_VERSION') ? RSSPODCASTEPISODE_VERSION : '1.0.0';
		$this->plugin_name = 'rss-podcast-episode';
		$this->load_dependencies();

		add_action('plugins_loaded', [$this, 'load_plugin_textdomain']);
	}

	private function load_dependencies()
	{
		if ( class_exists( 'FLBuilder' ) ) new \RssPodcastEpisode\Functionality\BeaverBuilder($this->plugin_name, $this->plugin_version);
		new \RssPodcastEpisode\Functionality\Elementor($this->plugin_name, $this->plugin_version);
		new \RssPodcastEpisode\Functionality\Gutenberg($this->plugin_name, $this->plugin_version);
		new \RssPodcastEpisode\Functionality\Scripts($this->plugin_name, $this->plugin_version);
		new \RssPodcastEpisode\Functionality\Shortcodes($this->plugin_name, $this->plugin_version);
	}

	public function load_plugin_textdomain()
	{
		load_plugin_textdomain('rss-podcast-episode', false, RSSPODCASTEPISODE_BASENAME . '/languages/');
	}
}
