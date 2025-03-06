<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.


add_shortcode( 'contact_fede', 'cmr_shortcode_contact_fede' );
function cmr_shortcode_contact_fede( $atts ) {

	if (! function_exists( 'get_fields' ) ){
		return __( 'ACF not acrtivated', 'cmr-2025' );
	}
	$fields = get_fields(  );

	ob_start();
	?>
	<div class="fede_contact">
        <h2 class="fede_contact_title"><?php _e('Contact', 'cmr-2025' ); ?></h2>
		<p><?php echo esc_attr( $fields['fede_nom'] ); ?></p>
		<p><?php echo esc_attr( $fields['fede_adresse'] ); ?></p>
        <p><?php echo esc_attr( $fields['fede_tel'] ); ?></p>
        <p><?php
            if ( function_exists( 'thfo_antispambot' ) ) {
	            echo apply_shortcodes( '[email]' . esc_attr( $fields['fede_email'] ) . '[/email]' );
            } else
                echo esc_attr( $fields['fede_email']);
                ?></p>
		<a href="<?php echo esc_url( $fields['fede_site'] ); ?>"> <?php _e( 'website', 'cmr-2025' ); ?></a>
	</div>
<?php
	return ob_get_clean();
}
