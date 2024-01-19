<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;


Console::log(' '. Console::text('Overview:', 'underlined', 'bold'));
Console::log(' '. Console::text('- Using ','white').Console::text("Console::overwrite()", 'lightblue', 'underlined').Console::text('you can overwrite more than one row.', 'white'));
Console::log(' '. Console::text('To overwrite the 2 last printed rows, you need to pass an array of 2 ','white').Console::text("string", 'lightblue', '').' '. Console::text('.', 'white'));
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
Console::log("      Console::log('I am another real log line, with \\n, but I will be erased');");
Console::log("      Console::overwrite('I am new real line.');");
Console::log();
Console::log(' ' .Console::text('Sample code:', 'underlined', 'bold'));
Console::log();
// -----------------
// sample start here
// -----------------

$msg1 = Console::text(' [*]', 'blue'). Console::text(' Tortoise vs Hare Race will starting. Place your bets! ...', 'white');
$msg2 = Console::text('      [*]', 'blue').Console::text(' 🐢 ', 'lightgreen').Console::text('Tortoise progress ... ', 'white');
$msg3 = Console::text('      [*]', 'blue').Console::text(' 🐇 ', 'white').Console::text('Hare progress ...     ', 'white');

Console::log($msg1);
Console::log();
Console::log($msg2);
Console::log();
Console::log($msg3);
Console::log();

// wait for a momment, so we see the animation
sleep(3); 

$harePurcent    = 0;
$tortPurcent    = 0;
$hareColor      = 'green';
$tortoiseColor  = 'red';
$totalLines     = Console::getLines();

for ($i=1 ; $i<=100 ; $i++) {

    // Added by Tortoise1337
    // Optimization seems legit
    $isOdd = ($i % 2 == 0);
    if ($i < 75 ){
        $isOdd && $tortPurcent++;
    } else {
        $tortPurcent = min($tortPurcent + 3, 100);
    }

    $harePurcent++;
    $loserColor = ($i== 100) ?  'red' : 'yellow';
    $tortColor  = $tortPurcent >= $harePurcent ? 'green' : $loserColor;
    $hareColor  = $tortPurcent <  $harePurcent ? 'green' : $loserColor;
    $msg1       = $i==100 ?  
        Console::text(' [*]', 'blue').Console::text(' Tortoise vs Hare Race - Final Results', 'white') : 
        Console::text(' [*]', 'blue').Console::text(' Tortoise vs Hare Race: ', 'white').Console::text(' RUNNING ', 'white', 'yellow'). '                                    '  ;
    $msg2 = Console::text('      [*]', $i==100 ? $tortColor : 'blue').Console::text(' 🐢 ', 'lightgreen').Console::text('Tortoise progress: ', 'white').Console::progressBar($tortPurcent, $tortColor, $tortColor,'darkgray', 60, ' ');
    $msg3 = Console::text('      [*]', $i==100 ? $hareColor : 'blue').Console::text(' 🐇 ', 'white').     Console::text('Hare progress:     ', 'white').Console::progressBar($harePurcent, $hareColor, $hareColor,'darkgray', 60, ' ');
    $msg2End = $tortPurcent == 100 ? Console::text(' 🏆 WINNER!!!', 'green') : '';
    
    Console::overwrite([$msg1,' ', $msg2.$msg2End,' ', $msg3, ' ']);

    // wait a moment, so we see the animation
    usleep(90000); 
}





?>
