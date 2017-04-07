<?php
/**
 * BagPress functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package BagPress
 */

if ( ! function_exists( 'bagpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bagpress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BagPress, use a find and replace
	 * to change 'bagpress' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bagpress', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bagpress' ),
		'social' => esc_html__( 'Social Menu', 'bagpress' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bagpress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bagpress_setup
add_action( 'after_setup_theme', 'bagpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bagpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bagpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'bagpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bagpress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bagpress' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Home', 'bagpress' ),
		'id'            => 'home-aside',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="small-12 medium-4 columns widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'bagpress' ),
		'id'            => 'footer-aside',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="small-12 medium-4 columns widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bagpress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bagpress_scripts() {
	
	//add foundation
	wp_enqueue_style( 'foundation-style', get_template_directory_uri() . '/vendors/foundation-5.5.2/css/foundation.min.css', array(), '5.5.2' );
	wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '4.4.0' );

	wp_enqueue_style( 'bagpress-style', get_stylesheet_uri() );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/vendors/foundation-5.5.2/js/vendor/modernizr.js', array(), '2.8.3', true );

	wp_enqueue_script( 'bagpress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bagpress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/vendors/foundation-5.5.2/js/foundation/min/foundation-min.js', array('jquery'), '5.5.2', true );
	wp_enqueue_script( 'foundation.clearing', get_template_directory_uri() . '/vendors/foundation-5.5.2/js/foundation/min/foundation.clearing-min.js', array('jquery','foundation'), '5.5.2', true );
	
	wp_enqueue_script( 'bagpress-script', get_template_directory_uri() . '/js/scripts.js', array('jquery','foundation'), '20150824', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bagpress_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function bagpress_show_all_in_archive( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // Display only 1 post for the original blog archive
        // $query->set( 'posts_per_page', 1 );
        return;
    }

    if ( is_post_type_archive('portfolio') ) {
        // Display all posts for archives
        $query->set( 'posts_per_page', -1 );
        return;
    }
}
add_action( 'pre_get_posts', 'bagpress_show_all_in_archive', 1 );



function cc_remove_jp_sharing() {
    if ( function_exists( 'sharing_display' ) ) {
        remove_filter( 'the_excerpt', 'sharing_display', 19 );
    }
}
add_action( 'loop_start', 'cc_remove_jp_sharing' );



/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'bpcc_load_widgets' );
/* Function that registers our widget. */
function bpcc_load_widgets() {
	register_widget( 'BPCC_Portfolio_Widget' );
	register_widget( 'BPCC_Posts_Widget' );
}
//Register Recent Posts List Widget
class BPCC_Portfolio_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'bpcc_portfolio_widget', // Base ID
			'circlecube Portfolio', // Name
			array( 'description' => 'List recent portfolio work.' ) // Args
		);
	}
    function widget( $args, $instance ) {
        extract( $args );
        /* User-selected settings. */
        $title = apply_filters('widget_title', $instance['title'] );
        $num = $instance['num'];
        /* Before widget (defined by themes). */
        echo $before_widget;
        /* Title of widget (before and after defined by themes). */
        if ( $title )
            echo $before_title . $title . $after_title;
        else
            echo $before_title . 'Recent Portfolio' . $after_title;
        
        echo '<div class="portfolios">';
        $limit = $num;
        $portfolio_i = 1;
        $portfolio_size = 'medium';
        $bpcc_args = array( 'post_type' => 'portfolio',
	                        'posts_per_page' => $limit ); 
        $bpcc_query = new WP_Query($bpcc_args);     
        if ( $bpcc_query->have_posts() ) {
            // echo '<div class="posts">';
        
            while ( $bpcc_query->have_posts() ) { 
            	$bpcc_query->the_post();
            	
                include( locate_template( 'template-parts/content-portfolio.php' ) );

        
            } //endwhile; 
            // echo '</div>';
            ?>
        <?php } //endif; 
        echo '</div>';
        /* After widget (defined by themes). */
        echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        /* Strip tags (if needed) and update the widget settings. */
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['num'] = strip_tags( $new_instance['num'] );
        return $instance;
    }
    function form( $instance ) {
        /* Set up some default widget settings. */
        $defaults = array( 'title' => 'Recent Work', 'num' => '20' );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' ); ?>">Number of Posts to list:</label>
            <input id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" style="width:100%;" />
        </p><?php
    }
}



//Register Recent Posts List Widget
class BPCC_Posts_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'bpcc_post_widget', // Base ID
			'circlecube Recent Posts', // Name
			array( 'description' => 'List recent posts.' ) // Args
		);
	}
    function widget( $args, $instance ) {
        extract( $args );
        /* User-selected settings. */
        $title = apply_filters('widget_title', $instance['title'] );
        $posts_per_page = $instance['num'];
        $offset = $instance['offset'];
        /* Before widget (defined by themes). */
        echo $before_widget;
        /* Title of widget (before and after defined by themes). */
        if ( $title )
            echo $before_title . $title . $after_title;
        else
            echo $before_title . 'Recent Posts' . $after_title;
        
        echo '<div class="posts">';
        $bpcc_args = array( 'post_type' => 'post',
	                        'posts_per_page' => $posts_per_page,
	                        'offset' => $offset
	                	  ); 
        $bpcc_query = new WP_Query($bpcc_args);     
        if ( $bpcc_query->have_posts() ) {
            // echo '<div class="posts">';
        
            while ( $bpcc_query->have_posts() ) { 
            	$bpcc_query->the_post();
            	
                include( locate_template( 'template-parts/content-post.php' ) );

        
            } //endwhile; 
            // echo '</div>';
            ?>
        <?php } //endif; 
        echo '</div>';
        /* After widget (defined by themes). */
        echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        /* Strip tags (if needed) and update the widget settings. */
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['num'] = strip_tags( $new_instance['num'] );
        $instance['offset'] = strip_tags( $new_instance['offset'] );
        return $instance;
    }
    function form( $instance ) {
        /* Set up some default widget settings. */
        $defaults = array( 'title' => 'Recent Posts', 'num' => '3', 'offset' => '0' );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' ); ?>">Posts to list:</label>
            <input type="number" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'offset' ); ?>">Offset:</label>
            <input type="number" id="<?php echo $this->get_field_id( 'offset' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" value="<?php echo $instance['offset']; ?>" style="width:100%;" />
        </p><?php
    }
}
