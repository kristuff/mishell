<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log('  Use ' .   Console::text("string ", 'blue'). Console::text("Console::askPassword()", 'lightblue', 'underlined') . " to ask user to enter a value and return this value.", 'white');
Console::log();
Console::log(' '. Console::text('Tips:', 'underlined', 'bold'));
Console::log("   - You can customize colors (foreground and background) and some styles in same way than ");
Console::log('     with ' . Console::text("Console::text()", 'lightblue', 'underlined') . 
                 ' and ' .  Console::text("Console::log()", 'lightblue', 'underlined'). ' methods.');
Console::log();
Console::log(' '. Console::text('Warning:', 'underlined', 'bold'));
Console::log('    '. Console::text("User input are not hidden on windows platform (not supported)", 'red', 'yellow'));
Console::log();
Console::log(' '. Console::text('Usage:', 'underlined', 'bold'));
Console::log('   ' . Console::text("\$value = Console::askPassword('Please Enter something (We wont display it, for now...)  > ');", 'lightmagenta')); 
Console::log('   ' . Console::text("Console::log();", 'lightmagenta')); 
Console::log('   ' . Console::text("Console::log('=> the value you entered is [' . Console::text(\$value, 'red') . ']');", 'lightmagenta')); 
Console::log();
Console::log(' '. Console::text('Sample:', 'underlined', 'bold'));

// -----------------
// sample start here
// -----------------
$value = Console::askPassword(' Please Enter something (We wont display it, for now... (except on windows)  > ');
Console::log();
Console::log(' => the value you entered is [' . Console::text($value, 'red') . ']');

?>