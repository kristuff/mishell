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
 * @version    1.3.0 
 * @copyright  2017-2020 Kristuff
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