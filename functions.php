<?php


//THEME STYLES
function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'theme_styles');



//HTML5 SHIV/ SCRIPTS
function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv' , 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script( 'respond_js' , 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true);

}
add_action( 'wp_enqueue_scripts', 'theme_js');

add_theme_support( 'menus');
add_theme_support( 'post-thumbnails');


//NAV-WALKER
require_once('wp_bootstrap_navwalker.php');


//MENUS

function register_theme_menus() {

	register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
    'Top' => __( 'Top Menu', 'THEMENAME' )
) );
}
add_action( 'init', 'register_theme_menus');

//WIDGETS
function create_widget($name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
		));
}

create_widget( 'Front Page Left', 'front-left', 'Displays on front left of homepage');
create_widget( 'Front Page Center', 'front-center', 'Displays on front center of homepage');
create_widget( 'Front Page Right', 'front-right', 'Displays on front right of homepage');

create_widget( 'Page Sidebar', 'page', 'Displays on side of pages with sidebar');
create_widget( 'Blog Sidebar', 'blog', 'Displays on side of pages in blog section');




//LOGIN 
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/login/logo_login.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/login/login-styles.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );




?>