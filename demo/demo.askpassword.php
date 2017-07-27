<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  Use " .  Console::text("Console::askPassword(\$str [\$styles])", 'blue', 'white') . " to ask user to enter a value and return this value.", 'white');
Console::log('');
Console::log('Tips:', 'underline', 'bold');
Console::log("  - you can customize colors (foreground and background) and some styles in same way than with Console::text()", 'green');
Console::log("    and Console::log() methods.", 'green');
Console::log('');
Console::log('Warning:', 'underline', 'bold');
Console::log("  - User input are not hidden on windows platform (not supported)", 'red', 'yellow');
Console::log('');
Console::log('Usage:', 'underline', 'bold');
Console::log('   ' . Console::text(Console::pad("\$value = Console::askPassword('Please Enter something (We wont display it, for now...)  > ');", 80), 'blue', 'white')); 
Console::log('   ' . Console::text(Console::pad("Console::log();", 80), 'blue', 'white')); 
Console::log('   ' . Console::text(Console::pad("Console::log('=> the value you entered is [' . Console::text(\$value, 'red') . ']');", 80), 'blue', 'white')); 
Console::log('');
Console::log('Sample:', 'underline', 'bold');

$value = Console::askPassword('Please Enter something (We wont display it, for now...)  > ');
Console::log();
Console::log('=> the value you entered is [' . Console::text($value, 'red') . ']');