<?php
/*
Plugin Name: USAePay Service Provider
Plugin URI: 
Description: USAePay Service Provider.
Version: 1.0
Author: Nikolay Nesov
Author URI: 
*/

$usaepay_base   = plugin_dir_path(__FILE__);
$usaepay_config = require_once $usaepay_base . 'config/config.php';

require_once $usaepay_base . 'usaepay/Registry.php';
require_once $usaepay_base . 'usaepay/Init.php';
require_once $usaepay_base . 'includes/functions.php';

$usaepay_init = new usaepay\Init($usaepay_config);