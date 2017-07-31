<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log();
Console::log(Console::text('_____________________________', 'white', 'bold'));
Console::log(Console::text('                             ', 'white', 'magenta', 'bold'));
Console::log(Console::text('         CURRENT             ', 'white', 'magenta', 'bold'));
Console::log(Console::text('_____________________________', 'white', 'magenta', 'bold'));
Console::log();


Console::log('Let say we are current window.');
Console::log('We will open a new window using ' . Console::text('Console::newWindow()', 'blue', 'white') . ' method.');
Console::ask('Press [Enter] to open new window > ');

// *open* new window
Console::newWindow();

Console::log();
Console::log(Console::text('_____________________________', 'white', 'bold'));
Console::log(Console::text('                             ', 'white', 'green', 'bold'));
Console::log(Console::text('         NEW WINDOW 1        ', 'white', 'green', 'bold'));
Console::log(Console::text('_____________________________', 'white', 'green', 'bold'));
Console::log();


Console::log('I am in new window. We will restore the window later using ' .  Console::text('Console::restoreWindow()', 'blue', 'white') . ' method.' );
Console::ask('Press [Enter] to restore >');

// restore new window
Console::restoreWindow();

Console::log('We have now restored the current window using ' . Console::text('Console::restoreWindow()', 'blue', 'white') . ' method');
Console::log('We will reopen a new window using ' . Console::text('Console::newWindow()', 'blue', 'white') . ' method.');
Console::ask('Press [Enter] to open new window > ');

// *open* new window
Console::newWindow();

Console::log();
Console::log(Console::text('_____________________________', 'white', 'bold'));
Console::log(Console::text('                             ', 'white', 'yellow', 'bold'));
Console::log(Console::text('         NEW WINDOW 2        ', 'white', 'yellow', 'bold'));
Console::log(Console::text('_____________________________', 'white', 'yellow', 'bold'));
Console::log();

Console::log('I am in new window. We will restore the window later using ' .  Console::text('Console::restoreWindow()', 'blue', 'white') . ' method.' );
Console::ask('Press [Enter] to restore >');



// restore new window
Console::restoreWindow();
Console::log('We have now restored the current window using ' .  Console::text('Console::restoreWindow()', 'blue', 'white') . ' method. That\'s all.');
Console::log('Got it'. Console::text('?', 'green'));
