<?php
/**
 * Title: Query (List)
 * Slug: lewis/query-list
 * Block Types: core/query
 * Categories: query
*/
?>

<!-- wp:query {"queryId":1,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query">

	<!-- wp:post-template -->

		<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|80"}}}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--80)">

			<!-- wp:pattern {"slug":"lewis/postmeta-date"} /-->

			<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"className":"is-style-underlined-heading","fontSize":"xx-large"} /-->

			<!-- wp:post-excerpt /-->

		</div>
		<!-- /wp:group -->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<!-- wp:query-pagination-numbers /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
