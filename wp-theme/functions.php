<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );

//JS THEMES
class wp_ng_theme {
	function enqueue_scripts() {
		wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.map', array('jquery'), '1.0', false);
		wp_enqueue_script( 'angular-core', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js', array( 'jquery' ), '1.0', false );
		wp_enqueue_script( 'ngScripts', get_template_directory_uri() . '/assets/js/app.js', array( ), '1.0', false );
		wp_localize_script( 'ngScripts', 'appInfo',
			array(
				'api_url'			 => rest_get_url_prefix() . '/wp/v2/',
				'template_directory' => get_template_directory_uri() . '/',
				'nonce'				 => wp_create_nonce( 'wp_rest' ),
				'is_admin'			 => current_user_can('administrator')
			)
		);
	}
}
$ngTheme = new wp_ng_theme();
add_action( 'wp_enqueue_scripts', array( $ngTheme, 'enqueue_scripts' ) );


// NAVIGATION
function main_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'main-menu',
        'menu'            => '',
        'container'       => false,
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '%3$s',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

function register_main_menu()
{
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ), // Main Navigation
        )
    );
}
add_action( 'init', 'register_main_menu' );

function wcs_force_use_parent_category_template() {

    $category = get_queried_object();
    $templates = array();

    // Add default category template files
    $templates[] = "category-{$category->slug}.php";
    $templates[] = "category-{$category->term_id}.php";

    if ( $category->category_parent != 0 ) {
        $parent = get_category( $category->category_parent );

        if ( !empty($parent) ) {
            $templates[] = "category-{$parent->slug}.php";
            $templates[] = "category-{$parent->term_id}.php";
        }
    }

    $templates[] = 'category.php';
    return locate_template( $templates );
}
add_filter( 'category_template', 'wcs_force_use_parent_category_template' );