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
define( 'DB_NAME', 'marqenti_wp839' );

/** Database username */
define( 'DB_USER', 'marqenti_wp839' );

/** Database password */
define( 'DB_PASSWORD', '.G(p)G0S!854Rj(p' );

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
define( 'AUTH_KEY',         'rvqik7uyu46yxhzlpgm76ryl0wkwf9wunfgndczfjixyszje43c9mw8esyrh9k5k' );
define( 'SECURE_AUTH_KEY',  'hxog6zyhe4hyuaidl2q33k4bdnjpgewpheuy4mhxjkgw81129ptlzskj69ooxusj' );
define( 'LOGGED_IN_KEY',    'd7szds28cvhjejn6ldaxikrkygjszuu62n7uxsxq6hcxs8bhjgdx0dhvcdck8aq0' );
define( 'NONCE_KEY',        'of6jgzxa32l5zfa4aixezrace99xlt6kynddrnyyjylodt28yeco1vb4cfdueek4' );
define( 'AUTH_SALT',        'xl2rmuekmitofirh8jgc9nhojd9q7teoowvtkqo5gtypjbvmbk5htqktss6npirw' );
define( 'SECURE_AUTH_SALT', 'skmdcswmpvwbxzwc2rgqj13fb6azxza68veadnieozniqdrib9crnxthxcptg0g8' );
define( 'LOGGED_IN_SALT',   'lbyptbdg62s74lvp7seivun1pt8ltnsympoihu1delmkfe3zvh6odss2u4d33nah' );
define( 'NONCE_SALT',       '0coidtwuccl8098rvheweu0u9qtilpcvaowqp3cidxkpiixd7yzruvj5kghhmx3b' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpt2_';

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
