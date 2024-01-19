<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

Console::log();
Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log("  - Use " . Console::text("Console::relog()", 'lightblue', 'underlined') . " to write temporary output to be overwritten later.", 'white');
Console::log();

Console::log(' '. Console::text('Tips:', 'underlined', 'bold'));
Console::log("   - you may need to use " . Console::text("php str_pad()", 'lightblue', 'underlined') . " method to be sure all previous text is overwritten.");
Console::log("   - You can customize colors (foreground and background) and some styles in same way than ");
Console::log('     with ' . Console::text("Console::text()", 'lightblue', 'underlined') . 
                 ' and ' .  Console::text("Console::log()", 'lightblue', 'underlined'). ' methods.');
Console::log();
Console::log(' '. Console::text('Sample code:', 'underlined', 'bold'));
Console::log();
Console::log('    '.Console::text(str_pad('// fake progress loop ', 100),'green'));
Console::log('    '.Console::text(str_pad('for ($i=0 ; $i<=10 ; $i++) {', 100), 'lightgray'));
Console::log('    '.Console::text(str_pad('    // Overwrite progress message.',  100), 'green'));
Console::log('    '.Console::text(str_pad("    Console::relog(' I am a progress text... ['.Console::text($\i, 'green') .']% completed');",  100),'lightgray'));
Console::log('    '.Console::text(str_pad("    // wait for a while, so we see the animation ", 100), 'green'));
Console::log('    '.Console::text(str_pad('    usleep(300000);', 100), 'lightgray'));
Console::log('    '.Console::text(str_pad('}', 100), 'lightgray'));
Console::log('    '.Console::text(str_pad('', 100), 'lightgray'));
Console::log('    '.Console::text(str_pad("// Overwrite progress message. ", 100), 'green'));
Console::log('    '.Console::text(str_pad("// note: we can customize colors and some styles like with Console::text() and ", 100), 'green'));
Console::log('    '.Console::text(str_pad("// Console::log() methods.", 100), 'green'));
Console::log('    '.Console::text(str_pad("Console::relog('Done!! but you should still wait for a while...', 'blue', 'red', 'underlined');", 100), 'lightgray'));
Console::log('    '.Console::text(str_pad('', 100), 'lightgray'));
Console::log('    '.Console::text(str_pad("// wait for a while, so we see the animation ", 100), 'green'));
Console::log('    '.Console::text(str_pad('usleep(2000000);', 100), 'lightgray'));
Console::log('    '.Console::text(str_pad('', 100), 'lightgray'));
Console::log('    '.Console::text(str_pad("// Overwrite progress message. ", 100), 'green'));
Console::log('    '.Console::text(str_pad("// note: you may need to use str_pad() method to be sure all previous text is overwritten", 100), 'green'));
Console::log('    '.Console::text(str_pad("Console::relog(Console::text('Done!', 'white', 'green', 'underlined'). str_pad(' ', 100);", 100), 'lightgray'));
Console::log();
Console::log(' ' .'    '.Console::text('Sample result:', 'underlined', 'bold'));
// -----------------
// sample start here
// -----------------

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
Console::relog(' -- wOopssssssss!!  something was wrong?!%?!!?   Wait a moment.... --', 'red', 'yellow');  

// wait for a while, so we see the animation
usleep(2000000); 

// Overwrite progress message. 
// note: you may need to use str_pad() method to be sure all previous text is overwritten.
Console::relog(Console::text(' Done!', 'white', 'green', 'underlined'). str_pad(' ', 100));
Console::log('');

?>
