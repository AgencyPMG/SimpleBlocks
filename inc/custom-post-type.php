<?php
/**
 * This file is part of Simple Blocks and it creates the custom post type
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

abstract class Setup
{
    const POST_TYPE = 'sb_posttype';
    
    private static $registry = array();

    public static function instance()
    {
        $cls = get_called_class();
        if (!isset(self::$registry[$cls])) {
            self::$registry[$cls] = new $cls();
        }
        return self::$registry[$cls];
    }

    public static function init()
    {
        static::instance()->hook();
    }
    
    abstract public function hook();
}

class PostType extends Setup
{
    function hook()
    {
        add_action( 'init', array( $this, 'createPostType') );
    }
    
    public function createPostType()
    {
	register_post_type(self::POST_TYPE,
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