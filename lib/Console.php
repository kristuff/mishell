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

 
class Console extends \Kristuff\Mishell\ShellTableWriter 
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