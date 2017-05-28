<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */




if ( !function_exists( 'axiom_template_list_theme_setup' ) ) {
	add_action( 'axiom_action_before_init_theme', 'axiom_template_list_theme_setup', 1 );
	function axiom_template_list_theme_setup() {
		axiom_add_template(array(
			'layout' => 'list_1',
			'template' => 'list',
			'mode'   => 'blogger',
			'title'  => __('Blogger layout: List / layout 1 /', 'axiom')
			));
		axiom_add_template(array(
			'layout' => 'list_2',
			'template' => 'list',
			'mode'   => 'blogger',
			'title'  => __('Blogger layout: List / layout 2 /', 'axiom')
			));
		axiom_add_template(array(
			'layout' => 'list_3',
			'template' => 'list',
			'mode'   => 'blogger',
			'title'  => __('Blogger layout: List / layout 3 /', 'axiom'),
			'thumb_title'  => __('Small image (crop)_0', 'axiom'),
			'w'		 => 145,
			'h'		 => 90
			));
        axiom_add_template(array(
            'layout' => 'list_4',
            'template' => 'list',
            'mode'   => 'blogger',
            'title'  => __('Blogger layout: List / layout 4 /', 'axiom'),
            'thumb_title'  => __('Small image (crop)_1', 'axiom'),
            'w'		 => 160,
            'h'		 => 160
        ));
	}
}

// Template output
if ( !function_exists( 'axiom_template_list_output' ) ) {
	function axiom_template_list_output($post_options, $post_data) {
		$parts = explode('_', $post_options['layout']);
		$layout = max(1, min(4, empty($parts[1]) ? $post_options['columns_count'] : (int) $parts[1]));


		if ($layout == 1) {
			$title = '<li class="post_item sc_blogger_item post_title sc_title sc_blogger_title list_style_'.esc_attr($layout).'_item">'
				. '<div class="post_title sc_title sc_blogger_title">'
			    . '<h5>'
				. (!isset($post_options['links']) || $post_options['links'] ? '<a href="' . esc_url($post_data['post_link']) . '">' : '')
			    . ($post_data['post_title'])
				. (!isset($post_options['links']) || $post_options['links'] ? '</a>' : '')
		        . '</h5>'
		        . '<div class="post_info">'
		        . '<span>by <a href="' . esc_url($post_data['post_author_url']) . '">' . $post_data['post_author'] . '</a></span>'
		        . '<span>Views <span>' . esc_html($post_data['post_views']) . '</span></span>'
			    . '</div>'
				. '</div>'
				. '</li>';
			echo ($title);
		} else if ($layout == 2) {
			$title = '<li class="post_item sc_blogger_item post_title sc_title sc_blogger_title list_style_'.esc_attr($layout).'_item">'
		         . '<div class="post_title sc_title sc_blogger_title">'
                . '<div class="post_info">'
                . '<span><span class="date">' . esc_html($post_data['post_date']) . '</span></span>'
                . '</div>'
		         . '<h4>'
		         . (!isset($post_options['links']) || $post_options['links'] ? '<a href="' . esc_url($post_data['post_link']) . '">' : '')
		         . ($post_data['post_title'])
		         . (!isset($post_options['links']) || $post_options['links'] ? '</a>' : '')
		         . '</h4>'
			     . '<div class="post_descr">' . substr($post_data['post_excerpt'],0,100) . '...</div>'
		         . '</div>'
		         . '</li>';
			echo ($title);
		} else if ($layout == 3) {
			$title = '<li class="post_item sc_blogger_item post_title sc_title sc_blogger_title list_style_'.esc_attr($layout).'_item">';
			echo ($title);
            if ($post_data['post_thumb']) {
				require(axiom_get_file_dir('templates/parts/post-featured.php'));
			}
			$title = '';
			$title .= '<div class="post_title sc_title sc_blogger_title">'
			         . '<h5>'
			         . (!isset($post_options['links']) || $post_options['links'] ? '<a href="' . esc_url($post_data['post_link']) . '">' : '')
			         . ($post_data['post_title'])
			         . (!isset($post_options['links']) || $post_options['links'] ? '</a>' : '')
			         . '</h5>'
//			         . '<div class="post_descr">' . substr($post_data['post_excerpt'],0,100) . '...</div>'
                    . '<div class="post_info">'
                    . '<span>by <a href="' . esc_url($post_data['post_author_url']) . '">' . $post_data['post_author'] . '</a></span>'
                    . '<span>Comments <span>' . esc_html($post_data['post_comments']) . '</span></span>'
                    . '</div>'
			         . '</div>'
			         . '</li>';
			echo ($title);
		}
        else if ($layout == 4) {
            $title = '<li class="post_item sc_blogger_item post_title sc_title sc_blogger_title list_style_'.esc_attr($layout).'_item">';
            echo ($title)
            .'<div class="sc_blogger_date">'
            . '<span class="icon icon-calendar"></span>'
            . '<span class="day_month">' . esc_html($post_data['post_date_part1']) . '</span>'
            . '<span class="year">' . esc_html($post_data['post_date_part2']) . '</span>'
            .'</div>';
            if ($post_data['post_thumb']) {
                require(axiom_get_file_dir('templates/parts/post-featured.php'));
            }
            $title = '';
            $title .= '<div class="post_title sc_title sc_blogger_title">'
                . '<h5>'
                . (!isset($post_options['links']) || $post_options['links'] ? '<a href="' . esc_url($post_data['post_link']) . '">' : '')
                . ($post_data['post_title'])
                . (!isset($post_options['links']) || $post_options['links'] ? '</a>' : '')
                . '</h5>'
     	         . '<div class="post_descr">' . substr($post_data['post_excerpt'],0,100) . '...</div>'
                . '<div class="post_info">'
                . '<span>by <a href="' . esc_url($post_data['post_author_url']) . '">' . $post_data['post_author'] . '</a></span>'
                . '<span>Comments <span>' . esc_html($post_data['post_comments']) . '</span></span>'
                . '</div>'
                . '</div>'
                . '</li>';
            echo ($title);
        }
	}
}
?>