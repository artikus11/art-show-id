<?php
/**
 * Файл шаблона значения
 *
 * @global $args
 * @package art-show-id
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $args ) {
	return;
}
$post_id = $args['id'];
$column  = $args['column'];
?>

<script>
	jQuery( function( $ ) {

		var clipboard = new ClipboardJS( '.item-id' );

		clipboard.on( 'success', function( e ) {
			$( e.trigger ).next().removeClass( 'hidden' );
			setTimeout( function() {
				$( e.trigger ).next().addClass( 'hidden' );
			}, 1000 );
			e.clearSelection();
		} );
	} );
</script>

<div class="copy-button-wrapper" style="display: flex;flex-direction: column;align-items: flex-start;justify-content: center;">
	<button type="button" class="button copy-button item-id" data-clipboard-text="<?php echo esc_attr( $post_id ); ?>" style="display: flex;align-items: center;justify-content: space-between;">
		<svg viewBox="0 0 896 1024" style="width: 14px;fill: #666161;margin-right: 5px"><path d="M128 768h256v64H128v-64zm320-384H128v64h320v-64zm128 192V448L384 640l192 192V704h320V576H576zm-288-64H128v64h160v-64zM128 704h160v-64H128v64zm576 64h64v128c-1 18-7 33-19 45s-27 18-45 19H64c-35 0-64-29-64-64V192c0-35 29-64 64-64h192C256 57 313 0 384 0s128 57 128 128h192c35 0 64 29 64 64v320h-64V320H64v576h640V768zM128 256h512c0-35-29-64-64-64h-64c-35 0-64-29-64-64s-29-64-64-64-64 29-64 64-29 64-64 64h-64c-35 0-64 29-64 64z"/></svg><?php echo esc_attr( $post_id ); ?></button>
	<span class="success hidden" aria-hidden="true"><?php _e( 'Copied!' ); ?></span>
</div>
