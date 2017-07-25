<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('We will open a new window using ' . Console::text('Console::newWindow()', 'blue', 'white') . ' method.');
Console::ask('Press any key to open new window > ');

// *open* new window
Console::newWindow();
Console::log('I am in new window. We will restore the window later using ' .  Console::text('Console::restoreWindow()', 'blue', 'white') . ' method.' );
Console::ask('Press any key to restore >');

// restore new window
Console::restoreWindow();

Console::log('We have no restored the current window using ' . Console::text('Console::restoreWindow()', 'blue', 'white') . ' method');
Console::log('We will reopen a new window using ' . Console::text('Console::newWindow()', 'blue', 'white') . ' method.');
Console::ask('Press any key to open new window > ');

// *open* new window
Console::newWindow();

Console::log('I am in new window. We will restore the window later using ' .  Console::text('Console::restoreWindow()', 'blue', 'white') . ' method.' );
Console::ask('Press any key to restore >');

// restore new window
Console::restoreWindow();
Console::log('We have no restored the current window using ' .  Console::text('Console::restoreWindow()', 'blue', 'white') . ' method. That\'s all.');
