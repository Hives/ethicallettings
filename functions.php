<?php
/**
 * ethicallettings functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ethicallettings
 */

if ( ! function_exists( 'ethicallettings_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ethicallettings_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ethicallettings, use a find and replace
		 * to change 'ethicallettings' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ethicallettings', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'ethicallettings' ),
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
		add_theme_support( 'custom-background', apply_filters( 'ethicallettings_custom_background_args', array(
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
add_action( 'after_setup_theme', 'ethicallettings_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ethicallettings_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ethicallettings_content_width', 640 );
}
add_action( 'after_setup_theme', 'ethicallettings_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ethicallettings_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ethicallettings' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ethicallettings' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ethicallettings_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ethicallettings_scripts() {
	wp_enqueue_style( 'ethicallettings-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ethicallettings-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ethicallettings-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'ethicallettings_scripts' );

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

/**
 * Paul's metaboxes.
 *
 * @link https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
 */

/**
 * Quotation meta box
 */
 
// Fires meta box setup on post editor screen
add_action( 'load-post.php', 'el_quotation_meta_box_setup' );
add_action( 'load-post-new.php', 'el_quotation_meta_box_setup' );

// Meta box setup function
function el_quotation_meta_box_setup() {

	// Add meta boxes ln the 'add_meta_boxes hook'
	add_action( 'add_meta_boxes', 'el_add_post_meta_boxes' );
}

// Create meta boxes to be displayed on the editor screen
function el_add_post_meta_boxes() {

	add_meta_box(
		'el-quotation-meta-box', // Unique ID
		'Quotations', // Title
		'el_quotation_meta_box', // Callback function
		'page', // Admin page (or post type)
		'advanced', // Context, one of normal, advanced, side
		'default' // Priority
	);
}

// Display the post meta box
function el_quotation_meta_box( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'el_quotation_nonce' );
	$el_stored_meta = get_post_meta( $post->ID ) ?>

	<p>You can enter up to 3 quotations to appear on this page.</p>

	<?php for ($i=0; $i < 3; $i++): ?>

		<h3>Quotation <?php echo ($i + 1); ?></h3>
		<p>
			<label for="el-quotation-<?php echo $i; ?>">The quotation (Don't include quotation marks)</label>
			<br>
			<input
				type="text" name="el-quotation-<?php echo $i; ?>" class="widefat" id="el-quotation-<?php echo $i; ?>"
				value="<?php if ( isset ( $el_stored_meta['el-quotation-' . $i] ) ) echo $el_stored_meta['el-quotation-' . $i][0]; ?>"
				size="30" / >
	    </p>
		</p>
		<p>
			<label for="el-quotation-<?php echo $i; ?>-name">The name of the quotee, as you want it to appear (e.g.: Olivia, tenant)</label>
			<br>
			<input
				type="text" name="el-quotation-<?php echo $i; ?>-name" class="widefat" id="el-quotation-<?php echo $i; ?>-name"
				value="<?php if ( isset ( $el_stored_meta['el-quotation-' . $i . '-name'] ) ) echo $el_stored_meta['el-quotation-' . $i . '-name'][0]; ?>"
				size="30" / >
		</p>

	<?php endfor; ?>

<?php }

// Saves the meta input
function el_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'el_quotation_nonce' ] ) && wp_verify_nonce( $_POST[ 'el_quotation_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	for ($i=0; $i < 3; $i++) {
 
 	    // Checks for input and sanitizes/saves if needed
	    if( isset( $_POST[ 'el-quotation-' . $i ] ) ) {
	        update_post_meta( $post_id, 'el-quotation-' . $i, sanitize_text_field( $_POST[ 'el-quotation-' . $i ] ) );
	    }
	    if( isset( $_POST[ 'el-quotation-' . $i . '-name' ] ) ) {
	        update_post_meta( $post_id, 'el-quotation-' . $i . '-name', sanitize_text_field( $_POST[ 'el-quotation-' . $i . '-name' ] ) );
	    }

	}

}
add_action( 'save_post', 'el_meta_save' );

/**
 * Quotation display widget
 */

add_action( 'widgets_init', 'el_quotation_widget_init' );
 
function el_quotation_widget_init() {
    register_widget( 'el_quotation_widget' );
}
 
class el_quotation_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'el_quotation_widget',
            'description' => 'Displays a quotation in the sidebar.'
        );
 
        parent::__construct( 'el_quotation_widget', 'Ethical Lettings quotes', $widget_details );
 
    }
 
    public function form( $instance ) {
        echo "<p>There are no options here. To edit a quotation, edit the page on which it appears.</p>";
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) {
		// Retrieves the stored value from the database
		
		$quotation = array();
		$name = array();
    	for ($i=0; $i < 3; $i++) { 
			$quotation[$i] = get_post_meta( get_the_ID(), 'el-quotation-' . $i, true );
			$name[$i] = get_post_meta( get_the_ID(), 'el-quotation-' . $i . '-name', true );
    	}

		// Checks and displays the retrieved value

    	for ($i=0; $i < 3; $i++) { 
			if ( !empty( $quotation[$i] ) ) { ?>
				<section class="quotation testimony">
					<blockquote><?php echo $quotation[$i]; ?></blockquote>
					<?php /*
					<p class="quotation-text">&ldquo;<?php echo $quotation[$i]; ?>&rdquo;</p>
					*/ ?>
					<?php if ( !empty( $name[$i] ) ) { ?>
						<cite><?php echo $name[$i]; ?></cite>
						<?php /*
						<p class="who-said-it"><?php echo $name[$i]; ?></p>
						*/ ?>
					<?php } ?>
				</section>
			<?php }
    	}

    }
 
}

/**
 * Paul's shortcodes.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 */

// this is here to stop wpautop messing up tags around the shortcode.
// see here: https://sww.nz/solution-to-wordpress-adding-br-and-p-tags-around-shortcodes/
// i didn't need to do the second part though for some reason
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

/**
 * row of columns shortcode
 */
function el_column_row_shortcode( $atts, $content = null ) {
	return '<div class="shortcode-column-container clear">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'row', 'el_column_row_shortcode' );

/**
 * column shortcode
 */
function el_column_shortcode( $atts, $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'pos' => 'left',
		),
		$atts,
		'column'
	);
	$classes = array('shortcode-column');
	$classes[] = "shortcode-column-" . $atts['pos'];

	return '<div class="' . implode(" ", $classes) . '"">' . do_shortcode($content) . '</div>';	
}
add_shortcode( 'column', 'el_column_shortcode' );

/**
 * homepage box shortcode
 */
function el_homepage_box_shortcode( $atts, $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'colour' => 'blue',
			'img' => false,
		),
		$atts
	);

	if ($atts['img']) {
		$img_url = wp_get_attachment_image_src( $atts['img'], "full" )[0];
	} else {
		$img_url = get_stylesheet_directory_uri() . "/images/homepage-box-blank-image.png";
	}

	return '<div class="homepage-box homepage-box-' . $atts['colour'] . '""><div class="homepage-box-image" style="background-image: url(' . $img_url . ')"></div><div class="homepage-box-content">' . do_shortcode($content) . '</div></div>';

}
add_shortcode( 'homepage_box', 'el_homepage_box_shortcode' );

/**
 * partners shortcode
 */
function el_partners_shortcode( $atts, $content = null ) {

	// Attributes
	// $atts = shortcode_atts(
	// 	array(
	// 		'pos' => 'left',
	// 	),
	// 	$atts,
	// 	'column'
	// );
	// $classes = array('shortcode-column');
	// $classes[] = "shortcode-column-" . $atts['pos'];

	return '<div class="el-partners">' . do_shortcode($content) . '</div>';	
}
add_shortcode( 'partners', 'el_partners_shortcode' );

/**
 * pull quote shortcode
 */
function el_pullquote_shortcode( $atts, $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'cite' => false,
		),
		$atts
		// 'pullquote'
	);

	$cite = $atts['cite'] ? "<cite>" . $atts['cite'] ."</cite>" : "";

	return '<div class="testimony"><blockquote>' . $content . '</blockquote>' . $cite . '</div>';	
}
add_shortcode( 'pullquote', 'el_pullquote_shortcode' );

/**
 * location map shortcode
 */
function el_location_map_shortcode( $atts, $content = null ) {
	return '<img src="' . get_stylesheet_directory_uri() . '/images/ethical-lettings-map.png" alt="Mapp">';
}
add_shortcode( 'location_map', 'el_location_map_shortcode' );

/**
 * Add browser class to body element.
 *
 * @link https://www.wpbeginner.com/wp-themes/how-to-add-user-browser-and-os-classes-in-wordpress-body-class/
 */
function mv_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        // if($is_iphone) $classes[] = 'iphone';
        // if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
        //          $classes[] = 'osx';
        //    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
        //          $classes[] = 'linux';
        //    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
        //          $classes[] = 'windows';
        //    }
        return $classes;
}
add_filter('body_class','mv_browser_body_class');

/**
 * Completely stop the featured imaged displaying at the top of any page
 *
 * @link https://www.webhostinghero.com/remove-featured-image-in-wordpress/
 */
function my_post_image_html( $html, $post_id, $post_image_id ) {
	return '';
}
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
