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
 
class Console extends \Kristuff\Mishell\ShellTablePrinter
{
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
}