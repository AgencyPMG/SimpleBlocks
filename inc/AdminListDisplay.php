<?php
/**
 * This file is part of Simple Blocks Plugin and it adds the shortcode
 * with prefilled ID to the admin area in the post list
 *
 * Copyright (c) 2014 PMG <http://pmg.co>
 *
 * For full copyright and license information please see the LICENSE
 * file that was distributed with this source code.
 *
 * @category    WordPress
 * @copyright   2014 PMG <http://pmg.co>
 * @license     http://opensource.org/licenses/Apache-2.0 Apache-2.0
 */

namespace PMG\SimpleBlocks;

!defined('ABSPATH') && exit;

class AdminListDisplay extends Setup
{
    function hook()
    {
        add_action('load-edit.php', array($this, 'load') );
    }
    
    function load()
    {
        $screen = \get_current_screen();
        if (!isset($screen->post_type) || PostType::POST_TYPE != $screen->post_type) {
            return;
        }
        
        add_filter("manage_{$screen->id}_columns", array($this, 'addColumn') );
    
        add_action(
           "manage_{$screen->post_type}_posts_custom_column",
           array($this, 'columnOutput'),
           10, 2
        );
    }
    
    function addColumn($cols)
    {
        $cols['simpleblock'] = __('Shortcode', 'simple-blocks');
        return $cols;
    }
    
    function columnOutput($col, $post_id)
    {
        esc_html_e('[simple_block id="'.$post_id.'"]', 'simple-blocks');
    }
}