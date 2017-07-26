<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use Console::relog('yourText') to overwrite the current line.", 'white');
Console::log('');

Console::log('Tips:', 'underline', 'bold');
Console::log("  - you may need to use php str_pad() method to be sure all previous text is overwitted.", 'green');
Console::log("  - you can customize colors (foreground and background) and some styles in same way than with Console::text()", 'green');
Console::log("    and write-only methods.", 'green');
Console::log('');

Console::log('Sample code:', 'underline', 'bold');
Console::log('');
Console::log('    '.Console::text(str_pad('// fake progress loop ', 100),'red', 'white'));
Console::log('    '.Console::text(str_pad('for ($i=0 ; $i<=10 ; $i++) {', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad('    // Overwrite progress message.',  100), 'red', 'white'));
Console::log('    '.Console::text(str_pad("    Console::relog(' I am a progress text... ['.Console::text($\i, 'green') .']% completed');",  100),'black', 'white'));
Console::log('    '.Console::text(str_pad('', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad("    // wait for a while, so we see the animation ", 100), 'red', 'white'));
Console::log('    '.Console::text(str_pad('     usleep(300000);', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad('}', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad('', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad("// Overwrite progress message. ", 100), 'red', 'white'));
Console::log('    '.Console::text(str_pad("// note: we can customize colors and some styles like with Console::text() and ", 100), 'red', 'white'));
Console::log('    '.Console::text(str_pad("// Console::log() methods.", 100), 'red', 'white'));
Console::log('    '.Console::text(str_pad("Console::relog('Done!! but you should still wait for a while...', 'blue', 'red', 'underline');", 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad('', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad("// wait for a while, so we see the animation ", 100), 'red', 'white'));
Console::log('    '.Console::text(str_pad('usleep(2000000);', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad('', 100), 'black', 'white'));
Console::log('    '.Console::text(str_pad("// Overwrite progress message. ", 100), 'red', 'white'));
Console::log('    '.Console::text(str_pad("// note: you may need to use str_pad() method to be sure all previous text is overwritten", 100), 'red', 'white'));
Console::log('    '.Console::text(str_pad("Console::relog(Console::text('Done!', 'white', 'green', 'underline'). str_pad(' ', 100);", 100), 'black', 'white'));

Console::log('');
Console::log('Sample result:', 'underline', 'bold');

// fake progress message 
for ($i=0 ; $i<=100 ; $i++) {

    // Overwrite progress message. 
    Console::relog(' I am a progress text... ['.Console::text($i, 'green') .']% completed');

    // wait for a while, so we see the animation
    usleep(100000); 
}

// Overwrite progress message. 
// note: we can customize colors and some styles like with Console::text() and 
// Console::log() methods.
Console::relog('-- wOopssssssss!!  something was wrong?!%?!!?   Wait a momemt.... --', 'red', 'yellow');  

// wait for a while, so we see the animation
usleep(2000000); 

// Overwrite progress message. 
// note: you may need to use str_pad() method to be sure all previous text is overwritten.
Console::relog(Console::text('Done!', 'white', 'green', 'underline'). str_pad(' ', 100));
Console::log('');
