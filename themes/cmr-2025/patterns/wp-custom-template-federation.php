<?php
/**
 * Title: wp-custom-template-federation
 * Slug: cmr-2025/wp-custom-template-federation
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:post-title {"textAlign":"center","level":1,"style":{"color":{"background":"#f5f5f5"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"fontFamily":"dosis"} /-->

<!-- wp:group {"tagName":"main","metadata":{"name":"Contact"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60)">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"width":"33.33%"} -->
        <div class="wp-block-column" style="flex-basis:33.33%">
			<?php
			echo apply_shortcodes( '[contact_fede]' );
			?>
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"66.66%"} -->
        <div class="wp-block-column" style="flex-basis:66.66%">
            <!-- wp:post-content {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|blanc"}}}},"backgroundColor":"vert-clair","textColor":"blanc","layout":{"type":"constrained"}} /-->

			<?php
			echo apply_shortcodes( '[frdpt]' );
			?>
        </div>
        <!-- /wp:column --></div>
    <!-- /wp:columns --></main>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
    <!-- wp:group {"metadata":{"name":"News"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
        <!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:query {"queryId":10,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"parents":[],"format":[]}} -->
                <div class="wp-block-query"><!-- wp:post-featured-image /-->

                    <!-- wp:post-template -->
                    <!-- wp:post-title /-->

                    <!-- wp:post-date /-->

                    <!-- wp:post-excerpt /-->
                    <!-- /wp:post-template -->

                    <!-- wp:query-no-results -->
                    <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
                    <p><?php esc_html_e( 'Désolé, aucun contenu a présenter.', 'cmr-2025' ); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- /wp:query-no-results --></div>
                <!-- /wp:query --></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">

				<?php
				if ( function_exists( 'get_field' ) ) {
					$fede = get_field( 'fede_federation' );

					echo apply_shortcodes( '[ecs-list-events cat=' . $fede->slug . ']' );
				} ?>


            </div>
            <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->