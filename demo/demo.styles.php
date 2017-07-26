<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;


$rowHeaders = ['#Num' => 7, 'Style name' => 15, ' ANSI Code'  => 15, ' Sample ouput' => 50];

Console::log('  '.Console::tableRowSeparator($rowHeaders));
Console::log('  '.Console::tableRow($rowHeaders));
Console::log('  '.Console::tableRowSeparator($rowHeaders));
Console::log('  '.Console::tableRowEmpty($rowHeaders));

$i = 1;

foreach (Console::getStyles()['options'] as $option => $value){
    Console::log('  '.Console::tableRow([
       ' ' . $i     => 7,
        $option        => 15, 
       "\\033[" . $value  .'m'  => 15, 
        Console::text(str_pad('I am a text style={' . $option .'}', 48), $option) => 50
    ]));
    $i++;
}
Console::log('  '.Console::tableRowEmpty($rowHeaders));
Console::log('  '.Console::tableRowSeparator($rowHeaders));

