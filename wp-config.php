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
define('DB_NAME', 'trimurty_allstate');

/** MySQL database username */
define('DB_USER', 'trimurty_dev');

/** MySQL database password */
define('DB_PASSWORD', '6TP%8~(QDUE');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'hiSv wNJ-v/!uH8I|=rpm0up6VxV4;,HS3Veg$Ek(m^z>r!B6!A2#be}?]UrbtA%');
define('SECURE_AUTH_KEY',  'r6L;]l8O7fp1-~&h@SoY0P GVOl$<BJF=:Bpr=GA5&Vmxdz//i<9(4B3HH)uj|NW');
define('LOGGED_IN_KEY',    '`U7O&a_S<j].VfLZYIE_R9-2SdY4e =gI*$b?[$tPS5X2D-Z;eL^m2%j^,pi|w|!');
define('NONCE_KEY',        '_phHYSf9!E&| . >*uL&~.lXxg%Iq )GLjK(k)E6y1qw00s{v!AYoZn%x}3&w@6.');
define('AUTH_SALT',        'r0$|A8-R>fzB v7pk.:tX,`qwx]Is(Jn/?=~g{!>e^$HdajW0a.c#+g]dpkWl1OW');
define('SECURE_AUTH_SALT', 'SxBcNW`_;edyD(597?+[wO}Nxnln]*iU-Ojgw=#.[F!7%30;RoTyf=H$i]f`3Zmz');
define('LOGGED_IN_SALT',   '+P$!qNq{i@q6uXuI[qD$D>y$gpR&tjBM[?A.k/_!F!mTiJ4eW=oOI+,E&Hz3aL)9');
define('NONCE_SALT',       '`rDHgq{f6&0R}NlIl10ZELgQ)wt.^JFJ*H&/-)|]`1he+SAFXfiO+Giq9O|;QjhI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpas_';

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

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
