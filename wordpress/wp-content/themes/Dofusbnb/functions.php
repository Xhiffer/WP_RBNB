<?php

// add titre de l'onglet
function dofusbnb_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'dofusbnb_theme_support');

function dofusbnb_menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );
    register_nav_menus($locations);
}
add_action('init', 'dofusbnb_menus');

function dofusbnb_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('fontawesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('css',get_template_directory_uri(). "/style.css", array('bootstrap'), $version, 'all');

}
add_action('wp_enqueue_scripts', 'dofusbnb_register_styles');

function dofusbnb_register_scripts(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array(),'3.4.1',true);
    wp_enqueue_script('popper',"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(),'1.16.0',true);
    wp_enqueue_script('bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(),'4.4.1',true);
    wp_enqueue_script('js',get_template_directory_uri()."/assets/js/main.js", array(),$version,true);

}

add_action('wp_enqueue_scripts', 'dofusbnb_register_scripts');

function dofusbnb_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'

        )
        );
}
add_action('widgets_init', 'dofusbnb_widget_areas');





// prix, pos, Continent, coffres, utilisateurid, periodes fixe(cringe)., vérified.
add_filter('manage_post_posts_columns', function($columns) {
    $mycolums = ['verified' => __('Verified', 'textdomain'),
                 'prix' => __('prix', 'textdomain'),
                 'pos' => __('pos', 'textdomain'),
                 'Continent' => __('Continent', 'textdomain'),
                 'utilisateurid' => __('utilisateurid', 'textdomain'),
                 'periodes' => __('periodes', 'textdomain'),
                 'verified' => __('Verified', 'textdomain')
                ];
	return array_merge($columns, $mycolums);
});
 
add_action('manage_post_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'verified') {
		$verified = get_post_meta($post_id, 'verified', true);
		if ($verified) {
			echo '<span style="color:green;">'; _e('Yes', 'textdomain'); echo '</span>';
		} else {
			echo '<span style="color:red;">'; _e('No', 'textdomain'); echo '</span>';
		}
	}
}, 10, 2);

function dofusbnb_redirect_to_custom_login_page(){
    wp_redirect(site_url()."/?page_id=194"); 
    exit();
}
//add_action('wp_logout', 'dofusbnb_redirect_to_custom_login_page');

//custom login aussi pour la zone admin
function dofusbnb_redirect_wp_admin(){
    global $pagenow;
    if($pagenow == "wp-login.php" && $_GET['action'] != "logout"){
        wp_redirect(site_url()."/?page_id=194"); 
        exit();
    };
}
//add_action('init', 'dofusbnb_redirect_to_custom_login_page');
require 'classes/SponsoCheckbox.php';
$checkbox = new SponsoCheckbox('wpheticSponso');
require 'classes/HouseData.php';
$txt = new HouseData('prix');
?>