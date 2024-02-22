<?php

namespace RssPodcastEpisode\Components;

class Escape
{

    public static function alpine_template($content)
    {
        global $allowedposttags;

        // Alpine.js directives x-*
        preg_match_all('/(x-[\w:.-]*)/', $content, $matches);

        if ($matches === false || empty($matches[0])) {
            return $allowedposttags;
        }

        $allowedTags = $allowedposttags;
        $allowedTags['template'] = [];

        $alpineAttrs = [];

        foreach ($matches[0] as $match) {
            $alpineAttrs[$match] = true;
        }

        foreach ($allowedTags as $tag => $attributes) {
            $allowedTags[$tag] = array_merge($alpineAttrs, $attributes);
        }

        return $allowedTags;
    }
}
