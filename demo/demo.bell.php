<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log('  - Use ' . Console::text("Console::bell()", 'lightblue', 'underlined') . ' to play a bell sound in console (if available).', 'white');
Console::log();   
Console::log(' '. Console::text('Usage:', 'underlined', 'bold'));
Console::log();   
Console::log('   ' .Console::text('// Play the bell', 'green'));
Console::log('   ' .Console::text('Console::bell();', 'lightmagenta'));
Console::log();   
Console::log(' '. Console::text('Sample:', 'underlined', 'bold'));

// -----------------
// sample start here
// -----------------
Console::bell();
Console::log(' Hey! we just play the bell, did you hear??', 'lightgray');
Console::log();   

?>
