<?php
/**
 * Title: Query (Default)
 * Slug: lewis/query-default
 * Block Types: core/query
 * Categories: query
 *
 * @package Lincoln
 */

?>

<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query">

	<!-- wp:post-template -->

		<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|80"}}}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--80)">

			<!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"top":"0"}}}} /-->

			<!-- wp:pattern {"slug":"lewis/postmeta"} /-->

			<!-- wp:post-title {"isLink":true,"className":"is-style-underlined-heading","fontSize":"huge"} /-->

			<!-- wp:post-excerpt {"moreText":"Continue reading"} /-->

		</div>
		<!-- /wp:group -->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<!-- wp:query-pagination-numbers /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
