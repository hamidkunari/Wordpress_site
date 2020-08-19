<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bcorporate
 */

if ( ! is_active_sidebar( 'bcorporate_footer_one' ) ) {
	return;
}
?>

<aside id="bcorporate_footerone" class="widget-area">
	<?php dynamic_sidebar( 'bcorporate_footer_one' ); ?>
</aside><!-- #secondary -->
