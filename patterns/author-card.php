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

			<!-- wp:shortcode -->[adamsons_author_name class="author-card__name"]<!-- /wp:shortcode -->
			<!-- wp:shortcode -->[adamsons_author_bio class="author-card__bio"]<!-- /wp:shortcode -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"author-card__actions"} -->
		<div class="wp-block-buttons author-card__actions">
			<!-- wp:button {"className":"btn btn--tertiary"} -->
			<div class="wp-block-button btn btn--tertiary"><a class="wp-block-button__link wp-element-button" href="[author_url]">See profile</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
