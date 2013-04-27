<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );

	//define( 'WP_CONTENT_URL',  'http://localhost/path/to/alias/content' );

} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', '%%DB_NAME%%' );
	define( 'DB_USER', '%%DB_USER%%' );
	define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );
	define( 'DB_HOST', '%%DB_HOST%%' ); // Probably 'localhost'

	define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );
	
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
//ini_set( 'display_errors', 0 );
//define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// define('WP_STACK_CDN_DOMAIN', 'static.exemple.com');

// ======================================
// Multisite
// ======================================
// define('WP_ALLOW_MULTISITE', true);
// define('MULTISITE', true);
// define('SUBDOMAIN_INSTALL', false);

// /* production */
// if( WP_STAGE == 'production' ){

// 	define('DOMAIN_CURRENT_SITE', 'demo.exemple.com');
// 	define('PATH_CURRENT_SITE', '/');

// /* stage */
// }elseif( WP_STAGE == 'staging' ){

// 	define('DOMAIN_CURRENT_SITE', 'stage.exemple.com');
// 	define('PATH_CURRENT_SITE', '/');

// /* local dev */
// }else{

// 	define('DOMAIN_CURRENT_SITE', 'localhost');
// 	define('PATH_CURRENT_SITE', '/path/to/wamp/alias/');

// }

// define('SITE_ID_CURRENT_SITE', 1);
// define('BLOG_ID_CURRENT_SITE', 1);

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
