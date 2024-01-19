<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

// *open* new window
Console::newWindow();

// get columns / lines and calculate middle
$lines  = Console::getLines();
$cols   = Console::getColumns();
$middle = round($lines/2);

for ($i= 1; $i <= $lines ; $i++){
    switch($i){
        case $middle -1:
            Console::log(Console::pad("Slava", $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');
            break;
        case $middle:
            Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');
            break;
        case $middle +1:
            Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');
            break;
        case $middle +2:
            Console::log(Console::pad('Ukraini', $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');
            break;
        case $lines:
            Console::askInt(Console::pad('Press Enter to quit >   ', $cols, ' ', STR_PAD_LEFT), 'blue', 'yellow');
            break;
        default:
            if ($i > $middle) {
                Console::log(Console::pad(' ', $cols), 'blue', 'yellow');
            } else {
                Console::log(Console::pad(' ', $cols), 'yellow', 'blue');
            }
    }
}

// restore previous window
Console::restoreWindow();

?>
