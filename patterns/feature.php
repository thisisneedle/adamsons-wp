<?php
/**
 * Title: Feature
 * Slug: adamsons/feature
 * Categories: adamsons
 */
?>
<!-- wp:group {"className":"section section--feature"} -->
<div class="wp-block-group section section--feature">
	<!-- wp:group {"className":"container","layout":{"type":"default"}} -->
	<div class="wp-block-group container">
		<!-- wp:columns {"className":"grid grid--feature"} -->
		<div class="wp-block-columns grid grid--feature">
			<!-- wp:column {"className":"feature__copy"} -->
			<div class="wp-block-column feature__copy">
				<!-- wp:paragraph {"className":"eyebrow"} -->
				<p class="eyebrow">Lorem Ipsum</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":2,"className":"h2 caps"} -->
				<h2 class="h2 caps">What makes Adamsons different?</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Obis mi, to event, eumquas nullandus preped quo tem resstni iamsuae ninporectat. Orit lacidest est quis maiso inimet liciscii ipsaperiate.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p>Sae quibus, ulparis autem. Onsequi apis simus rest, autem nonsero quam dit et volor rerisquia conseq undernih ilicabore pore.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"btn btn--tertiary"} -->
					<div class="wp-block-button btn btn--tertiary"><a class="wp-block-button__link wp-element-button" href="#">Find out more</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"feature__media"} -->
			<div class="wp-block-column feature__media">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/homepage-inline.avif' ) ); ?>" alt="A professional meeting at Adamsons"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
