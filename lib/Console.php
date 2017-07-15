<?php

/* --------------------------------------
 *             _   ____  _          _ _
 *   _ __ ___ (_) / ___|| |__   ___| | |
 *  | '_ ` _ \| | \___ \| '_ \ / _ \ | |
 *  | | | | | | |  ___) | | | |  __/ | |
 *  |_| |_| |_|_| |____/|_| |_|\___|_|_|
 *
 * --------------------------------------
 *
 * This file is part of Kristuff\Mishell.
 * (c) Kristuff <contact@kristuff.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @version    0.1.0
 * @copyright  2017 Kristuff
 */

namespace Kristuff\Mishell;

 
class Console extends \Kristuff\Mishell\ColoredWriter 
{

   
    public static $tableRowSeparator = '-';
    public static $tableColumnSeparator = '|';

    /**
     * Plays a bell sound in console (if available)
     *
     * @return void         
     */
    public static function bell() {
        echo "\007";
    }
    
    /**
     *
     */
    public static function tableResetDefaults()
    {
        self::$tableRowSeparator = '-';
        self::$tableColumnSeparator = '|';
    }


    /**
     *
     */
    public static function tableRowHeader()
    {
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$tableColumnSeparator ;
        foreach ($columnsPads as $key => $pad){
            $str .= str_repeat(self::$tableRowSeparator , $pad) .self::$tableColumnSeparator ;
        }
        return self::getCliString($str, $args);
    }

    public static function tableRowEmpty()
    {
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$tableColumnSeparator ;
        foreach ($columnsPads as $pad){
            $str .= str_pad(' ', $pad) .self::$tableColumnSeparator ;
        }
        return self::getCliString($str, $args);
    }
    /**
     *
     */
    public static function tableRow()
    {
        $args = func_get_args();
        $columns = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$tableColumnSeparator ;
        foreach ($columns as $column => $pad){
            $str .= str_pad(' '. $column .' ', $pad) .self::$tableColumnSeparator ;
        }
        return self::getCliString($str, $args) ; 
    }
}