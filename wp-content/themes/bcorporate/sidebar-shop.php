<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bcorporate
 */

if ( ! is_active_sidebar( 'bcorporate_shop_sidebar' ) ) {
	return;
}
?>

<aside id="bcorporate_shop_sidebar" class="bcorporate_shop_sidebar col-md-4 col-sm-12  order-sm-12 order-md-1 order-lg-1">
	<?php dynamic_sidebar( 'bcorporate_shop_sidebar' ); ?>
</aside><!-- #secondary -->
</div> <!-- row wrap -->
