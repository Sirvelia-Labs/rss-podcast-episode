<?php

namespace RssPodcastEpisode\Functionality;

class Escape
{

	protected $plugin_name;
	protected $plugin_version;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		add_filter('wp_kses_allowed_html', [$this, 'allow_alpine'], 10, 2);
	}

	public function allow_alpine($allowed, $context)
	{
		global $allowedposttags;

		$allowed = $allowedposttags;
		$allowed['div']['x-data'] = true;
		
		return $allowed;
	}
}
