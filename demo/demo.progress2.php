<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log();
Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log("  - Use " . Console::text("Console::overwrite()", 'lightblue', 'underlined') . " to overwrite the last printed line.", 'white');
Console::log();

Console::log(' '. Console::text('Tips:', 'underlined', 'bold'));
Console::log("   - " . Console::text('No need', 'underlined', 'bold') ." to use " . Console::text("php str_pad()", 'lightblue', 'underlined') . " method like with " .Console::text("Console::relog()", 'lightblue', 'underlined') );
Console::log("   - You can customize colors (foreground and background) and some styles in same way than ");
Console::log('   ' .Console::text("Console::text()", 'lightblue', 'underlined') . 
                 ' and ' .  Console::text("Console::log()", 'lightblue', 'underlined'). ' methods.');
Console::log();
Console::log(' '. Console::text('Basic usage:', 'underlined', 'bold'));
Console::log();
Console::log("      Console::log('I am a real log line, with \\n, but I will be erased');");
Console::log("      Console::overwrite('I am new real line.');");
Console::log();
Console::log(' ' .Console::text('Sample code:', 'underlined', 'bold'));
Console::log();

?>
