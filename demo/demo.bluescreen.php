<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

// *open* new window
Console::newWindow();

// get columns / lines and calculate middle
$lines = Console::getLines();
$cols = Console::getColumns();
$middle = round($lines/2);

for ($i= 0; $i <= $lines ; $i++){

    switch($i){
        case $middle -1:
            Console::log(Console::pad(":(   Houston, we've had a problem...", $cols, ' ', STR_PAD_BOTH), 'white', 'blue');
            break;
        case $middle :
            Console::log(Console::pad('an error occurred in my head,', $cols, ' ', STR_PAD_BOTH), 'white', 'blue');
            break;
        case $middle +1:
            Console::log(Console::pad('I really want you to see the blue screen of the death', $cols, ' ', STR_PAD_BOTH), 'white', 'blue');
            break;
        default:
            Console::log(Console::pad(' ', $cols), 'white', 'blue');
    }
}
Console::askInt(Console::pad('Press something to stop damage your eyes >   ', $cols, ' ', STR_PAD_LEFT), 'white', 'blue');

// restore window
Console::restoreWindow();
Console::log('Any resemblance to a lived situation is a pure coincidence.');

?>
