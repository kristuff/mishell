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

abstract class ShellPrinter 
{
    /**
     * EOF constant
     *
     * @access protected
     * @static var
     * @var    string
     */
    protected static $EOF = "\n";
    
    /**
     * Get whether the current platform is Windows or not.
     *
     * @access protected
     * @static
     *
     * @return bool
     */
    protected static function isWin()
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }

    /**
     * Get the number of columns in terminal
     *
     * @access public
     * @static
     *
     * @return int
     */
    public static function getColumns(): int 
    {
        if (!self::isWin() ){
            return (int) shell_exec('tput cols');
        }

        return -1;
    }

    /**
     * Get the number of lines in terminal
     *
     * @access public
     * @static
     *
     * @return int
     */
    public static function getLines() 
    {
        if (!self::isWin() ){
            return (int) shell_exec('tput lines');
        }
    }

    /**
     * Switch to new window
     *
     * @access public
     * @static
     *
     * @return void
     */
    public static function newWindow() 
    {
        if (!self::isWin() ){
            system('tput smcup');
            self::clear();
        }
    }

    /**
     * Restore primary window
     *
     * @access public
     * @static
     *
     * @return void
     */
    public static function restoreWindow() 
    {
        if (!self::isWin() ){
            system('tput rmcup');
        }
    }

    /**
     * Hide user input in console
     *
     * @access public
     * @static
     *
     * @return void
     */
    public static function hideInput()
    {
        if (!self::isWin() ){
            system('stty -echo');
        }
    }
 
    /**
     * Restore user input in console
     *
     * @access public
     * @static
     *
     * @return void
     */
    public static function restoreInput()
    {
        if (!self::isWin()){
            system('stty echo');
        }
    }

    /**
     * Clear the console
     *
     * @access public
     * @static
     *
     * @return void
     */
    public static function clear() 
    {
        // use 'cls' for Windows users or 'clear' for Linux users :
        system(self::isWin() ? 'cls' : 'clear');
    }
}