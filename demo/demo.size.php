<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log();   
Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log("  - Use " .  Console::text("int ", 'blue'). Console::text("Console::getLines()", 'lightblue', 'underlined') . " to get the number of lines in terminal.");
Console::log("  - Use " .  Console::text("int ", 'blue'). Console::text("Console::getColumns()", 'lightblue', 'underlined') . " to get the number of columns in terminal.");
Console::log();   
Console::log();   
Console::log(' '. Console::text('Sample:', 'underlined', 'bold'));
Console::log();   

?>
