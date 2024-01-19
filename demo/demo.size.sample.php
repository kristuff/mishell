<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

// get columns and lines 
$lines = Console::getLines();
$cols  = Console::getColumns();

// print value
Console::log('  The number of lines is currently: ' .Console::text($lines, 'green'));
Console::log('  The number of columns is currently: ' .Console::text($cols, 'green'));
Console::log();   

// build a 'full' row
Console::log(Console::pad(' I have exactly the length of your terminal.', $cols), 'white', 'yellow');
Console::log();   

?>
