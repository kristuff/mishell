<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use Console::ask('your question') to ask something to user in the console.", 'white');
Console::log('');
Console::log('Tips:', 'underline', 'bold');
Console::log("  - you can customize colors (foreground and background) and some styles in same way than with Console::text()", 'green');
Console::log("    and Console::log() methods.", 'green');
Console::log('');
Console::log('Usage:', 'underline', 'bold');
Console::log('   '. Console::text("\$value = Console::ask('Please enter something > ');", 'blue', 'white'));
Console::log('   '. Console::text("\$value2 = Console::ask('Please enter something > ', 'blue', 'white', 'underline');", 'blue', 'white'));
Console::log('');

$value = Console::ask('Please enter something > ');
Console::log('=> the value you entered is [' . Console::text($value, 'yellow') . ']');

$value2 = Console::ask('Please enter something > ', 'blue', 'white', 'underline');
Console::log('=> the value you entered is [' . Console::text($value2, 'yellow') . ']');