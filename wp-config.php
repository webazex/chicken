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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'chicken' );

/** Database username */
define( 'DB_USER', 'root' );
//define( 'DB_USER', 'chiken' );

/** Database password */
//define( 'DB_PASSWORD', 'root' );
define( 'DB_PASSWORD', '' );
//define( 'DB_PASSWORD', 'Chicken*001' );

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
define( 'AUTH_KEY',         'BScq.@R8d iAJydjf^)wnWxjeko^tKI--H)Wt+e.79U4^lw  nf3v[-6wDHksw1E' );
define( 'SECURE_AUTH_KEY',  'kr+I-[Q*#oMvRsg8fEUS~rUf1b-DeBA/JM4qC&)s2k%27y@C5Th4m;I<;8jMo?5$' );
define( 'LOGGED_IN_KEY',    'Fw59<4$%t9Zvt?P+//-u_0NvuaN18R]cW30+[6H1Hhi|gE{NEM|;p&V/%I_*v#U7' );
define( 'NONCE_KEY',        'em|)-DXKX1B/5|>G@LCYtjT~c%^,DhC(MPU1AX$UX.NGb->pFH@xsXf:,aF+jq}c' );
define( 'AUTH_SALT',        'dR|9g1;^(IXJb3gNnYIO.q{,@R$;>5}=z&KH2vTD!<2JWk`O{:H}K[.CW33[la=8' );
define( 'SECURE_AUTH_SALT', 'A<j*` G~aHD_y`F2GoozKW0[9Lyp6v{-@Q^]7^eyDBtCo=OKJiP0I![[OHAMMk5f' );
define( 'LOGGED_IN_SALT',   '-4Vj<=.$^l/2db:2>6p)X+YQ3iuHCo7.!A{G@$5OP9JhR6@=K2K]PA~{:Z{pO#g2' );
define( 'NONCE_SALT',       '7PHEC<f0N*D]l%%!U9<b{9wq_,Q#?/RBmi7couPN7M9R|?OOkF/5l_7<Sweq+X5-' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
