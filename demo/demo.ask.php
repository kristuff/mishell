<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use " .  Console::text("string Console::ask ( string \$str [, \$styles] )", 'blue', 'white') . "to ask something to user in the console.");
Console::log('');
Console::log('Tips:', 'underline', 'bold');
Console::log("  - you can customize colors (foreground and background) and some styles in same way than with Console::text()", 'lightmagenta');
Console::log("    and Console::log() methods.", 'lightmagenta');
Console::log('');
Console::log('Usage:', 'underline', 'bold');
Console::log('   '. Console::text(Console::pad("\$value1 = Console::ask('Please enter something > ');", 90), 'blue', 'white'));
Console::log('   '. Console::text(Console::pad("// or);", 90), 'green', 'white'));
Console::log('   '. Console::text(Console::pad("\$value2 = Console::ask('Please enter something > ', 'red', 'white', 'underline');", 90), 'blue', 'white'));
Console::log('');

$value = Console::ask('Please enter something > ');
Console::log('=> the value you entered is [' . Console::text($value, 'yellow') . ']');

$value2 = Console::ask('Please enter something > ', 'red', 'white', 'underline');
Console::log('=> the value you entered is [' . Console::text($value2, 'yellow') . ']');