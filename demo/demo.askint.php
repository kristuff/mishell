<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;


Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use " .  Console::text("Console::askInt(\$str [\$styles])", 'blue', 'white') . " to ask user to enter a number in the console.");
Console::log('');
Console::log('Tips:', 'underline', 'bold');
Console::log("  - The method returns Int value or False if the entered value is not a valid int number.", 'lightmagenta');
Console::log("  - You can customize colors (foreground and background) and some styles in same way than with Console::text()", 'lightmagenta');
Console::log("    and Console::log() methods..", 'lightmagenta');
Console::log('');
Console::log('Usage:', 'underline', 'bold');
Console::log('   ' . Console::text(Console::pad("\$value = Console::askInt('Please enter a number > ');", 80), 'blue', 'white')); 
Console::log('   ' . Console::text(Console::pad("if (\$value !== false) {", 80), 'blue', 'white')); 
Console::log('   ' . Console::text(Console::pad(" [...]", 80), 'blue', 'white')); 
Console::log('');
Console::log('Sample:', 'underline', 'bold');

function askNumber()
{
    $value = Console::askInt('Please enter a number > ');
    
    if ($value !== false){
        Console::log('=> The value you entered is [' . Console::text($value, 'yellow') . ']');
    
    } else {
        Console::log(Console::text('Error:', 'red'));
        Console::log(Console::text('=> the value you entered is not a valid index number.', 'red'));
        // retry...
        askNumber();    
    }
}

// ask
askNumber();
