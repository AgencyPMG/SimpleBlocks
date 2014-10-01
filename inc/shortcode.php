<?php
/**
 * This file is part of Simple Blocks and it adds the shortcode
 * functionality and output.
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

abstract class Initalise
{  
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

class Shortcode extends Initalise
{
    function hook()
    {
        add_shortcode(
            'simple_block',
            array($this, 'shortcodeOutput')
        );     
    }
    
    public function shortcodeOutput($args=array(), $content=null)
    {
        $q = new \WP_Query(array(
            'post_type'     => PostType::POST_TYPE,
            //'nopaging'      => false,
            'orderby'       => 'menu_order title',
            'order'         => 'ASC',
            'id'            => 8
        ));

        if (!$q->have_posts()) {
            return;
        }

        ob_start();

        while ($q->have_posts()) {
            $q->the_post();
            echo '<div class="simple_block">';
            ?>
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                    <?php the_content(); ?>
            <?php
            echo '</div>';
        }

        wp_reset_query();
        return ob_get_clean();
    }
}      
?>