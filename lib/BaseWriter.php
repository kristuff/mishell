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

abstract class BaseWriter 
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
     * Switch to new window
     *
     * @access protected
     * @static method
     *
     * @return void
     */
    public  static function newWindow() {
        if (!self::isWin() ){
            system('tput smcup');
            self::clear();
        }
    }

    /**
     * Restore primary window
     *
     * @access protected
     * @static method
     *
     * @return void
     */
    public  static function restoreWindow() {
        if (!self::isWin() ){
            system('tput rmcup');
        }
    }

    /**
     * Hide user input in console
     *
     * @access protected
     * @static method
     *
     * @return void
     */
    protected  static function hideInput() {
        if (!self::isWin() ){
            system('stty -echo');
        }
    }
 
    /**
     * Restore user input in console
     *
     * @access protected
     * @static method
     *
     * @return void
     */
    protected  static function restoreInput() {
        if (!self::isWin()){
            system('stty echo');
        }
    }

    /**
     * Clear the console
     *
     * @access protected
     * @static method
     *
     * @return void
     */
    public static function clear() 
    {
        //use 'cls' for Windows users or 'clear' for Linux users :
        system(self::isWin() ? 'cls' : 'clear');
    }

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

}