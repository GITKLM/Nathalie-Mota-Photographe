<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'Nathalie-Mota-Photographe' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3(!TT^[AvOA,)^j=h-`a@EJy=v!n].NJZJd4V@uXY=rp--XGLe6+:IU?),FQ/.4E' );
define( 'SECURE_AUTH_KEY',  'h0qy.un5;M<~_=}u8/tug?A:0$#PU$4abQ@{M=`b$&}C{hp]4|xn0GG-0uLa@be!' );
define( 'LOGGED_IN_KEY',    ',JV2Q1=$ikR[9BP64~wCzNFPMN?QT#WR7jO9/{m6q*N{L8{$}||rv,gxBcBa]C.@' );
define( 'NONCE_KEY',        'yT?ccNY*U-N-x]@dd2dEIUL[4aw8u49PS5D/]hiyw(xOHz(1j33u%OQ@c8;nl49Z' );
define( 'AUTH_SALT',        'TcV1x77B2)z7J^R{+@6oNj(mg,zyd58;VNnR^GPRK9;2&zz)$y5RX2c.MXM;}f$6' );
define( 'SECURE_AUTH_SALT', '1d3,&.q)=w}5,O<8#kq$P,PV#%n6Np]?2a(+Dz:$3d4k/hwoi6]3.nrxN9#@r)BB' );
define( 'LOGGED_IN_SALT',   'an7+vBDhA(m.A[ahtFYjpTT&^gEHQe9[Y&2us&pnuu~y2trq/$KqKE`E:Cc]`ICR' );
define( 'NONCE_SALT',       '+19!=eaZwC[}Tce.Wr*:>CJeK#CM!Gyr4G* 8c?,YqV:;XSNju2^1=^wm24oE-Op' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );


/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
