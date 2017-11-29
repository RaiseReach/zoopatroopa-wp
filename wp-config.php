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
define('DB_NAME', 'zoop_wp');

/** MySQL database username */
define('DB_USER', 'zoop_user');

/** MySQL database password */
define('DB_PASSWORD', '53+)%zGvJz5)');

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
define('AUTH_KEY',         '@ibv8}{`$*~e;I_Bu~ uQ^Uu.4IKvtQrM1=RAP~WlOlLbc+*QL,XsLFcqeJtpNr6');
define('SECURE_AUTH_KEY',  'h[*<egGhi8vgkfPHa)bUpYAcGT]2Au,s@$0_$0G2,$WL&nccq~)E9-W*/mpcrndJ');
define('LOGGED_IN_KEY',    'TNZhzK$[K;)~jYdNHw]MMcmeDB$c4a#e5w_z;>5MHqdPcs[2Q[Gr=V.o2*i<8[DM');
define('NONCE_KEY',        'i&(wMWf%m}x~PsP(o=[j_&.23z3{-A,Zy(-8p=o2bNH2vu`}LVXanED(~!BJ_1]W');
define('AUTH_SALT',        '^=368!+CK}`/ggTuYfjh5<b e,(qV .3eo[vfi)-fYX!8jnsrtU[9pcN28giBE0o');
define('SECURE_AUTH_SALT', '].KRQK3SO9A>t:<FAQpH>}oZq5O:pH;4:@q/C%:kz[sN4+z(@&rS/}OMBODtV&_J');
define('LOGGED_IN_SALT',   '[4H]jG349sUcg^xA9vY1%)6/JtB09~nSSWtpi.DjUC&l%#=YnL1qL[|AU bJ6c+e');
define('NONCE_SALT',       '~3:w/wlsT1%B}[}!G,sYKOSQPGM-A4g=21%2}XVqk[/?ikosbgw>(^io(ePHo4kw');

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
