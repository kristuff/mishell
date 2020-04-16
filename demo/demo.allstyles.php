<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

$rowHeaders1 = ['Background' => 15, 'Colors' => 15, 'Style(s)' => 45, 'Output' => 50];

$headers = ['Background' => 15];
foreach (Console::getStyles()['backgrounds'] as $color => $colorValue ){
        $headers[] = [$color => 20];
}


Console::log('  '.Console::tableRowSeparator($headers));
Console::log();
Console::log();


$headerStyles = [' ' => 31, 
             'none' => 6, 
             'bold' => 6, 
             'underline' => 12, 
             'blink' => 7, 
             'reverse' => 10,
             ' ' => 50 
             ];

Console::log('  '.Console::tableRowSeparator($rowHeaders1));
Console::log('  '.Console::tableRow($rowHeaders1));
Console::log('  '.Console::tableRow($headerStyles));
Console::log('  '.Console::tableRowSeparator($headerStyles));

foreach (Console::getStyles()['backgrounds'] as $color => $colorValue ){
        
}



foreach (Console::getStyles()['backgrounds'] as $color => $colorValue ){
    Console::log('  '.Console::tableRow([
       ' ' . $i     => 7,
        $color        => 15, 
       "\\033[" . $colorValue  .'m'  => 15, 
        Console::text(str_pad('I am a text color={normal} bgcolor={' . $color .'}', 48),  'normal', $color) => 50
    ]));
    Console::log('  '.Console::tableEmptyRow();
     $i++;
}
Console::log('  '.Console::tableRowEmpty($rowHeaders1));
Console::log('  '.Console::tableRowSeparator($rowHeaders1));
