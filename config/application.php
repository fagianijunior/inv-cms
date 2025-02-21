<?php
/**
 * Your base production configuration goes in this file. Environment-specific
 * overrides go in their respective config/environments/{{WP_ENV}}.php file.
 *
 * A good default policy is to deviate from the production config as little as
 * possible. Try to define as much of your configuration in this file as you
 * can.
 */

use Roots\WPConfig\Config;
use function Env\env;

// USE_ENV_ARRAY + CONVERT_* + STRIP_QUOTES
Env\Env::$options = 31;

/**
 * Directory containing all of the site's files
 *
 * @var string
 */
$root_dir = dirname(__DIR__);

/**
 * Document Root
 *
 * @var string
 */
$webroot_dir = $root_dir . '/web';

/**
 * Use Dotenv to set required environment variables and load .env file in root
 * .env.local will override .env if it exists
 */
if (file_exists($root_dir . '/.env')) {
    $env_files = file_exists($root_dir . '/.env.local')
        ? ['.env', '.env.local']
        : ['.env'];

    $dotenv = Dotenv\Dotenv::createImmutable($root_dir, $env_files, false);

    $dotenv->load();

    $dotenv->required(['WP_HOME', 'WP_SITEURL']);
    if (!env('DATABASE_URL')) {
        $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD']);
    }
}

/**
 * Set up our global environment constant and load its config first
 * Default: production
 */
define('WP_ENV', env('WP_ENV') ?: 'production');

/**
 * Infer WP_ENVIRONMENT_TYPE based on WP_ENV
 */
if (!env('WP_ENVIRONMENT_TYPE') && in_array(WP_ENV, ['production', 'staging', 'development', 'local'])) {
    Config::define('WP_ENVIRONMENT_TYPE', WP_ENV);
}

/**
 * URLs
 */
Config::define('WP_HOME', env('WP_HOME'));
Config::define('WP_SITEURL', env('WP_SITEURL'));

/**
 * Custom Content Directory
 */
Config::define('CONTENT_DIR', '/app');
Config::define('WP_CONTENT_DIR', $webroot_dir . Config::get('CONTENT_DIR'));
Config::define('WP_CONTENT_URL', Config::get('WP_HOME') . Config::get('CONTENT_DIR'));

/**
 * DB settings
 */
if (env('DB_SSL')) {
    Config::define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL);
}

Config::define('DB_NAME', env('DB_NAME'));
Config::define('DB_USER', env('DB_USER'));
Config::define('DB_PASSWORD', env('DB_PASSWORD'));
Config::define('DB_HOST', env('DB_HOST') ?: 'localhost');
Config::define('DB_CHARSET', 'utf8mb4');
Config::define('DB_COLLATE', '');
$table_prefix = env('DB_PREFIX') ?: 'wp_';

if (env('DATABASE_URL')) {
    $dsn = (object) parse_url(env('DATABASE_URL'));

    Config::define('DB_NAME', substr($dsn->path, 1));
    Config::define('DB_USER', $dsn->user);
    Config::define('DB_PASSWORD', isset($dsn->pass) ? $dsn->pass : null);
    Config::define('DB_HOST', isset($dsn->port) ? "{$dsn->host}:{$dsn->port}" : $dsn->host);
}

/**
 * Authentication Unique Keys and Salts
 */
Config::define('AUTH_KEY', env('AUTH_KEY'));
Config::define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
Config::define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
Config::define('NONCE_KEY', env('NONCE_KEY'));
Config::define('AUTH_SALT', env('AUTH_SALT'));
Config::define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
Config::define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
Config::define('NONCE_SALT', env('NONCE_SALT'));

/**
 * Custom Settings
 */
Config::define('AUTOMATIC_UPDATER_DISABLED', true);
Config::define('DISABLE_WP_CRON', env('DISABLE_WP_CRON') ?: false);

// Disable the plugin and theme file editor in the admin
Config::define('DISALLOW_FILE_EDIT', true);

// Disable plugin and theme updates and installation from the admin
Config::define('DISALLOW_FILE_MODS', true);

// Limit the number of post revisions
Config::define('WP_POST_REVISIONS', env('WP_POST_REVISIONS') ?? true);

/**
 * Debugging Settings
 */
Config::define('WP_DEBUG_DISPLAY', false);
Config::define('WP_DEBUG_LOG', false);
Config::define('SCRIPT_DEBUG', false);
ini_set('display_errors', '0');

Config::define('WP_MEMORY_LIMIT', '512M');
Config::define('WP_MAX_MEMORY_LIMIT', env('WP_MAX_MEMORY_LIMIT') ?: '2048M');

/**
 * Allow WordPress to detect HTTPS when used behind a reverse proxy or a load balancer
 * See https://codex.wordpress.org/Function_Reference/is_ssl#Notes
 */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';

if (file_exists($env_config)) {
    require_once $env_config;
}

/**
 * Set config s3 plugin to private
 */

Config::define('S3_UPLOADS_OBJECT_ACL', 'private');

// Wp rocket
Config::define( 'WP_ROCKET_EMAIL', env('WP_ROCKET_EMAIL'));
Config::define( 'WP_ROCKET_KEY', env('WP_ROCKET_KEY'));


Config::apply();

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir . '/wp/');
}

if ((isset($_SERVER['HTTP_X_FORWARDED_PORT'])
    && ('443' == $_SERVER['HTTP_X_FORWARDED_PORT']))
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])
    && 'https' == $_SERVER['HTTP_X_FORWARDED_PROTO'])
    || (isset($_SERVER['HTTP_CF_VISITOR'])
    && $_SERVER['HTTP_CF_VISITOR'] == '{"scheme":"https"}')
    || (isset($_SERVER['HTTP_CLOUDFRONT_FORWARDED_PROTO'])
    && $_SERVER['HTTP_CLOUDFRONT_FORWARDED_PROTO'] == 'https')
) {
    $_SERVER['HTTPS'] = 'on';
}


/**
 * S3-Uploas settings
 *
 * AWS_S3_URL should be in the form of one of the following:
 *   s3://KEY:SECRET@s3.amazonaws.com/BUCKET
 *   s3://KEY:SECRET@s3-REGION.amazonaws.com/BUCKET (with optional region)
 *   s3://KEY:SECRET@s3.amazonaws.com/BUCKET?url=https://example.com (to set a prettier bucket URL / alias)
 */
if ( !empty( $_ENV['AWS_S3_URL'] ) ) {
	$_awssettings = array();
	$_awsquery = array();

	$_awsmatch = array();
	if ( preg_match( '/^s3:\/\/([^:]+):([a-zA-Z0-9+\/]+)@(s3[0-9a-z-]*\.amazonaws\.com.*)$/', $_ENV['AWS_S3_URL'], $_awsmatch ) ) {
		// Non-conforming URL fix it then parse
		$_awssettings = parse_url( sprintf(
			"s3://%s:%s@%s",
			urlencode( $_awsmatch[1] ),
			urlencode( $_awsmatch[2] ),
			$_awsmatch[3]
		) );
		$_awsmatch = array();
	} else {
		// Properly URL encoded base64 encoded string just parse
		$_awssettings = parse_url(
			$_ENV['AWS_S3_URL']
		);
	}

	define( 'S3_UPLOADS_KEY',    urldecode( $_awssettings['user'] ) );
	define( 'S3_UPLOADS_SECRET', urldecode( $_awssettings['pass'] ) );
	define( 'S3_UPLOADS_BUCKET', trim( $_awssettings['path'], '/' ) );

	$_awsmatch = array();
	if ( preg_match( '/^s3(-|\.dualstack\.)([0-9a-z-]+)\.amazonaws\.com$/', $_awssettings['host'], $_awsmatch ) ) {
		define( 'S3_UPLOADS_REGION', $_awsmatch[2] );
	} else {
		define( 'S3_UPLOADS_REGION', 'us-east-1' );
	}

	if ( !empty( $_awssettings['query'] ) ) {
		parse_str( $_awssettings['query'], $_awsquery );
		if ( !empty( $_awsquery['url'] ) ) {
			define( 'S3_UPLOADS_BUCKET_URL', $_awsquery['url'] );
		}
	}

  define( 'S3_UPLOADS_HTTP_EXPIRES', gmdate( 'D, d M Y H:i:s', time() + (10 * 365 * 24 * 60 * 60) ) .' GMT' );

	unset( $_awssettings, $_awsquery, $_awsmatch );
}