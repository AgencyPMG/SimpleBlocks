<?php
/**
 * Plugin Name: Simple Blocks Post Type
 * Plugin URI: http://pmg.com/
 * Description: Creates a custom post type that you can pull through via a shortcode
 * Version: 1.0
 * Text Domain: simple-blocks
 * Author: Emily Fox <emily@pmg.com>
 * Author URI: http://pmg.com/
 * License: GPL-2.0+
 *
 * Copyright 2014 Performance Media Group <http://pmg.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

!defined('ABSPATH') && exit;

require_once __DIR__.'/inc/Setup.php';
require_once __DIR__.'/inc/Shortcode.php';
require_once __DIR__.'/inc/PostType.php';
require_once __DIR__.'/inc/AdminPostDisplay.php';
require_once __DIR__.'/inc/AdminListDisplay.php';
require_once __DIR__.'/inc/functions.php';

add_action('plugins_loaded', 'pmg_simpleblocks_load');
