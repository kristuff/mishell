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
 
abstract class ShellTableWriter extends \Kristuff\Mishell\ShellColoredWriter 
{
    const ALIGN_LEFT   = STR_PAD_RIGHT;
    const ALIGN_RIGHT  = STR_PAD_LEFT;
    const ALIGN_CENTER = STR_PAD_BOTH;

    public static $tableHorizontalSeparator                    = '-';
    protected static $_defaultTableHorizontalSeparator         = '-';
    public static $tableVerticalSeparator                 = '|';
    protected static $_defaultTableVerticalSeparator      = '|';
    public static $tableCellPadding                     = ' ';
    protected static $_defaultTableCellPadding          = ' ';
       
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
        self::$tableHorizontalSeparator = self::$_defaultTableHorizontalSeparator;
        self::$tableVerticalSeparator   = self::$_defaultTableVerticalSeparator;
        self::$tableCellPadding         = self::$_defaultTableCellPadding;
    }

    /**
     * Gets a formated table row separator
     *
     * @access public
     * @static method
     *
     * @return void         
     */
    public static function TableRowSeparator()
    {
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$tableVerticalSeparator ;
        $cellPaddingLenght = strlen(self::$tableCellPadding) *2;
        foreach ($columnsPads as $key => $pad){
            $str .= str_repeat(self::$tableHorizontalSeparator, $pad + $cellPaddingLenght) .self::$tableVerticalSeparator ;
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

        $str = self::$tableVerticalSeparator ;
        foreach ($columnsPads as $pad){
            $str .= self::$tableCellPadding. 
                    str_pad(' ', $pad).
                    self::$tableCellPadding. 
                    self::$tableVerticalSeparator ;
        }
        return self::getCliString($str, $args);
    }

    /**
     *
     */
    public static function tableRowStart()
    {
        return self::$tableVerticalSeparator;
    }

    /**
     *
     */
    public static function tableRowCell($column, $length = 0, $align = self::ALIGN_LEFT)
    {
        return  self::$tableCellPadding. 
                self::pad($column, $length, ' ', $align).
                self::$tableCellPadding. 
                self::$tableVerticalSeparator;
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
        $str = self::$tableVerticalSeparator;

        // add columns        
        foreach ($columns as $column => $pad){
            $str .= self::$tableCellPadding. 
                    self::pad($column, $pad).
                    self::$tableCellPadding.
                    self::$tableVerticalSeparator;
        }

        // format full row
        return self::getCliString($str, $args) ; 
    }

}