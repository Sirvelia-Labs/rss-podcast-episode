<?php

namespace RssPodcastEpisode\Functionality;

class Scripts
{

	protected $plugin_name;
	protected $plugin_version;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts'], 100);
	}

	public function enqueue_scripts()
	{
		wp_enqueue_style($this->plugin_name, RSSPODCASTEPISODE_URL . 'dist/app.css', [], $this->plugin_version, 'all');
		wp_enqueue_script($this->plugin_name, RSSPODCASTEPISODE_URL . 'dist/app.js', [], $this->plugin_version, 'all');
	}
}
