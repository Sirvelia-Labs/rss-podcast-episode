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

		error_log(print_r($allowed, true));

		

		// if ($context !== 'rsspodcastepisode-alpine') {
		// 	return $allowed;
		// }

		global $allowedposttags;

		// // Alpine.js directives x-*
		// preg_match_all('/(x-[\w:.-]*)/', $content, $matches);

		// if ($matches === false || empty($matches[0])) {
		// 	return $allowedposttags;
		// }

		$allowed = $allowedposttags;
		$allowed['div']['x-data'] = true;
		// $alpineAttrs = [];

		// foreach ($matches[0] as $match) {
		// 	$alpineAttrs[$match] = true;
		// }

		// foreach ($allowed as $tag => $attributes) {
		// 	$allowed[$tag] = array_merge($alpineAttrs, $attributes);
		// }

		return $allowed;
	}
}
