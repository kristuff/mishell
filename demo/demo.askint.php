<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log("  - Use " . Console::text("int|bool ", 'blue') . Console::text("Console::askInt()", 'lightblue', 'underlined') . " to ask user to enter a number in the console.");
Console::log();
Console::log(' '. Console::text('Tips:', 'underlined', 'bold'));
Console::log("   - The method returns " . Console::text("int", 'blue') . " value or " .  Console::text("false", 'blue'). " if the entered value is not a valid int number.");
Console::log("   - You can customize colors (foreground and background) and some styles in same way than ");
Console::log('     with ' . Console::text("Console::text()", 'lightblue', 'underlined') . 
                 ' and ' .  Console::text("Console::log()", 'lightblue', 'underlined'). ' methods.');
Console::log();
Console::log(' '. Console::text('Usage:', 'underlined', 'bold'));
Console::log('   ' . Console::text("\$value = Console::askInt('Please enter a number > ');", 'lightmagenta')); 
Console::log('   ' . Console::text("if (\$value !== false) {", 'lightmagenta')); 
Console::log('   ' . Console::text("// Do something with \$value", 'green')); 
Console::log();
Console::log(' '. Console::text('Sample:', 'underlined', 'bold'));

// -----------------
// sample start here
// -----------------
$value = Console::askInt('  Please enter a number > ');
if ($value !== false){
    Console::log('  => The value you entered is [' . Console::text($value, 'yellow') . ']');
} else {
    Console::log(Console::text('  Error:', 'red'));
    Console::log(Console::text('  => the value you entered is not a valid number.', 'red'));
}

?>
