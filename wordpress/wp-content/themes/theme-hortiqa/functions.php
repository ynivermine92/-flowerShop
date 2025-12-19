<?php

/* inc */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/image.php';
require get_template_directory() . '/inc/underscores.php';

require get_template_directory() . '/inc/menu.php';
require get_template_directory() . '/inc/woo.php';





function project_scripts()
{

	wp_enqueue_style(
		'main-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		'1.0',
		'all'
	);

	wp_enqueue_script(
		'main-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array('jquery'),
		'1.0',
		true
	);
}
add_action('wp_enqueue_scripts', 'project_scripts');
