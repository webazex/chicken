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

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '4_>^-+n{b<ttNE.*r]ApLPcFxi4l)}AZxPz7AH-+M5)dQ1P5Z`KFomh:F+W98L1z' );
define( 'SECURE_AUTH_KEY',  '0.%NkC5}1@?2^B(Xx-@!6((w5EDlO<+aq%Z;VMEheE,Vg)za#g{WWO<:K(Nq[mQS' );
define( 'LOGGED_IN_KEY',    'W9w O/ZGRp_YI_(`^-rfKT,#cWU~n[CC!FO@BWnh@[yI-51LXxGLVQh}VOipq+VU' );
define( 'NONCE_KEY',        '/KOdE&>P.xyA^ghBwd|%P}|vW2M.s } [Rx<r)UZ2,CHV$,S`N.MS0} p;Q{c^#t' );
define( 'AUTH_SALT',        '[ 0Kj&,L_*p`rL2+;,KT?q!HC=!5Lf.vlFwm ,oCbOPK/$LgJN=ty>4$@IV(VD)w' );
define( 'SECURE_AUTH_SALT', '_t{[cRw/n+-w6vuLWGm5v%R#[(l-lxsh[j|^n!DWGjGmOCd_J>JioGfv3uohUy,e' );
define( 'LOGGED_IN_SALT',   '%h%nAX9pQv)~w|1:&/v52l[}{?+UT,fn_YFrpn8vzr=u}^gbAOUeC%l+JXM3|s4T' );
define( 'NONCE_SALT',       'F HR]<G6BP*FO-`Pjwv@J,]JTsf}L& Vbonm-$(x_E.~c1v;-~.nWNs-L~o,qhQe' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cb_';

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
