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

$environment = WP_DEBUG == true ? "local" : "production";

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( $environment == "local" ) { ?>
	<div id="test-server-warning">
		<div class= "vertical-section full-width">
			<p class="warning">
				<i class="fas fa-exclamation-triangle"></i> This is a test version of the site <i class="fas fa-exclamation-triangle"></i>
			</p>
		</div>
	</div>
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

    <div id="banner-image"></div>

	<div id="content" class="site-content full-width">
