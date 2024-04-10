<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'qnkdilnvhosting_trbot' );

/** Database username */
define( 'DB_USER', 'qnkdilnvhosting_trbot' );

/** Database password */
define( 'DB_PASSWORD', 'J4yp(7]7S6' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'aat1l4uodzaxqzor6kvh14mku2wfdldjwwulkz1b3ievvajwuzbhpoibfh2vbsm6' );
define( 'SECURE_AUTH_KEY',  'vyp3chw0ogfxsominwltoddkcmeeaoimbkwgqdy5hlxaqbkelybyfqmxcfssuslo' );
define( 'LOGGED_IN_KEY',    'j9xxvsfxuhib6n1i5zrzopjwo2kmwoamrqtah9vqja78inz2bdigqznb5rrqmqfs' );
define( 'NONCE_KEY',        'anxepdknlm3aauggnb9i9patke0supujzhjunj9vvuel6ip4zuxg7stub8yrd8ho' );
define( 'AUTH_SALT',        'bemjka71oty7qqv9pwbrdrz94ornj02p22guwsoy7ffs279uwbylcwd17daufgfn' );
define( 'SECURE_AUTH_SALT', 'vzbtneemllondw5lshcwyq6g0igtu5piwknwqd2psqzl8wx6nmhnnd5wtrggeay1' );
define( 'LOGGED_IN_SALT',   'ttqpbbcbjxz5pejjd5fyvloskdvuptdf2gxp9enyzunoueklmt6dvibdvrwqry3y' );
define( 'NONCE_SALT',       'hnwvshszpozvsrk2vftuvsjcc374hsebljv34jy72m3rz4olbodfrake2ctctloh' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tb41_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
