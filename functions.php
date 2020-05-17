<?php
/**
 * Tektonmaster functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tektonmaster
 */

if ( ! function_exists( 'tektonmaster_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tektonmaster_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tektonmaster, use a find and replace
		 * to change 'tektonmaster' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tektonmaster', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_image_size( 'slider_img', 805, 398, true);

		add_image_size( 'plan_img', 375, 400, true);

        add_image_size( 'blog_img', 364, 200, true);

        add_image_size( 'slider_menu_img', 370, 255, true);

        add_image_size( 'galley_home_img', 564, 389, true);


		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'header-menu', 'tektonmaster' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tektonmaster_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'tektonmaster_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tektonmaster_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tektonmaster_content_width', 640 );
}
add_action( 'after_setup_theme', 'tektonmaster_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tektonmaster_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tektonmaster' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tektonmaster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tektonmaster_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tektonmaster_scripts() {
	wp_enqueue_style( 'tektonmaster-style', get_stylesheet_uri() );

	wp_enqueue_style('main_styles', get_template_directory_uri().'/assets/css/main.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap-grid.min.css');
	wp_enqueue_style('owlcarousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	//wp_enqueue_style('owlcarousel_default', get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('uikit', get_template_directory_uri().'/assets/css/uikit.min.css');
	wp_enqueue_style('montserat', 'https://fonts.googleapis.com/css?family=Play:400,700&display=swap');

	//wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jQuery.min.js', false, false, true );
    
	wp_enqueue_script( 'uikit', get_template_directory_uri() . '/js/uikit.min.js', false, false, true );
	//wp_enqueue_script( 'tektonmaster-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', false, false, true );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', false, false, true );
	//wp_enqueue_script( 'tektonmaster-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', false, false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tektonmaster_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_filter('post_type_link', 'faq_permalink', 1, 2);
function faq_permalink( $permalink, $post ){
	// выходим если это не наш тип записи: без холдера %products%
	if( strpos($permalink, '%housescat%') === false )
		return $permalink;

	// Получаем элементы таксы
	$terms = get_the_terms($post, 'housescat');
	// если есть элемент заменим холдер
	if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
		$term_slug = array_pop($terms)->slug;
	// элемента нет, а должен быть...
	else
		$term_slug = 'no-housescat';

	return str_replace('%housescat%', $term_slug, $permalink );
}



function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class=\"pagination\">";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}
