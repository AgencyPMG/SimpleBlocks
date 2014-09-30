<?php
/**
 * This file is part of Simple Blocks Post Type and it creates the custom post type
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

class SimpleBlocks
{
    const POST_TYPE = 'sb_posttype';
    
    function __construct() {
        add_action( 'init', array( $this, 'createSimpleBlocks') );
    }
    
    function createSimpleBlocks()
    {
	register_post_type(static::POST_TYPE,
	    array(
		'public'        => false,
		'show_ui'       => true,
		'label'  	=> 'Simple Blocks',
		'supports'      => array(
		    'title', 'editor', 'thumbnail', 'revisions',),
	    )
	);
	
    }
}
?>