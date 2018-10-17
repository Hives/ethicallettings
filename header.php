<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ethicallettings
 */

if ( WP_DEBUG == true ) {
	if ( defined( 'PAULS_SERVER' ) && PAULS_SERVER == true ) {
		$environment = "local";
	} else {
		$environment = "staging";
	}
} else {
	$environment = "production";
}

global $post;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-81824162-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-81824162-1');
	</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( $environment != "production" ) { ?>
    <?php if ( $environment == 'local' ) { ?>
		<div id="test-server-warning" class="local">
			<div class= "vertical-section full-width">
				<p class="warning">
					<i class="fas fa-exclamation-triangle"></i>This is a test site running on Paul's computer<i class="fas fa-exclamation-triangle"></i>
				</p>
			</div>
		</div>
	<?php } else { ?>
		<div id="test-server-warning">
			<div class= "vertical-section full-width">
				<p class="warning">
					<i class="fas fa-exclamation-triangle"></i>This is a test site running on the staging server<i class="fas fa-exclamation-triangle"></i>
				</p>
			</div>
		</div>
	<?php } ?>
<?php } ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ethicallettings' ); ?></a>

	<header id="masthead" >
		<div class="site-header full-width">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<div class="site-branding">
		        	<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

		            <?php /* PM - removed alla this
					$ethicallettings_description = get_bloginfo( 'description', 'display' );
					if ( $ethicallettings_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $ethicallettings_description; ?></p>
					<?php endif; ?>
		            */ ?>

				</div><!-- .site-branding -->
			</a>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ethicallettings' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
	        </nav><!-- #site-navigation -->

	        <div class="phone-number fa-phone icon">01483 429157</div>

	    </div>

	</header><!-- #masthead -->

	<?php
		$featured_image_id = get_post_thumbnail_id( $post->ID );
		$featured_image_src = wp_get_attachment_image_src( $featured_image_id, 'full ');

		if ($featured_image_src) {
			$banner_src = $featured_image_src[0];
		} else {
			$banner_src = get_template_directory_uri() . "/images/default-banner.jpg";
		}
	?>

	<div id="banner-image" style="background-image: url(<?php echo $banner_src; ?>)"></div>

	<div id="content" class="site-content full-width">
