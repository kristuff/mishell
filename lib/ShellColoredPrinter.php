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
 * @version    1.5.0
 * @copyright  2017-2021 Kristuff
 */

namespace Kristuff\Mishell;

abstract class ShellColoredPrinter extends \Kristuff\Mishell\ShellPrinter 
{
    /**
     * Foreground colors constants
     *
     * @access protected
     * @static
     * @var    array
     */
    protected static $foregroundColors = array(
        'black'        => '30', 
        'red'          => '31', 
        'green'        => '32', 
        'yellow'       => '33',
        'blue'         => '34', 
        'magenta'      => '35', 
        'cyan'         => '36', 
        'lightgray'    => '37', 
        'default'      => '39',   // your default color
        'darkgray'     => '90',
        'lightred'     => '91',
        'lightgreen'   => '92',
        'lightyellow'  => '93',
        'lightblue'    => '94',
        'lightmagenta' => '95',
        'lightcyan'    => '96',
        'white'        => '97',
    );
    
    /**
     * Background colors constants
     *
     * @access protected
     * @static
     * @var    array
     */
    protected static $backgroundColors = array(
        'black'        => '40',   
        'red'          => '41',
        'green'        => '42',   
        'yellow'       => '43',
        'blue'         => '44',   
        'magenta'      => '45',
        'cyan'         => '46',   
        'lightgray'    => '47',
        'default'      => '49',
        'darkgray'     => '100', 
        'lightred'     => '101', 
        'lightgreen'   => '102', 
        'lightyellow'  => '103',
        'lightblue'    => '104', 
        'lightmagenta' => '105', 
        'lightcyan'    => '106', 
        'white'        => '107',
    );
 
    /**
     * Text styles constants
     *
     * @access public
     * @static
     * @var    array
     */
    protected static $options = array(
        'none'         => '0',    // reset all styles
        'bold'         => '1',    // 
        'dim'          => '2',
        'underlined'   => '4',    
        'blink'        => '5', 
        'reverse'      => '7',    // reverse foreground/background color

        //formats=(["bold"]=1 ["bright"]=1 ["dim"]=2 ["underlined"]=4 ["blink"]=5 ["reverse"]=7 ["hidden"]=8)
        //resets=(["all"]=0 ["bold"]=21 ["bright"]=21 ["dim"]=22 ["underlined"]=24 ["blink"]=25 ["reverse"]=27 ["hidden"]=28)
    );
    
    /**
     * Get an array of all available styles
     *
     * @access public
     * @static
     *
     * @return array
     */
    public static function getStyles()
    {
        return [
            'foregrounds'   => self::$foregroundColors,
            'backgrounds'   => self::$backgroundColors,
            'options'       => self::$options
        ];
    }

    /**
     * Internal method dispatcher
     *
     * @access protected
     * @static
     * @param  string   $command                The command name string
     * @param  string   $args                   The command arguments
     *
     * @return mixed|void
     */
    protected static function cmd($command, array $args)
    {
        // ouptut string is always the first argument (in any)
        $str = !empty($args) ? $args[0] : '';

        // others (if any) are options
        array_shift($args);

        // 
        switch($command){

            // ****************************************
            // Get methods (return string)
            // ****************************************

            case'text':
                return self::getCliString($str, $args);             // get formatted text
            
            // ****************************************
            // Print methods (echo and return null)
            // ****************************************
            
            case'print':
                echo (self::getCliString($str, $args));               // print text
                break;
            case'log':
                echo (self::getCliString($str, $args) . self::$EOF );   // print text + newline
                break;
            case'relog':
                echo (self::getCliString($str ."\r", $args));         // overwrite current line 
                break;

            // *****************************************
            // Print+Question methods (return something)
            // *****************************************

            case'ask':
                echo (self::getCliString($str, $args));     // print question
                return trim(fgets(STDIN));                  // reads and return one line from STDIN 
           
            case'askPassword':
                self::hideInput();                          // hide 
                echo (self::getCliString($str, $args));     // print question
                $line= trim(fgets(STDIN));                  // reads one line from STDIN 
                self::restoreInput();                       // restore 
                return $line;                               // return line
                
            case 'askInt':
                echo (self::getCliString($str, $args));     // print question
                fscanf(STDIN, "%d\n", $number);             // reads number from STDIN
                return (is_int($number) ? $number : false); // return int value or false
        }

        // nothing found
        return null;
    }
      
    /**
     * Get a formatted cli string to output in the console
     *
     * @access protected
     * @static
     * @param  string   $str                    The text to output
     * @param  string   $arguments              The command arguments
     *
     * @return mixed|void
     */
    protected static function getCliString(string $str, array $arguments = [])
    {
        if (empty($arguments)){
            return $str;
        }

        $coloredString = "";
        $hasColor = false;
        $hasBackColor = false;
        $cliArgs = [];
        
        // parse arguments
        foreach ($arguments as $argument) {
            
            // it's a color?
            if(!$hasColor && isset(self::$foregroundColors[$argument])){
                $cliArgs[] = self::$foregroundColors[$argument];
                $hasColor = true;

            // it's a backcolor?
            } elseif ($hasColor && !$hasBackColor && isset(self::$backgroundColors[$argument])){
                $cliArgs[] = self::$backgroundColors[$argument];
                $hasBackColor = true;

            // or it's an option?
            } elseif (isset(self::$options[$argument])){
                $cliArgs[] = self::$options[$argument];
            }
        }

        // Add string and end coloring
        // todo \e[0m 
        $coloredString .= "\033[" . implode(';',$cliArgs) .'m';
        $coloredString .=  $str . "\033[0m";
        return $coloredString;
    }

    /**
     * Get a formatted string to be returned in console.
     *
     * @access public
     * @static
     * @param  string   [$str]                  The string to output
     * @param  string   [$color]                The text color for the wall line
     * @param  string   [$bgcolor]              The back color for the wall line
     * @param  string   [$option]+...           The text styles for the wall line
     *
     * @return string
     */
    public static function text()
    {
        return self::cmd('text', func_get_args());
    }

    /**
     * Print a formatted string in console.
     *
     * @access public
     * @static
     * @param  string   [$str]                  The string to print
     * @param  string   [$color]                The text color for the wall line
     * @param  string   [$bgcolor]              The back color for the wall line
     * @param  string   [$option]+...           The text styles for the wall line
     *
     * @return void
     */
    public static function print()
    {
        return self::cmd('write', func_get_args());
    }

    /**
     * Prints a formatted string in the console then waits for a user input.
     *
     * @access public
     * @static
     * @param  string   [$str]                  The string to print
     * @param  string   [$color]                The text color for the wall line
     * @param  string   [$bgcolor]              The back color for the wall line
     * @param  string   [$option]+...           The text styles for the wall line
     *
     * @return string|null
     */
    public static function ask()
    {
        return self::cmd('ask', func_get_args());
    }

    /**
     * Print a formatted string in the console and wait for an integer input.
     *
     * @access public
     * @static
     * @param  string   [$str]                  The string to print
     * @param  string   [$color]                The text color for the wall line
     * @param  string   [$bgcolor]              The back color for the wall line
     * @param  string   [$option]+...           The text styles for the wall line
     *
     * @return int|bool 
     */
    public static function askInt()
    {
        return self::cmd('askInt', func_get_args());
    }

    /**
     * Prints a formatted string in the console then waits for a user input (returns but does not displays that user's input).
     *
     * @param  string   [$str]                  The string to print
     * @param  string   [$color]                The text color for the wall line
     * @param  string   [$bgcolor]              The back color for the wall line
     * @param  string   [$option]+...           The text styles for the wall line
     *
     * @return string|null
     */
    public static function askPassword()
    {
        return self::cmd('askPassword',func_get_args());
    }

    /**
     * Print a string to console and go to new line
     *
     * @access public
     * @static
     * @param  string   [$str]                  The string to print
     * @param  string   [$color]                The text color for the wall line
     * @param  string   [$bgcolor]              The back color for the wall line
     * @param  string   [$option]+...           The text styles for the wall line
     *
     * @return void
     */
    public static function log()
    {
        self::cmd('log',func_get_args());
    }

    /**
     * Overwrite the current line in console.
     *
     * @access public
     * @static
     * @param  string   [$str]                  The string to print
     * @param  string   [$color]                The text color for the wall line
     * @param  string   [$bgcolor]              The back color for the wall line
     * @param  string   [$option]+...           The text styles for the wall line
     *
     * @return void
     */
    public static function relog()
    {
        self::cmd('relog',func_get_args());
    }  
       
    /**
     * A cli version of str_pad() that takes care of not printable ANSI chars
     *
     * @access protected
     * @static
     * @param  string   $input                  The input text
     * @param  int      $padLenght              The pad length. Default is 0 (no pad)
     * @param  string   $padString              The pad string. Default is blank char.
     * @param  int      $padType                The pad type (STR_PAD_LEFT, STR_PAD_RIGHT or STR_PAD_BOTH). Default is STR_PAD_RIGHT.
     *
     * @return mixed|void
     */    
    public static function pad($input, $padLength, $padString = ' ', $padType = STR_PAD_RIGHT)
    {
        $diff = $padLength - mb_strlen(preg_replace('#\\033\[[[0-9;*]{1,}m#', '', $input));
        
        if ($diff > 0){
            switch ($padType){
                
                case STR_PAD_RIGHT:
                    return $input . str_repeat($padString, $diff);
                
                case STR_PAD_LEFT:
                    return str_repeat($padString, $diff ) . $input;
                
                case STR_PAD_BOTH:
                    $padLeft = round(($diff)/2);
                    return str_repeat($padString, $padLeft) . $input . str_repeat($padString, $diff - $padLeft);
            }
        }
        return $input;
    }
    
}