<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log(' Let say we are current window.');
Console::log(' We will open a new window using ' . Console::text('Console::newWindow()', 'lightblue', 'underlined') . ' method.');
Console::ask(' Press [Enter] to open new window > ');

// ------------------
// *open* new window
// ------------------
Console::newWindow();

Console::log();
Console::log(' _____________________________', 'green');
Console::log('                              ', 'green');
Console::log('          NEW WINDOW 1        ', 'green');
Console::log(' _____________________________', 'green');
Console::log();
Console::log(' I am in new window. We will restore the window later using ' .  Console::text('Console::restoreWindow()', 'lightblue', 'underlined') . ' method.' );
Console::ask(' Press [Enter] to restore >');

// ------------------
// restore new window
// ------------------
Console::restoreWindow();

Console::log(' We have now restored the current window using ' . Console::text('Console::restoreWindow()', 'lightblue', 'underlined') . ' method');
Console::log(' We will reopen a new window using ' . Console::text('Console::newWindow()', 'lightblue', 'underlined') . ' method.');
Console::ask(' Press [Enter] to open new window > ');

// ------------------
// *open* new window
// ------------------
Console::newWindow();

Console::log();
Console::log(' _____________________________', 'yellow');
Console::log('                              ', 'yellow');
Console::log('          NEW WINDOW 2        ', 'yellow');
Console::log(' _____________________________', 'yellow');
Console::log();
Console::log(' I am in new window. We will restore the window later using ' .  Console::text('Console::restoreWindow()', 'lightblue', 'underlined') . ' method.' );
Console::ask(' Press [Enter] to restore >');

// ------------------
// restore new window
// ------------------
Console::restoreWindow();
Console::log(' We have now restored the current window using ' .  Console::text('Console::restoreWindow()', 'lightblue', 'underlined') . ' method. That\'s all.');
Console::log(' Got it'. Console::text('?', 'green'));

?>
