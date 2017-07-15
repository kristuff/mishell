<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use Console::bell() to play a bell sound in console (if available).", 'white');
Console::log('');

Console::log('Usage:', 'underline', 'bold');
Console::log('');
Console::log('   ' .Console::text(str_pad('// Play the bell', 60), 'red',   'white'));
Console::log('   ' .Console::text(str_pad('Console::bell();', 60), 'black', 'white'));
Console::log('');

Console::log('Sample:', 'underline', 'bold');
Console::bell();
Console::log('Hey! we just play the bell, did you hear??', 'white', 'cyan');
Console::log('');
