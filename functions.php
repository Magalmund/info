<?php
    /*-----------------------------------------------------------------------------------*/
    /* This file will be referenced every time a template/page loads on your Wordpress site
    /* This is the place to define custom fxns and specialty code
    /*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
    array(
            'primary'	=>	__( 'Primary Menu', 'naked' ), // Register the Primary menu
            // Copy and paste the line above right here if you want to make another menu,
            // just change the 'primary' to another name
    )
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
    register_sidebar(array(				// Start a series of sidebars to register
            'id' => 'sidebar', 					// Make an ID
            'name' => 'Sidebar',				// Name it
            'description' => 'Take it on the side...', // Dumb description for the admin side
            'before_widget' => '<div>',	// What to display before each widget
            'after_widget' => '</div>',	// What to display following each widget
            'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
            'after_title' => '</h3>',		// What to display following each widget's title
            'empty_title'=> '',					// What to display in the case of no title defined for a widget
            // Copy and paste the lines above right here if you want to make another sidebar,
            // just change the values of id and name to another word/name
    ));
}
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  {

    // get the theme directory style.css and link to it in the header
    wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');

    // add fitvid
    // wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );

    // add theme scripts
    // wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );

}
// add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header
add_filter('show_admin_bar', '__return_false'); // отключить

add_theme_support('menus');
register_nav_menus([
	'header-menu' => 'Верхняя область',
	'footer-menu' => 'Нижняя область',
	]);




if( 'Исполняемый PHP код в контенте' ){

	add_filter( 'the_content', 'content_exec_php', 0 );

	function content_exec_php( $content ){
		return preg_replace_callback( '/\[exec( off)?\](.+?)\[\/exec\]/s', '_content_exec_php', $content );
	}

	function _content_exec_php( $matches ){

		if( ' off' === $matches[1] ){
			return "\n\n<".'pre>'. htmlspecialchars( $matches[2] ) .'</pre'.">\n\n";
		}
		else {
			eval( "ob_start(); {$matches[2]}; \$exec_php_out = ob_get_clean();" );
			return $exec_php_out;
		}

	}

}

function wp_corenavi() {
  global $wp_query;
  $total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
  $a['total'] = $total;
  $a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; // текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; // текст ссылки "Следующая страница"

  if ( $total > 1 ) echo '<nav class="pagination">';
  echo paginate_links( $a );
  if ( $total > 1 ) echo '</nav>';
}

add_filter('excerpt_more', function($more) {
	return '...';
});