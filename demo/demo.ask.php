<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log(' '. Console::text("  - Use ") . Console::text("string ", 'blue'). Console::text("Console::ask()", 'lightblue', 'underlined') . " to ask something to user in the console.");
Console::log();
Console::log(' '. Console::text('Tips:', 'underlined', 'bold'));
Console::log("   - You can customize colors (foreground and background) and some styles in same way than ");
Console::log('     with ' . Console::text("Console::text()", 'lightblue', 'underlined') . 
                 ' and ' .  Console::text("Console::log()", 'lightblue', 'underlined'). ' methods.');
Console::log();
Console::log(' '. Console::text('Usage:', 'underlined', 'bold'));
Console::log('   '. Console::text("\$value = Console::ask('Please enter something > ');", 'lightmagenta'));
Console::log('   '. Console::text("// or", 'green'));
Console::log('   '. Console::text("\$value = Console::ask('Please enter something > ', 'white', 'blue);", 'lightmagenta'));
Console::log();

// -----------------
// sample start here
// -----------------
$value = Console::ask('Please enter something > ');
Console::log('=> the value you entered is [' . Console::text($value, 'lightyellow') . ']');

$value2 = Console::ask('Please enter something > ', 'magenta', 'underlined');
Console::log('=> the value you entered is [' . Console::text($value2, 'lightyellow') . ']');

?>
