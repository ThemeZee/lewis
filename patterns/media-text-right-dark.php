<?php
/**
 * Title: Media Text (Right, dark)
 * Slug: lewis/media-text-right-dark
 * Categories: lewis_media_text
 *
 * @package Lincoln
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"margin":{"top":"0"}}},"backgroundColor":"darker-gray","textColor":"white","layout":{"contentSize":"1200px","wideSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-darker-gray-background-color has-text-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:media-text {"align":"","mediaPosition":"right","mediaType":"image"} -->
	<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/hero-image.png" alt=""/></figure>
		<div class="wp-block-media-text__content">

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"medium-gray"} -->
			<p class="has-medium-gray-color has-text-color" style="font-style:normal;font-weight:500">For Individuals</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"className":"is-style-underlined-heading"} -->
			<h2 class="is-style-underlined-heading" style="margin-top:var(--wp--preset--spacing--20)">Tax Advice and<br>Financial Planning</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis diss parturient.</p>
			<!-- /wp:paragraph -->

		</div>

	</div>
	<!-- /wp:media-text -->

</div>
<!-- /wp:group -->

