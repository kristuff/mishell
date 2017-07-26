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
    protected static $TABLE_ROW_SEPARATOR = '-';
    protected static $TABLE_COLUMN_SEPARATOR = '|';

    const ALIGN_LEFT   = STR_PAD_RIGHT;
    const ALIGN_RIGHT  = STR_PAD_LEFT;
    const ALIGN_CENTER = STR_PAD_BOTH;

    public static $tableRowSeparator = '-';
    public static $tableColumnSeparator = '|';
    public static $tablePadding = '';
    public static $tableCellPadding = ' ';

    /**
     * Plays a bell sound in console (if available)
     *
     * @access public
     * @static method
     *
     * @return void         
     */
    public static function bell() {
        echo "\007";
    }
    
    /**
     * Resets the default table options
     *
     * @access public
     * @static method
     *
     * @return void         
     */
    public static function tableResetDefaults()
    {
        self::$tableRowSeparator = self::$TABLE_ROW_SEPARATOR;
        self::$tableColumnSeparator = self::$TABLE_COLUMN_SEPARATOR;
    }

    /**
     * Gets a formated table row separator
     *
     * @access public
     * @static method
     *
     * @return void         
     */
    public static function tableRowSeparator()
    {
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$tableColumnSeparator ;
        $cellPaddingLenght = strlen(self::$tableCellPadding) *2;
        foreach ($columnsPads as $key => $pad){
            $str .= str_repeat(self::$tableRowSeparator, $pad + $cellPaddingLenght) .self::$tableColumnSeparator ;
        }
        return self::getCliString($str, $args);
    }

    /**
     *
     */
    public static function tableRowEmpty()
    {
        // get and parse arguments:
        //  - extract first argument (columns list)
        //  - keep following arguments (if exist) as styles
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$tableColumnSeparator ;
        foreach ($columnsPads as $pad){
            $str .= self::$tableCellPadding. 
                    str_pad(' ', $pad).
                    self::$tableCellPadding. 
                    self::$tableColumnSeparator ;
        }
        return self::getCliString($str, $args);
    }

    /**
     *
     */
    public static function tableRowStart()
    {
        return self::$tableColumnSeparator;
    }

    /**
     *
     */
    public static function tableRowCell($column, $length = 0, $align = self::ALIGN_LEFT)
    {
        return  self::$tableCellPadding. 
                self::pad($column, $length, ' ', $align).
                self::$tableCellPadding. 
                self::$tableColumnSeparator;
    }

    /**
     *
     */
    public static function tableRow()
    {
        // get and parse arguments:
        //  - extract first argument (columns list)
        //  - keep following arguments (if exist) as styles
        $args       = func_get_args();
        $columns    = !empty($args) ? $args[0] : [];
        array_shift($args);

        // build the row string
        // start with separator
        $str = self::$tableColumnSeparator;

        // add columns        
        foreach ($columns as $column => $pad){
            $str .= self::$tableCellPadding. 
                    self::pad($column, $pad).
                    self::$tableCellPadding.
                    self::$tableColumnSeparator;
        }

        // format full row
        return self::getCliString($str, $args) ; 
    }

}