<?php
/**
 * Title: Author Contact
 * Slug: adamsons/author-contact
 * Categories: adamsons
 */
?>
<!-- wp:group {"className":"author-card"} -->
<div class="wp-block-group author-card">
	<!-- wp:group {"className":"container author-card__inner","layout":{"type":"default"}} -->
	<div class="wp-block-group container author-card__inner">
		<!-- wp:shortcode -->[adamsons_author_image size="120" class="author-card__avatar"]<!-- /wp:shortcode -->

		<!-- wp:group {"className":"author-card__content","layout":{"type":"default"}} -->
		<div class="wp-block-group author-card__content">
			<!-- wp:paragraph {"className":"author-card__eyebrow caps"} -->
			<p class="author-card__eyebrow caps">For more information, get in touch</p>
			<!-- /wp:paragraph -->

			<!-- wp:post-author-name {"className":"author-card__name"} /-->
			<!-- wp:post-author-biography {"className":"author-card__bio"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"author-card__actions"} -->
		<div class="wp-block-buttons author-card__actions">
			<!-- wp:button {"className":"btn btn--tertiary"} -->
			<div class="wp-block-button btn btn--tertiary"><a class="wp-block-button__link wp-element-button" href="#">See profile</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
