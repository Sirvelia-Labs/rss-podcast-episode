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

		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
	}

	private function asset_url($asset_name)
	{
		$manifest_path = RSSPODCASTEPISODE_ASSETS_PATH . "manifest.json";
		$manifest = wp_json_file_decode($manifest_path, ['associative' => true]);

		if (is_wp_error($manifest) || !isset($manifest[$asset_name])) {
			return $asset_name;
		}

		return RSSPODCASTEPISODE_ASSETS_URL . $manifest[$asset_name];
	}

	public function register_scripts()
	{
		wp_register_style($this->plugin_name, $this->asset_url('app.css'), [], $this->plugin_version, 'all');
		wp_register_script($this->plugin_name, $this->asset_url('app.js'), [], $this->plugin_version, false);
	}
}
