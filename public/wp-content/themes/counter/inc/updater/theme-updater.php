<?php
/**
 * Counter Theme Updater.
 *
 * @package Counter
 */

// Includes the files needed for the theme updater.
if ( ! class_exists( 'Counter_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes.
$updater = new Counter_Theme_Updater_Admin(
	// Config settings.
	$config = array(
		'remote_api_url' => 'https://themepatio.com', // Site where EDD is hosted.
		'item_name'      => 'Counter', // Name of theme.
		'theme_slug'     => 'counter', // Theme slug.
		'version'        => '1.3.0', // The current version of this theme.
		'author'         => 'ThemePatio', // The author of this theme.
		'download_id'    => '', // Optional, used for generating a license renewal link.
		'renew_url'      => '', // Optional, allows for a custom license renewal link.
	),
	// Strings.
	$strings = array(
		'theme-license'             => __( 'Theme License', 'counter' ),
		'enter-key'                 => __( 'Enter the license key.', 'counter' ),
		'license-key'               => __( 'License Key', 'counter' ),
		'license-action'            => __( 'License Action', 'counter' ),
		'deactivate-license'        => __( 'Deactivate', 'counter' ),
		'activate-license'          => __( 'Activate', 'counter' ),
		'status-unknown'            => __( 'License status is unknown.', 'counter' ),
		'renew'                     => __( 'Renew?', 'counter' ),
		'unlimited'                 => __( '&infin;', 'counter' ),
		'license-key-is-active'     => __( 'Active.', 'counter' ),
		'expires%s'                 => __( 'Expires %s.', 'counter' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'counter' ),
		'license-key-expired-%s'    => __( 'License expired %s.', 'counter' ),
		'license-key-expired'       => __( 'License has expired.', 'counter' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'counter' ),
		'license-is-inactive'       => __( 'Inactive.', 'counter' ),
		'license-key-is-disabled'   => __( 'License is disabled.', 'counter' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'counter' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'counter' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'counter' ),
		'update-available'          => _x( '%s is available.', 'Theme Name X.X.X is available.', 'counter' ),
		'what-is-new'               => _x( 'Check out what\'s new', 'Part of the sentence: Check out what\'s new or update now.', 'counter' ),
		'or'                        => _x( 'or', 'Part of the sentence: Check out what\'s new or update now.', 'counter' ),
		'update-now'                => _x( 'update now', 'Part of the sentence: Check out what\'s new or update now.', 'counter' ),
		'where-is-the-license'      => __( 'Where do I get it?', 'counter' ),
	)
);
