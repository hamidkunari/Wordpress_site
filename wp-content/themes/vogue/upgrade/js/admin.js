/**
 * Custom JS Functionality
 *
 */
( function( $ ) {
    $(window).load(function() {
			$( '.e-dashboard-widget .e-overview__go-pro a' ).attr( 'href', 'https://kairaweb.com/go/elementor/' );
			$( '#adminmenu #toplevel_page_elementor a[href="admin.php?page=go_elementor_pro"]' ).attr( 'href', 'https://kairaweb.com/go/elementor/' ).attr( 'target', '_blank' ).css( 'color', '#d54e21' );
			$( 'a.elementor-plugins-gopro' ).attr( 'href', 'https://kairaweb.com/go/elementor/' ).attr( 'target', '_blank' ).css( 'color', '#39b54a' );
			$( '.elementor-button.elementor-button-default.elementor-button-go-pro' ).attr( 'href', 'https://kairaweb.com/go/elementor/' );
    });
} )( jQuery );