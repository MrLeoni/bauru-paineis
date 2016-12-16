<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Laticínios_Betim
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
dynamic_sidebar( 'sidebar-1' );
?>