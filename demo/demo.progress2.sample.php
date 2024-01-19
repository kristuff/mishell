<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

// temporary message 
Console::log(' I am a temporary message... I will be erased :(', 'red');

// wait for a while, so we see the animation
sleep(3); 

for ($i=1 ; $i<=100 ; $i++) {

    // progress message
    Console::overwrite(' I am a progress text... ('.Console::text($i.'%', 'green') .' completed)');
    
    // wait for a while, so we see the animation
    usleep(100000); 
}

// Overwrite message again
Console::overwrite(' '.Console::text('Process complete.', 'white', 'green', 'underlined'));

// wait for a while, so we see the animation
usleep(2000000); 

// Overwrite message again
Console::overwrite(' Oh wait, I forgot something...', 'red');

// wait for a while, so we see the animation
usleep(2000000); 

// Overwrite message again
Console::overwrite(' '.Console::text('StandWith', 'yellow', 'blue').Console::text('Ukraine', 'blue', 'yellow'));

// wait for a while, so we see the animation
usleep(2000000); 

// Overwrite message again (last time). 
Console::overwrite(' Process complete', 'green', 'bold');

// new blank line
Console::log();

?>
