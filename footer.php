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

	<?php if (is_front_page()) { ?>
		<div class="prs full-width">
			<p>Proud members of:</p>
			<a href="https://www.theprs.co.uk/" target="_blank" title="Property Redress Scheme website">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/prs-logo.png" alt="The ethical lettings logo" />
			</a>
		</div>
	<?php } ?>


	<footer id="colophon">
		<div class="site-footer full-width">

			<div class="wrapper">
				<div class="contact-details left">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="The ethical lettings logo" />
					<p>
						<span class="phone-number fa-phone icon">01483 429157</span><br>
						<span class="email-address fa-envelope icon"><a href="mailto:info@ethical-lettings.com?subject=hello" "Email us">info@ethical-lettings.com</a></span>
					</p>
					<p>
						Registered Company Number 07917040<br>
						Pound House, Pound Lane, Godalming, Surrey GU7 1BX
					</p>
					<p>
						<a href="#" title="Privacy Statement">Privacy Statement</a>
					</p>
					<p>
						Website by <a href="http://www.jellymouldcreative.com/" title="Jellymould" target="_blank" class="jellymould">Jellymould</a>
					</p>
				</div>
				
			</div>

			<div class="sidebar right">
				<div class="social">
					<a href="https://twitter.com/ethicallettings" target="_blank" title="Ethical Lettings on Twitter"><i class="fab fa-twitter-square"></i></a><br>
					<a href="https://www.facebook.com/ethicallettings" target="_blank" title="Ethical Lettings on Facebook"><i class="fab fa-facebook-square"></i></a><br>
					<a href="https://www.linkedin.com/company/ethical-lettings" target="_blank" title="Ethical Lettings on LinkedIn"><i class="fab fa-linkedin"></i></a>
				</div>
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
