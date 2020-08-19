<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bcorporate
 */

if ( ! is_active_sidebar( 'bcorporate_footer_three' ) ) {
	return;
}
?>

<aside id="bcorporate_footerthree" class="widget-area">
	<?php dynamic_sidebar( 'bcorporate_footer_three' ); ?>
</aside><!-- #secondary -->
