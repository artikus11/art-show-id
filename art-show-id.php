<?php
/**
 * Plugin Name: Art Show ID
 * Plugin URI: wpruse.ru
 * Text Domain: art-show-id
 * Domain Path: /languages
 * Description: Вывод ID в отдельно колонке для постов, страниц, таксономий, пользователей, комментариев
 * Version: 1.2.3
 * Author: Artem Abramovich
 * Author URI: https://wpruse.ru/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Requires at least: 5.8
 * Requires PHP:      7.4
 */

const ASID_PLUGIN_DIR       = __DIR__;
const ASID_PLUGIN_AFILE        = __FILE__;
const ASID_PLUGIN_VER       = '1.2.3';
const ASID_PLUGIN_SLUG      = 'art-show-id';
const ASID_PLUGIN_TEPMLATES = 'templates';

define( 'ASID_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
define( 'ASID_PLUGIN_FILE', plugin_basename( __FILE__ ) );

require ASID_PLUGIN_DIR . '/vendor/autoload.php';

function asid() {

	return \Art\ShowID\Main::instance();
}


asid();
