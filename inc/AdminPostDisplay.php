<?php
/**
 * This file is part of Simple Blocks Plugin and it adds the shortcode
 * with prefilled ID to a meta box in the post edit page
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

class AdminPostDisplay extends Setup
{
    function hook()
    {
        add_action( 'add_meta_boxes', array($this, 'addMetaBox') );
    }
    
    function addMetaBox()
    {
        add_meta_box(
            'simple-blocks-shortcode',
            __('Simple Block Shortcode', 'simple-blocks'),
            array($this, 'metaBoxContent'),
            PostType::POST_TYPE,
            'side',
            'core'
        );
    }
    
    function metaBoxContent($post)
    {
        echo pmg_simpleblocks_shortcode($post->ID);  
    }
}