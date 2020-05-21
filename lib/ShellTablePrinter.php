<?php

/* 
 *   __  __  _       _            _  _
 *  |  \/  |(_) ___ | |__    ___ | || |
 *  | |\/| || |/ __|| '_ \  / _ \| || |
 *  | |  | || |\__ \| | | ||  __/| || |
 *  |_|  |_||_||___/|_| |_| \___||_||_|
 *
 * This file is part of Kristuff\Mishell.
 * (c) Kristuff <contact@kristuff.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @version    1.1.0
 * @copyright  2017-2020 Kristuff
 */

namespace Kristuff\Mishell;
 
abstract class ShellTablePrinter extends \Kristuff\Mishell\ShellColoredPrinter
{
    /**
     * Align left constant
     *
     * @const int
     */
    const ALIGN_LEFT = STR_PAD_RIGHT;

    /**
     * Align right constant
     *
     * @const int
     */
    const ALIGN_RIGHT = STR_PAD_LEFT;

    /**
     * Align center constant
     *
     * @const int
     */
    const ALIGN_CENTER = STR_PAD_BOTH;

    /**
     * The default horizontal sign. 
     *
     * @access protected
     * @var    string
     */
    protected static $defaultHorizontalSign = '-';

    /**
     * The default vertical sign. 
     *
     * @access protected
     * @var    string
     */
    protected static $defaultVerticalSign = '|';

     /**
     * The default vertical sign. 
     *
     * @access protected
     * @var    string
     */
    protected static $defaultVerticalInnerSign = '+';

    /**
     * The default table cell padding. 
     *
     * @access protected
     * @var    string
     */
    protected static $defaultCellPadding = ' ';

    /**
     * The cell padding. 
     *
     * @access public
     * @var    string
     */
    public static $tableCellPadding    = ' ';

    /**
     * The horizontal separator sign. 
     *
     * @access public
     * @var    string
     */
    public static $horizontalSeparator = '-';

    /**
     * The vertical separator sign. 
     *
     * @access public
     * @var    string
     */
    public static $verticalSeparator   = '|';

   /**
     * The vertical separator sign. 
     *
     * @access public
     * @var    string
     */
    public static $verticalInnerSeparator   = '+';
           
    /**
     * Resets the default options
     *
     * @access public
     * @static method
     *
     * @return void         
     */
    public static function resetDefaults()
    {
        self::$verticalSeparator        = self::$defaultVerticalSign;
        self::$horizontalSeparator      = self::$defaultHorizontalSign;
        self::$tableCellPadding         = self::$defaultCellPadding;
        self::$verticalInnerSeparator   = self::$defaultVerticalInnerSign;
        self::$tableCellPadding         = self::$defaultCellPadding;
    }

    /**
     * Gets a formated table row separator
     *
     * @access public
     * @static method
     * @param  string   [$color]        The text color for the wall row
     * @param  string   [$bgcolor]      The back color for the wall row
     * @param  string   [$option]+...   The text styles for the wall row
     *
     * @return string         
     */
    public static function tableRowSeparator()
    {
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$verticalSeparator ;
        $cellPaddingLenght = strlen(self::$tableCellPadding) *2;
        foreach ($columnsPads as $key => $pad){
            $str .= str_repeat(self::$horizontalSeparator , $pad + $cellPaddingLenght) .self::$verticalInnerSeparator ;
        }

        return self::getCliString(self::$verticalInnerSeparator === '' ? $str : substr($str, 0, strlen($str) -1). self::$verticalSeparator, $args);
    }

     /**
     * Gets a formated table row separator
     *
     * @access public
     * @static method
     * @param  string   [$color]        The text color for the wall row
     * @param  string   [$bgcolor]      The back color for the wall row
     * @param  string   [$option]+...   The text styles for the wall row
     *
     * @return string         
     */
    public static function tableSeparator()
    {
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$verticalSeparator ;
        $cellPaddingLenght = strlen(self::$tableCellPadding) *2;
        foreach ($columnsPads as $key => $pad){
            $str .= str_repeat(self::$horizontalSeparator , $pad + $cellPaddingLenght) .self::$horizontalSeparator;
        }
        return self::getCliString(substr($str, 0, strlen($str) -1). self::$verticalSeparator, $args);
    }

    /**
     * Gets a formated table blank row 
     *
     * @access public
     * @static method
     * @param  string   [$color]        The text color for the wall row
     * @param  string   [$bgcolor]      The back color for the wall row
     * @param  string   [$option]+...   The text styles for the wall row
     *
     * @return string         
     */
    public static function tableRowEmpty()
    {
        // get and parse arguments:
        //  - extract first argument (columns list)
        //  - keep following arguments (if exist) as styles
        $args = func_get_args();
        $columnsPads = !empty($args) ? $args[0] : [];
        array_shift($args);

        $str = self::$verticalSeparator ;
        foreach ($columnsPads as $pad){
            $str .= self::$tableCellPadding. 
                    str_pad(' ', $pad).
                    self::$tableCellPadding. 
                    self::$verticalSeparator ;
        }
        return self::getCliString($str, $args);
    }

    /**
     * Return a table row start.  
     *
     * @access public
     * @static method
     *
     * @return void         
     */
    public static function tableRowStart()
    {
        return self::$verticalSeparator;
    }

    /**
     * Return a table cell string.
     *
     * @access public
     * @static method
     * @param  string   $column         The column text. 
     * @param  int      $lenght         The column length. Default is 0 (no pad)
     * @param  int      $align          The column alignement (Console::ALIGN_LEFT, Console::ALIGN_RIGHT or Console::ALIGN_CENTER). Default is Console::ALIGN_LEFT.
     *
     * @return string          
     */
    public static function tableRowCell($column, $length = 0, $align = self::ALIGN_LEFT)
    {
        return  self::$tableCellPadding. 
                self::pad($column, $length, ' ', $align).
                self::$tableCellPadding. 
                self::$verticalSeparator;
    }

    /**
     * Return a table row string.
     *
     * @access public
     * @static method
     * @param  array    $columns        The columns arrays. 
     * @param  string   [$color]        The text color for the wall row
     * @param  string   [$bgcolor]      The back color for the wall row
     * @param  string   [$option]+...   The text styles for the wall row
     *
     * @return string          
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
        $str = self::$verticalSeparator;

        // add columns        
        foreach ($columns as $column => $pad){
            $str .= self::$tableCellPadding. 
                    self::pad($column, $pad).
                    self::$tableCellPadding.
                    self::$verticalSeparator;
        }

        // format full row
        return self::getCliString($str, $args) ; 
    }
}