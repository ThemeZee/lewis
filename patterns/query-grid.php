<?php
/**
 * Title: Query (Grid)
 * Slug: lewis/query-grid
 * Block Types: core/query
 * Categories: query
*/
?>

<!-- wp:query {"queryId":1,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"flex","columns":2}} -->
<div class="wp-block-query">

	<!-- wp:post-template -->

		<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|80"}}}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--80)">

			<!-- wp:post-featured-image {"isLink":true,"height":"240px","style":{"spacing":{"margin":{"top":"0px"}}}} /-->

			<!-- wp:pattern {"slug":"lewis/postmeta-date"} /-->

			<!-- wp:post-title {"isLink":true,"className":"is-style-underlined-heading","fontSize":"x-large"} /-->

			<!-- wp:post-excerpt {"moreText":"Continue reading"} /-->

		</div>
		<!-- /wp:group -->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<!-- wp:query-pagination-numbers /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
