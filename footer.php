<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ethicallettings
 */

?>

	</div><!-- #content -->

	<footer id="colophon">
		<div class="site-footer full-width">

			<div class="wrapper">
				<div class="contact-details left">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-logo.png" alt="The ethical lettings logo" />
					<p>
						<span class="phone-number fa-phone icon">01483 429157</span><br>
						<span class="email-address fa-envelope icon"><a href="mailto:info@ethical-lettings.com?subject=hello" "Email us">info@ethical-lettings.com</a></span>
					</p>
					<p>
						Registered Company Number 07917040<br>
						Pound House, Pound Lane, Godalming, Surrey GU7 1BX
					</p>
				</div>
				
			</div>

			<div class="sidebar right">
				<div class="social">
					<a href="https://twitter.com/ethicallettings" title=""><i class="fab fa-twitter-square"></i></a><br>
					<a href="https://www.facebook.com/ethicallettings" title=""><i class="fab fa-facebook-square"></i></a><br>
					<a href="https://www.linkedin.com/company/ethical-lettings" title=""><i class="fab fa-linkedin"></i></a>
				</div>
				<img class="prs-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/prs-logo.png" alt="The ethical lettings logo" />
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
