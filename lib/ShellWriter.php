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
 * @version    1.0.0 * @copyright  2017-2020 Kristuff
 */

namespace Kristuff\Mishell;

abstract class ShellWriter 
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
     * @static method
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
     * @static method
     *
     * @return int
     */
    public static function getColumns() 
    {
        if (!self::isWin() ){
            return (int) shell_exec('tput cols');
        }
    }

    /**
     * Get the number of lines in terminal
     *
     * @access public
     * @static method
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
     * @static method
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
     * @static method
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
     * @static method
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
     * @static method
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
     * @static method
     *
     * @return void
     */
    public static function clear() 
    {
        //use 'cls' for Windows users or 'clear' for Linux users :
        system(self::isWin() ? 'cls' : 'clear');
    }
}