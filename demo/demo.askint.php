<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use Console::askInt('your question') to ask user to enter a number in the console.", 'white');
Console::log('');
Console::log('Tips:', 'underline', 'bold');
Console::log("  - you can customize colors (foreground and background) and some styles in same way than with Console::text()", 'green');
Console::log("    and Console::log() methods.", 'green');
Console::log('');
Console::log('Usage:', 'underline', 'bold');
Console::log('TODO', 'white', 'red');
Console::log('');

$value = Console::askInt('Please enter a number: > ');
if (is_int($value)){
    Console::log('=> The value you entered is [' . Console::text($value, 'yellow') . ']');
} else {
    Console::log($base . Console::text('Error:', 'red'));
    Console::log($base . Console::text('=> the value you entered is not a valid index number.', 'red'));
}
