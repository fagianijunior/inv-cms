<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * Do not edit this file. Edit the config files found in the config/ dir instead.
 * This file is required in the root directory so WordPress can find it.
 * WP is hardcoded to look in its own directory or one directory up for wp-config.php.
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/application.php';
require_once ABSPATH . 'wp-settings.php';

define('JWT_AUTH_SECRET_KEY', 'y63~SuQ]7,fcCZVww*ZD$<,sac1>m<39rYUOeyBI1)FG[[iu:szVkBbSQ@8fSv36');
define('JWT_AUTH_CORS_ENABLE', true);