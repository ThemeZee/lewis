<?php
/**
 * Title: Blog Posts (Columns)
 * Slug: lewis/blog-posts-columns
 * Categories: lewis_blog
 *
 * @package Lincoln
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"margin":{"top":"0"},"blockGap":"var:preset|spacing|70"}},"layout":{"contentSize":"1200px","wideSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:heading {"className":"is-style-underlined-heading"} -->
	<h2 class="is-style-underlined-heading">Latest News</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":1,"query":{"perPage":"3","pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
	<div class="wp-block-query">

		<!-- wp:post-template -->

			<!-- wp:group -->
			<div class="wp-block-group">

			<!-- wp:post-featured-image {"isLink":true,"height":"","style":{"spacing":{"margin":{"top":"0px"}}}} /-->

			<!-- wp:pattern {"slug":"lewis/postmeta-date"} /-->

			<!-- wp:post-title {"isLink":true,"className":"is-style-underlined-heading","fontSize":"x-large"} /-->

			<!-- wp:post-excerpt {"moreText":"Continue reading"} /-->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
