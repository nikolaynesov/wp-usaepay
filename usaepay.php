<?php
/*
Plugin Name: USAePay Service Provider
Plugin URI: 
Description: Merchants Source key must be generated within the console Service Provider.
Version: 1.0
Author: Nikolay Nesov
Author URI: 
*/

$usaepay_base   = plugin_dir_path(__FILE__);
$usaepay_config = require_once $usaepay_base . 'config/config.php';

require_once $usaepay_base . 'includes/functions.php';
require_once $usaepay_base . 'usaepay/Admin.php';
require_once $usaepay_base . 'vendor/autoload.php';

$usaepay_init = new usaepay\Admin($usaepay_config);