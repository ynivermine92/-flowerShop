<?php

/* header */

/* nav */
function theme_register_nav_menus()
{
    register_nav_menus(
        array(
            'header_nav' => 'Header Navigation',
            'footer_nav' => 'Footer Navigation',
        )
    );
}
add_action('after_setup_theme', 'theme_register_nav_menus', 0);




/* nav menu class li хук для ли */
add_filter('nav_menu_css_class', 'nav_li_class', 10, 4);

function nav_li_class($classes, $item, $args, $depth)
{
    if ($args->theme_location === 'header_nav') {
        $classes = ['menu__item'];
    }
    return $classes;
}


/* nav menu class link хук для ссылки  */

add_filter('nav_menu_link_attributes', 'navLinkClass', 10, 4);

function navLinkClass($atts, $item, $args, $depth)
{
    if ($args->theme_location === 'header_nav') {
        $atts['class'] = 'menu__item-link';
    }
    return $atts;
}



/* logo */
function theme_setup()
{
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_setup');
