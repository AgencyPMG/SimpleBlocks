<?php
/**
 * This file is part of Simple Blocks Plugin and it initalises the PostType and Shortcode classes.
 *
 * Copyright (c) 2014 PMG <http://pmg.com>
 *
 * For full copyright and license information please see the LICENSE
 * file that was distributed with this source code.
 *
 * @category    WordPress
 * @copyright   2014 PMG <http://pmg.com>
 * @license     http://opensource.org/licenses/Apache-2.0 Apache-2.0
 */

use PMG\SimpleBlocks;

function pmg_simpleblocks_load()
{
    SimpleBlocks\PostType::init();
    SimpleBlocks\Shortcode::init();

    if (is_admin()) {
        SimpleBlocks\AdminPostDisplay::init();
        SimpleBlocks\AdminListDisplay::init();
    }
}

function pmg_simpleblocks_shortcode($id)
{
    return sprintf(
        '[simple_block id="%s"]',
        esc_html($id)
    );
}
