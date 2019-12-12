<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lecoffeebh677');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oSnIBQKJ3L09aoKAVMhodZisVQgzfPZ2PETF3KqaNArGJ73QOte1wat0YzBV');
define('SECURE_AUTH_KEY',  'jGKv9E+cKeW6l0tIMuq9HD6IuC1ECBPZNAcJ2lknF3Z2r3plNQQfPTnOt/28');
define('LOGGED_IN_KEY',    'bbBPotHQTkz2MX/Pze730XvtcLFBQWb9bDfGKKKAEKrZ2whzBOu6/Jaiy+7V');
define('NONCE_KEY',        'nfYGyHjs4IAC9IFF97kUxe9PcSCId5+R+opTL2FazMpxL+6XVb9nHIrpmLi1');
define('AUTH_SALT',        'sZBwBw99tG6AzawSDLS10qMu6LfWclXHFzC+FPQIMm7QNyZNe0a7ib+eDR2i');
define('SECURE_AUTH_SALT', 'g0ceWmgHxFoU3aMz1WAk2jI2BPoIrtXO/U+IRMvTGN7VMJq44qVPi1zMAajP');
define('LOGGED_IN_SALT',   '4kuzMDeaVcLGMSe74Q+MDwN8D47qFQJS+Fb9ErecSThPz0vNlgrjB83SxMNc');
define('NONCE_SALT',       'v8i25K+HwQYKZmdOmwlOxMVLGcsIQHjiFGigFfIOXp5ghVBORge2tCiIEOxP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mod981_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
