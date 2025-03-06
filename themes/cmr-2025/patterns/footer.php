<?php
/**
 * Title: footer
 * Slug: cmr-2025/footer
 * Inserter: no
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"vert-clair","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-vert-clair-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|blanc"}}},"border":{"top":[],"right":{"color":"var:preset|color|blanc","style":"dotted"},"bottom":[],"left":[]}},"textColor":"blanc"} -->
<div class="wp-block-column has-blanc-color has-text-color has-link-color" style="border-right-color:var(--wp--preset--color--blanc);border-right-style:dotted"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}}} -->
<p style="text-transform:uppercase"><?php esc_html_e('Chrétiens dans le monde rural', 'cmr-2025');?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"none"}}} -->
<p style="text-transform:none"><?php /* Translators: 1. is a 'br' HTML element, 2. is a 'br' HTML element, 3. is the start of a 'a' HTML element, 4. is the end of a 'a' HTML element */ 
echo sprintf( esc_html__( '7 rue Paul Lelong%1$s75002 PARIS%2$sTél: %3$s01 69 83 23 24%4$s', 'cmr-2025' ), '<br>', '<br>', '<a href="' . esc_url( 'tel:0169832324' ) . '">', '</a>' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|blanc"}}}},"textColor":"blanc","layout":{"type":"constrained","justifyContent":"right"}} -->
<div class="wp-block-column has-blanc-color has-text-color has-link-color"><!-- wp:paragraph -->
<p><?php esc_html_e('Suivez notre page', 'cmr-2025');?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"lightbox":{"enabled":false},"width":"163px","height":"auto","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="https://www.facebook.com/chretienruraux/"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/Facebook-1.png" alt="" class="" style="width:163px;height:auto"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><?php esc_html_e('Visitez notre chaine', 'cmr-2025');?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"lightbox":{"enabled":false},"width":"163px","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="https://www.youtube.com/channel/UC3dY6-CkOseNy-r9m2Um_EA/videos"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/youtube.png" alt="" class="" style="width:163px"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|blanc"}}}},"backgroundColor":"vert-clair","textColor":"blanc","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-blanc-color has-vert-clair-background-color has-text-color has-background has-link-color"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php /* Translators: 1. is the start of a 'a' HTML element, 2. is the end of a 'a' HTML element */ 
echo sprintf( esc_html__( '© 2025 - Chrétiens du monde rural | %1$sMentions légales%2$s', 'cmr-2025' ), '<a href="' . esc_url( 'https://preprod.chretiens-ruraux.fr/mentions-legales/' ) . '" data-type="page" data-id="2309">', '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"100%"} -->
<div class="wp-block-column" style="flex-basis:100%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->