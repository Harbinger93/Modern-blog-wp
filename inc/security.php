<?php
/**
 * Security & Hardening Module
 * Implementation of security best practices without plugins.
 *
 * @package ovp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1. Remove WordPress Version and Generator Tags
 */
add_filter( 'the_generator', '__return_empty_string' );
remove_action( 'wp_head', 'wp_generator' );

/**
 * 2. Disable XML-RPC (Common attack vector)
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * 3. Add Security Headers
 */
function ovp_add_security_headers() {
    if ( ! is_admin() ) {
        header( "X-Content-Type-Options: nosniff" );
        header( "X-Frame-Options: SAMEORIGIN" );
        header( "X-XSS-Protection: 1; mode=block" );
        header( "Referrer-Policy: no-referrer-when-downgrade" );
        // Content-Security-Policy can be restrictive, so we start with a safe base
        // header( "Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' fonts.googleapis.com; font-src 'self' fonts.gstatic.com;" );
    }
}
add_action( 'send_headers', 'ovp_add_security_headers' );

/**
 * 4. Disable REST API for non-authenticated users (Allowing search)
 */
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    
    // Permitir búsquedas públicas para que el buscador en tiempo real funcione
    if ( isset( $_GET['search'] ) ) {
        return $result;
    }

    if ( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_not_logged_in', 'Acceso restringido.', array( 'status' => 401 ) );
    }
    return $result;
});

/**
 * 5. Remove Login Errors (Prevent username enumeration)
 */
function ovp_login_errors() {
    return 'Error: Credenciales incorrectas.';
}
add_filter( 'login_errors', 'ovp_login_errors' );

/**
 * 6. Obfuscate Author URLs (Prevent scanning usernames)
 */
function ovp_disable_author_archives() {
    if ( is_author() ) {
        wp_redirect( home_url(), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'ovp_disable_author_archives' );
