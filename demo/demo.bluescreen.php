<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

// *open* new window
Console::newWindow();

// get columns / lines and calculate middle
$lines = Console::getLines();
$cols = Console::getColumns();
$middle = round($lines/2);

for ($i= 1; $i <= $lines ; $i++){

    switch($i){
        case $middle -10:   Console::log(Console::pad("                                /", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -9:    Console::log(Console::pad("                               /", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -8:    Console::log(Console::pad("                              /", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -7:    Console::log(Console::pad("                             |   o", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -6:    Console::log(Console::pad("                             |", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -5:    Console::log(Console::pad("                             |   o", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -4:    Console::log(Console::pad("                              \\", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -3:    Console::log(Console::pad("                               \\", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle -2:    Console::log(Console::pad("                                \\", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle +1:    Console::log(Console::pad("                             Houston, we've had a problem...", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle +2:    Console::log(Console::pad("                             The screen is blue. The screen is blue. The screen is blue. The screen is blue. The screen is blue. ", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $middle +3:    Console::log(Console::pad("                             The screen is blue. The screen is blue. The screen is blue. The screen is blue. The screen is blue. ", $cols, ' ', STR_PAD_RIGHT), 'white', 'blue'); break;
        case $lines:        Console::askInt(Console::pad('Press something to stop damage your eyes >   ', $cols, ' ', STR_PAD_LEFT), 'white', 'blue'); break;
        default:            Console::log(Console::pad(' ', $cols), 'white', 'blue');
    }
}

// restore window
Console::restoreWindow();

?>
