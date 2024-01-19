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
declare(ticks = 1);     // Allow posix signal handling

namespace Kristuff\Mishell;
 
class Program 
{
    /**
     * Exit with given exit code 
     *
     * @access public
     * @static 
     * @param bool   $code      The exit code. Default is 0. 1 is generaly set for error.  
     *
     * @return void         
     */
    public static function exit(int $code = 0) {
        exit($code);
    }

    /**
     * helper function to check if a argument is given
     * 
     * @access protected
     * @static
     * @param array     $arguments      The list of arguments     
     * @param string    $shortArg       The short argument to check
     * @param string    $longArg        The long argument to check
     * 
     * @return bool     True if the short or long argument exist in the arguments array, otherwise false
     */
    public static function inArguments(array $arguments, string $shortArg, string $longArg)
    {
          return array_key_exists($shortArg, $arguments) || array_key_exists($longArg, $arguments);
    }

    /**
     * helper function to get the value of an argument
     * 
     *  
     * @access protected
     * @static
     * @param array         $arguments      The list of arguments     
     * @param string        $shortArg       The short argument name to check
     * @param string        $longArg        The long argument name to check
     * 
     * @return string|null   
     * 
     */
    public static function getArgumentValue(array $arguments, string $shortArg, string $longArg):? string
    {
          return array_key_exists($shortArg, $arguments) ? $arguments[$shortArg] : 
                 (array_key_exists($longArg, $arguments) ? $arguments[$longArg]  : null);
    }

}