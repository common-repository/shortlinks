<?php
/*
Plugin Name: Shortlinks
Plugin URI: http://blog.aizatto.com/shortlinks
Description: Add "Get Shortlinks" to the admin side for Pages, and Taxonomies (includes custom taxonomies, categeories, and post tags)
Author: Ezwan Aizat Bin Abdullah Faiz
Author URI: http://aizatto.com
Version: 0.1
License: LGPLv2
*/

add_filter('get_shortlink',     array('Shortlinks', 'get_shortlink_post_type'), 10, 4);
add_filter('get_shortlink',     array('Shortlinks', 'get_shortlink_taxonomy'), 10, 4);
add_filter('post_row_actions',  array('Shortlinks', 'post_row_actions'), 10, 2);
add_filter('media_row_actions', array('Shortlinks', 'post_row_actions'), 10, 2);
add_filter('page_row_actions',  array('Shortlinks', 'post_row_actions'), 10, 2);
add_filter('tag_row_actions',   array('Shortlinks', 'tag_row_actions'), 10, 2);

class Shortlinks {
	function get_shortlink_post_type($shortlink, $post_id, $context, $allow_slugs) {
		if ('post' != $context) {
			return $shortlink;
		}

		$post = &get_post($post_id);

		if ( is_wp_error( $post ) )
			return $shortlink;

		if ( $post->post_type == 'post') {
			return home_url('?p=' . $post->ID);
		} else if ( $post->post_type == 'page' ) {
			return home_url('?page_id=' . $post->ID);
		} else if ( $post->post_type == 'attachment') {
			return home_url('?attachment_id=' . $post->ID);
		} else if ( in_array($post->post_type, get_post_types( array('_builtin' => false) ) ) ) {
			return home_url(add_query_arg(array('post_type' => $post->post_type, 'p' => $post->ID), ''));
		} else {
			return $shortlink;
		}
	}

	function get_shortlink_taxonomy($shortlink, $term_id, $context, $allow_slugs) {
		if (! is_taxonomy($context)) {
			return $shortlink;
		}

		if ('category' == $context) {
			return home_url('?cat=' . $term_id);
		} else {
			$term = get_term($term_id, $context);
			$slug = $term->slug;

			$t = get_taxonomy($context);
			if ( $t->query_var )
				$termlink = "?$t->query_var=$slug";
			else
				$termlink = "?taxonomy=$context&term=$slug";
			return home_url($termlink);
		}
	}

	function post_row_actions($actions, $post) {
		$shortlink = wp_get_shortlink($post->ID, 'post');
		$actions['shortlink'] = sprintf('<a href="%s" onclick="prompt(&#39;URL:&#39;, \'%s\'); return false;">%s</a>', $shortlink, $shortlink, 'Get Shortlink');

		return $actions;
	}

	function tag_row_actions($actions, $tag) {
		$shortlink = wp_get_shortlink($tag->term_id, $tag->taxonomy);
		$actions['shortlink'] = sprintf('<a href="%s" onclick="prompt(&#39;URL:&#39;, \'%s\'); return false;">%s</a>', $shortlink, $shortlink, 'Get Shortlink');

		return $actions;
	}
}
