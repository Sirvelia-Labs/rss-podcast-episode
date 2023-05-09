<?php
namespace RssPodcastEpisode\Includes;

class Lyfecycle
{
	public static function activate()
	{
		do_action('RssPodcastEpisode/setup');
	}
	
	public static function deactivate()
	{

	}
	
	public static function uninstall()
	{
		do_action('RssPodcastEpisode/cleanup');
	}
}
