<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

$rowHeaders = ['Color name' => 15, ' ANSI Code'  => 15, ' Sample ouput' => 51];
Console::log('  '.Console::tableRowSeparator($rowHeaders));
Console::log('  '.Console::tableRow($rowHeaders));
Console::log('  '.Console::tableRowSeparator($rowHeaders));

// enum backgrounds
$i = 1;
foreach (Console::getStyles()['backgrounds'] as $bgcolor => $colorValue ){
    $foregroundColor = ($bgcolor === 'black' || $bgcolor === 'default') ? 'white': 'black';
    Console::log('  '.Console::tableRow([
        $bgcolor        => 15, 
       "\\033[" . $colorValue  .'m'  => 15, 
        Console::text(str_pad('I am a text color={' . $foregroundColor .'} on bgcolor={' . $bgcolor .'}', 48), $foregroundColor , $bgcolor) => 51
    ]));
    $i++;
}
Console::log('  '.Console::tableRowSeparator($rowHeaders));

?>
