<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

$rowHeaders = ['#Num' => 7, 'Color name' => 15, ' ANSI Code'  => 15, ' Sample ouput' => 50];

Console::log('  '.Console::tableRowSeparator($rowHeaders));
Console::log('  '.Console::tableRow($rowHeaders));
Console::log('  '.Console::tableRowSeparator($rowHeaders));
Console::log('  '.Console::tableRowEmpty($rowHeaders));

$i = 1;
foreach (Console::getStyles()['backgrounds'] as $bgcolor => $colorValue ){
    $foregroundColor = $bgcolor === 'black' ? 'white': 'black';
    Console::log('  '.Console::tableRow([
       ' ' . $i     => 7,
        $bgcolor        => 15, 
       "\\033[" . $colorValue  .'m'  => 15, 
        Console::text(str_pad('I am a text color={' . $foregroundColor .'} on bgcolor={' . $bgcolor .'}', 48), $foregroundColor , $bgcolor) => 50
    ]));
    $i++;
}
Console::log('  '.Console::tableRowEmpty($rowHeaders));
Console::log('  '.Console::tableRowSeparator($rowHeaders));
