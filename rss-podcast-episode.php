<?php

/**
 * @wordpress-plugin
 * Plugin Name:       RSS Podcast Episode
 * Plugin URI:        https://github.com/Sirvelia-Labs/rss-podcast-episode
 * Description:       Adds Podcast blocks for Gutenberg, Elementor and Beaver Builder
 * Version:           1.0.0
 * Requires PHP:      7.4
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       rss-podcast-episode
 * Domain Path:       /languages
 */

if (!defined('WPINC')) {
	die('YOU SHALL NOT PASS!');
}

// PLUGIN CONSTANTS
define('RSSPODCASTEPISODE_NAME', 'rss-podcast-episode');
define('RSSPODCASTEPISODE_VERSION', '1.0.0');
define('RSSPODCASTEPISODE_PATH', plugin_dir_path(__FILE__));
define('RSSPODCASTEPISODE_BASENAME', plugin_basename(__FILE__));
define('RSSPODCASTEPISODE_URL', plugin_dir_url(__FILE__));

// AUTOLOAD
if ( file_exists(RSSPODCASTEPISODE_PATH . 'vendor/autoload.php') ) {
	require_once RSSPODCASTEPISODE_PATH . 'vendor/autoload.php';
}

// LYFECYCLE
register_activation_hook(__FILE__, [RssPodcastEpisode\Includes\Lyfecycle::class, 'activate']);
register_deactivation_hook(__FILE__, [RssPodcastEpisode\Includes\Lyfecycle::class, 'deactivate']);
register_uninstall_hook(__FILE__, [RssPodcastEpisode\Includes\Lyfecycle::class, 'uninstall']);

// LOAD ALL FILES
$loader = new RssPodcastEpisode\Includes\Loader();