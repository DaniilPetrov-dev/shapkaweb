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
define('DB_NAME', 'host1842041_4010');

/** MySQL database username */
define('DB_USER', 'host1842041_4010');

/** MySQL database password */
define('DB_PASSWORD', 'i5C-GLZ-j2D-PfC');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'oTyd#wGoO!xOQBJP!4UwE&PIJS&4j!4^OkXrDk3PG5TQYcsNi#Yl8&KEBsxXVtD2');
define('SECURE_AUTH_KEY',  'qjTFvS%gnbs9qS&s2sE%ohAkqRB9KPhn(Tsq4XmhysFL2BzK(#PW40DmpU2Yva@Z');
define('LOGGED_IN_KEY',    'ciav25RSRrZnwc@v^mwN(ZhPZLxZDO1^ONw6eI@XqUOA47AkuaNhJlLhcscnlDjR');
define('NONCE_KEY',        'Zq@f^HpoXM5*U59#F7o0BSJ3vSS*tGPgmcU9GZ!vCp#8G@ILgPz0jsJOrMqSCmtB');
define('AUTH_SALT',        'xTh!i@#j5c9!%@8tFdh8JF7D!)AvrW3BwHcGsIV@8nstuID17sOb)N2TNIw8ZVEW');
define('SECURE_AUTH_SALT', 'xDCydr&fZlNX*pbBH@W2U1kUY6pPbVWaqXb^u@kC0AhiM%Gfj(SY#1W7T9yaw4mR');
define('LOGGED_IN_SALT',   'XyFdVUPJPIE3JVq2d69F*4ban5I6F^LTV2KbWwUQH)l(4nLWhnhI#U&aiiyHVsGt');
define('NONCE_SALT',       '%#UNMdB5cvB)uvbp!TqlpC)vyAQfmuiUAab93mNe#9H!8cPIcktfNV1)9s2RxF6I');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');