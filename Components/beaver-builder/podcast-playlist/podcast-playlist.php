<?php
class PodcastPlaylist extends \FLBuilderModule {

	public function __construct() {

		parent::__construct(array(
			'name' => __( 'Podcast Playlist', 'fl-builder' ),
			'description' => __( 'Displays the podcast last episode', 'fl-builder' ),
			'group' => __( 'Podcast', 'fl-builder' ),
			'category' => __( 'podcast', 'fl-builder' ),
			'dir' => RSSPODCASTEPISODE_PATH . 'Components/beaver-builder/podcast-playlist',
			'url' => RSSPODCASTEPISODE_URL . 'Components/beaver-builder/podcast-playlist',
			'icon' => 'button.svg',
			'editor_export' => true, // Defaults to true and can be omitted.
			'enabled' => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));

	}
}

\FLBuilder::register_module( 'PodcastPlaylist', array(
    'my-tab-1'      => array(
      'title'         => __( 'Config', 'rss-podcast-episode' ),
      'sections'      => array(
        'my-section-1'  => array(
          'title'         => __( 'URL', 'rss-podcast-episode' ),
          'fields'        => array(
            'podcast_url'     => array(
              'type'          => 'text',
              'label'         => __( 'Podcast URL', 'rss-podcast-episode' ),
            ),
          )
        )
      )
    )
  ) );