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
define('DB_NAME', '20180514_wp');

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
define('AUTH_KEY',         'E$=}Dp0rCQkIs6#7B!%o-TFPF)|3QyV_3VIcAfdxrgJ6R_)83:5pF#cA~m.1J?L>');
define('SECURE_AUTH_KEY',  'm8){EBa8/??2&}%!aLA_hF*ToyKw<zr)AK#+(`(Gg,Z3~Xa.4qHL}>7P}hjQQ1n ');
define('LOGGED_IN_KEY',    'GI$r`0$];rH,BPW`yUF3n<rwX[( o)2;O:&:xa^A<Sk>;p<C;VJCC$qp;0gY|3e}');
define('NONCE_KEY',        'e{rOfgC+NcFFS7pmOWK&,0WHww_nD]dX$t-jDB:rffUKa: C>BjK(:s36O?l~|[4');
define('AUTH_SALT',        'P@![(UBe!fq39=8_9]zmEOT5|;9wmv!5H%DG{aH|`#tc}f(fU$=;9A#EA2@uoPP7');
define('SECURE_AUTH_SALT', 'LceV#Q;<(ie7unNM]5G^ylx)r_rPkfXd?OL soJOxrDFXIJ41=njv{n!K_QM%{<D');
define('LOGGED_IN_SALT',   'feVfX*??EDYU?:2]2pk0oPGwfnHwM$@9%U$yE?DN5k$w1V[v}V8$-;h=l:N)a&jb');
define('NONCE_SALT',       'm$+4ilov&TtPshI/ (qH,.Jl<wN<4*s<eHZfC1)+msJQ_doc]i6sck36<J#@(~DB');

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
