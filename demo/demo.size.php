<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use " .  Console::text("int Console::getLines()", 'blue', 'white') . " get the number of lines in terminal.");
Console::log("  - Use " .  Console::text("int Console::getColumns()", 'blue', 'white') . " get the number of columns in terminal.");
Console::log('');
Console::log('');
Console::log('Sample:', 'underline', 'bold');
Console::log('');

// get columns and lines 
$lines = Console::getLines();
$cols  = Console::getColumns();

// print value
Console::log('The number of lines is currently: ' .Console::text($lines, 'green'));
Console::log('The number of columns is currently: ' .Console::text($cols, 'green'));
Console::log('');

// build a 'full' row
Console::log(Console::pad('I have exactly the length of your terminal.', $cols), 'white', 'yellow');
