<?php

define('FS_METHOD', 'direct');

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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db768510592' );

/** MySQL database username */
define( 'DB_USER', 'dbo768510592' );

/** MySQL database password */
define( 'DB_PASSWORD', 'aKQukBZWqWpqiFeSWVqe' );

/** MySQL hostname */
define( 'DB_HOST', 'db768510592.hosting-data.io' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2002iR{/a+#V/ )U|22{[5:MS4c(F!RI]:fn9LURGeZ$6pF:KFcg`|a4b09t@ @5');
define('SECURE_AUTH_KEY',  'TUrYir2k]zCcVW}d^HS(iwgeqzQ~At?AnD$HnG! KJ0Xn-.l?s| .K<4tZ-O1Y4J');
define('LOGGED_IN_KEY',    'aYg6+_/?+,oS-K71M`m[3&moW@eIZ+857ZR))w.JUJ9$_sC8j-^^:,_+$XP9tuqZ');
define('NONCE_KEY',        '|h-J(E]>Qcq5-wt)DH^3N- 6G(g7RdiOCM%!++G`1R>m?8c@:M@B,asjlU52vH<@');
define('AUTH_SALT',        '#4GMGP|^uA]x[RmPHW+$GeSs%v3)8j-6n4|K0;xHCKcRA.wLXe !oyE6Mi$+Bl|H');
define('SECURE_AUTH_SALT', 'Q-kEhn-N)-:$vuy`Sj~|2lv3p>gw{*N9KTwHmeGZAX2gY>0vXb Jp[G5s&)sR>:W');
define('LOGGED_IN_SALT',   'Je|k{}$5| ;>I4$HHN+N ]m,0-sA_Ls#ak>v]$W[9ODP|1T^^Ujmx2`<5C2_[5b6');
define('NONCE_SALT',       '+wc:f[$ygsR!T:{hi`OP?+4bA<kLq p~ LEz= %ZZZ7_INjtHA`8+A~=j:+KDDNs');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'TdrzmpkA';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
