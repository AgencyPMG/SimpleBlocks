<?php
namespace PMG\SimpleBlocks;

!defined('ABSPATH') && exit;

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

?>
