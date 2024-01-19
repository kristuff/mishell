<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log("  - Use " . Console::text("string ", 'blue'). Console::text("Console::pad()", 'lightblue', 'underlined') . "to get a text with given padding.");
Console::log("  - The method is equivalent to php " . Console::text("str_pad()", 'lightblue', 'underlined'). " method, except that it handles not printable ANSI chars.");
Console::log();   
Console::log(' '. Console::text('Sample:', 'underlined', 'bold'));

// -----------------
// sample start here
// -----------------
Console::log();     
Console::log(' '. Console::text(' 1) Using ') . Console::text('php str_pad()', 'lightblue', 'underlined')); 
Console::log();     
Console::log(str_pad(' I am normal inside str_pad() {padLength:100, padString:\'*\'}', 100, '*'));
Console::log(str_pad(Console::text(' I am colorized with ::text() inside str_pad() {padLength:100, padString:\'*\'}', 'lightcyan'), 100, '*'));
Console::log();     
Console::log(' '. Console::text(' => you should\'see what you expect. I guess second text has less than 100 chars... ', 'white', 'red')); 
Console::log();     
Console::log();     
Console::log(' '. Console::text(' 2) Using ') . Console::text('Console::pad()', 'lightblue', 'underlined')); 
Console::log();     
Console::log(Console::pad('  I am normal inside ::pad() {padLength:100, padString:\'*\'}', 100, '*'));
Console::log(Console::pad(Console::text('  I am colorized with ::text() inside ::pad() {padLength:100, padString:\'*\'}', 'lightcyan'), 100, '*'));
Console::log();     
Console::log(' '. Console::text(' => should be OK ', 'white', 'green'));

?>
