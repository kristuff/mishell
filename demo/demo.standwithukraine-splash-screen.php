<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

// *open* new window
Console::newWindow();

declare(ticks = 1);                                      // Allow posix signal handling
pcntl_async_signals(true);
pcntl_signal(SIGINT,"shutdown");       
register_shutdown_function("shutdown");                 // Handle END of script

splash();

function shutdown(){
    //     echo "\033c";                                        // Clear terminal
    //     echo PHP_EOL;                                        // New line
    //Console::log();
    //Console::log('SIGINT signal detected, terminate script...');
    //system("tput cnorm && tput cup 0 0 && stty echo");   // Restore cursor default
    usleep(115000);
    Console::restoreWindow();
    exit(0);
}

function splash()
{

    // get columns / lines and calculate middle
    $lines  = Console::getLines();
    $cols   = Console::getColumns();
    $middle = round($lines/2);

    for ($i= 1; $i <= $lines ; $i++){
        switch($i){
            case $middle -1:    Console::log(Console::pad("Stand With Ukraine <3", $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');    break;
            case $middle:       Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');                        break;
            case $middle +1:    Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');                        break;
            case $middle +2:    Console::log(Console::pad('Slava Ukraini', $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');            break;
            case $lines:        Console::print(Console::pad(' Wait a few seconds or hint Ctrl+C', $cols , ' ', STR_PAD_LEFT), 'blue', 'yellow');  break; // no new line here
            default:
                if ($i > $middle) {
                    Console::log(Console::pad(' ', $cols), 'blue', 'yellow');
                } else {
                    Console::log(Console::pad(' ', $cols), 'yellow', 'blue');
                }
        }
    }

    sleep(6);

    // restore previous window
    Console::restoreWindow();

}


?>
