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
define('DB_NAME', 'amidatabase');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '0p]9+gdA=9k@U{ec(y74ZsKIGiW-~zV*[2M/?#9r:h8!ud=lkBG1FG(Mw|:y@reh');
define('SECURE_AUTH_KEY',  'd*%km,5:n*vl^d,=;U5x<K%WwDu!2= ;,;u0eX.tb?|O)i;56-%UP)qL(g{I,0J ');
define('LOGGED_IN_KEY',    'Sy08c+ngk1yx^wGaJ3eoLPiA>I]2/E#<|`9mwQ>M)~}:AKR`~~]sGbl=+vgd(H*k');
define('NONCE_KEY',        '%azvx>AN$+T~H|G1rE&?WbvU&%%[Lo9S,OrgR4FuPxNnTtuGrO:^Zag)@w,)Iq!C');
define('AUTH_SALT',        'N|XPcmG,TM{9QjS+B|&SSjW-Z/0A!lqB$TwxFAj#-}kt)XE54x#>B%SDk+Or4P2=');
define('SECURE_AUTH_SALT', '?2(szS@u OW^F]:vKs9.ObdZYp)L_@@X@%2ciMXp+`hR@VH,4C=<$_inDfE6?(AE');
define('LOGGED_IN_SALT',   'cAJk]Z&{y{.Yw6sG!,<AC}AzOZfleNNx@DVBJ`@dy/J@+3sW wG*Uqj^|Aqf@!i5');
define('NONCE_SALT',       'XU.~;57ak*<-{M,MEu|$kK{sm+35Pg:3:1N2E1hVhko!C>:.ewNQ/%Qyy*Uk< {M');

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
