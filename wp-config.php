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
define('DB_NAME', 'dbhtfn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'dev.htfn.com');

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
define('AUTH_KEY',         '-?l4@x.wwP({z>e> z>_+oE^*.bvmO@{miM.{lfI^xr)L[*!=Gz=K]vH88~iiU,R');
define('SECURE_AUTH_KEY',  'xp&,tm0D|/yTki2AK-wSW3:kzNJShG`Yz=e0iIn{}2Owwy?Qm_K_{fNN(>y(_=a0');
define('LOGGED_IN_KEY',    'A=9?GW,j*s~Wa=C12l;XOu-1{)VBmWC*0A^E I}Qq^*|]UDUn2?Hcy/|+isO -IV');
define('NONCE_KEY',        'D]N,{}@o{Mh38h{HNlYqXoU}}p._a7S;-=?~(1IJ;sna~:;M|z^mB6_lmQWw/q9J');
define('AUTH_SALT',        'uk|(ymQd?c=(3.ELBeQkvwLHkut.qhQ[a*(Yxp!wp<L*Q@|LL~@R_/]x#l-l#a7m');
define('SECURE_AUTH_SALT', 'ZpTN| 8a#2?Mqe n8i+2LzZ1eX|Blf%:;k0&ncx~wjrKF`}h)4yZ1tbdv=%.!#Ox');
define('LOGGED_IN_SALT',   '.5GsBpf~|!z=?%%?oV2&e@o!L%HR~`Q=4x4WZX82M^cgvzhp},r^qo_c{xM{DC>v');
define('NONCE_SALT',       'GC+5s@v1O?VI8~LskQ=+.r@SmFU~jBc,1S^+F=>V|tILSlX)@%_dDTg{^>5ZIYA<');

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
