<?php
/*
Plugin Name: WordPress Hook Debugging
Plugin URI: https://pascalknecht.ch/
Description: Debug WordPress Hooks easily - see which hooks were fired
Author: Pascal Knecht
Version: 0.0.1
Author URI: https://pascalknecht.ch
Text Domain: wp-debugger
Domain Path: /languages
 */

define('WP_DEBUGGER_DIR', dirname(__FILE__));

$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once($autoload);
}

(WPDebugger\PluginFactory::create())->run();
