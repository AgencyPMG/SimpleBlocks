<?php
/**
 * This file is part of Simple Blocks Plugin and it adds the shortcode
 * functionality and output.
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

namespace PMG\SimpleBlocks;

!defined('ABSPATH') && exit;

class Shortcode extends Setup
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
        $atts = shortcode_atts(array(
            'id' => null
        ), $args);

        $q = new \WP_Query(array(
            'post_type'     => PostType::POST_TYPE,
            'nopaging'      => false,
            'post__in'      => explode(',', $atts['id'])
        ));

        if (!$q->have_posts()) {
            return;
        }

        ob_start();

        while ($q->have_posts()) {
            $q->the_post();
            ?>
            <div class="simple_block">
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
            </div>
            <?php
        }

        wp_reset_query();
        return ob_get_clean();
    }
}
