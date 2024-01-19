<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

// headers
$rowHeaders = ['#Num' => 7, 'Color name' => 15, ' ANSI Code'  => 15, ' Sample output' => 50];
Console::log('  '.Console::tableRowSeparator($rowHeaders));
Console::log('  '.Console::tableRow($rowHeaders));
Console::log('  '.Console::tableRowSeparator($rowHeaders));

// loop into foregrounds
$i = 1;
foreach (Console::getStyles()['foregrounds'] as $color => $colorValue ){
    Console::log('  '.Console::tableRow([
       ' ' . $i     => 7,
        $color        => 15, 
       "\\033[" . $colorValue  .'m'  => 15, 
        Console::text(str_pad('I am a text color={' . $color .'}', 48), $color) => 50
    ]));
    $i++;
}
// close table
Console::log('  '.Console::tableRowSeparator($rowHeaders));

?>
