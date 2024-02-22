<?php

namespace RssPodcastEpisode\Includes;

use RssPodcastEpisode\Functionality\BeaverBuilder;
use RssPodcastEpisode\Functionality\Elementor;
use RssPodcastEpisode\Functionality\Gutenberg;
use RssPodcastEpisode\Functionality\Scripts;
use RssPodcastEpisode\Functionality\Shortcodes;
use RssPodcastEpisode\Functionality\Escape;

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
		if (class_exists('FLBuilder')) new BeaverBuilder($this->plugin_name, $this->plugin_version);
		new Elementor($this->plugin_name, $this->plugin_version);
		new Gutenberg($this->plugin_name, $this->plugin_version);
		new Scripts($this->plugin_name, $this->plugin_version);
		new Shortcodes($this->plugin_name, $this->plugin_version);
		new Escape($this->plugin_name, $this->plugin_version);
	}

	public function load_plugin_textdomain()
	{
		load_plugin_textdomain('rss-podcast-episode', false, RSSPODCASTEPISODE_BASENAME . '/languages/');
	}
}
