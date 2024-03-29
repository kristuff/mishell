<?php

/** 
 *        _    _        _ _
 *  _ __ (_)__| |_  ___| | |
 * | '  \| (_-< ' \/ -_) | |
 * |_|_|_|_/__/_||_\___|_|_|
 *
 * This file is part of Kristuff\Mishell.
 * (c) Kr1s7uff For the full copyright and license information, 
 * please view the LICENSE file that was distributed with this 
 * source code.
 *
 * @version    1.6.2
 * @copyright  2017-2024 Kr157uff
 */
namespace Kristuff\Mishell;
 
class TableStyle extends \Kristuff\Mishell\ShellColoredPrinter
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
     * The vertical header separator sign. 
     *
     * @access public
     * @var    string
     */
    public static $verticalHeaderSeparator   = '+';

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
     * @static
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
     * Gets a formatted table row separator
     *
     * @access public
     * @static
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
        $cellPaddingLenght = mb_strlen(self::$tableCellPadding) *2;
        foreach ($columnsPads as $key => $pad){
            $str .= str_repeat(self::$horizontalSeparator , $pad + $cellPaddingLenght) .self::$verticalInnerSeparator;
        }

        return self::getCliString(self::$verticalInnerSeparator === '' ? $str : substr($str, 0, mb_strlen($str) -1). self::$verticalSeparator, $args);
    }

    /**
     * Gets a formatted table row separator
     *
     * @access public
     * @static
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

        $str = self::$verticalHeaderSeparator ;
        $cellPaddingLenght = mb_strlen(self::$tableCellPadding) *2;
        foreach ($columnsPads as $key => $pad){
            $str .= str_repeat(self::$horizontalSeparator , $pad + $cellPaddingLenght) .self::$verticalInnerSeparator ;
        }
        return self::getCliString(self::$verticalInnerSeparator === '' ? $str : substr($str, 0, mb_strlen($str) -1). self::$verticalHeaderSeparator, $args);

    }

    /**
     * Gets a formatted table blank row 
     *
     * @access public
     * @static
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
     * @static
     *
     * @return string
     */
    public static function tableRowStart()
    {
        return self::$verticalSeparator;
    }

    /**
     * Return a table cell string.
     *
     * @access public
     * @static
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
     * @static
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