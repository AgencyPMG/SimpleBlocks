<?php
class SimpleBlocksShortcode
{
    function __construct()
    {
        add_shortcode(
            'simple_block',
            array($this, 'simpleBlocksShortcodeOutput')
        );     
    }
    
    function simpleBlocksShortcodeOutput($args=array(), $content=null)
    {
        $q = new WP_Query(array(
            'post_type'     => SimpleBlocks::POST_TYPE,
            //'post_type'     => 'sb_posttype',
            'nopaging'      => true,
            'orderby'       => 'menu_order title',
            'order'         => 'ASC',
        ));

        if (!$q->have_posts()) {
            return;
        }

        ob_start();

        echo '<div class="simple_blocks">';
        while ($q->have_posts()) {
            $q->the_post();
            ?>
            <div id="simple-block-<?php the_ID(); ?>" <?php post_class('row'); ?>
                    <h3>
                            <?php the_title(); ?>
                    </h3>
                    <div class="simple-entry">
                        <?php the_content(); ?>
                    </div>
            </div>
            <?php
        }
        echo '</div>';

        wp_reset_query();
        return ob_get_clean();
    }
}
        
?>