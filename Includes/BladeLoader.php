<?php

namespace RssPodcastEpisode\Includes;

use eftec\bladeone\BladeOne;

class BladeLoader
{
	private static $instance = NULL;
	private $blade;

	private function __construct()
	{
		$this->blade = new BladeOne(RSSPODCASTEPISODE_PATH . 'resources/views', RSSPODCASTEPISODE_PATH . 'resources/cache');

		$this->blade->directive('js', function ($expression) {
			return "<?php echo htmlspecialchars(json_encode($expression, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8'); ?>";
		});
	}

	// Clone not allowed
	private function __clone()
	{
	}

	public static function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new BladeLoader();
		}
		return self::$instance;
	}

	public function make_directive(string $name, callable $handler)
	{
		$this->blade->directive($name, $handler);
	}

	public function template($name, $args = [])
	{
		return $this->blade->run($name, $args);
	}
}
