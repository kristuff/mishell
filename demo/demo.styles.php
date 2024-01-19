<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

// the row header
$rowHeaders = [ 'Style name' => 15, 'ANSI Code' => 15, 'Sample output' => 50 ];
Console::log('  '.Console::tableRowSeparator($rowHeaders));
Console::log('  '.Console::tableRow($rowHeaders));
Console::log('  '.Console::tableRowSeparator($rowHeaders));

// enum styles
$index = 1;
foreach (Console::getStyles()[ 'options' ] as $option => $value){
    Console::log('  ' .
        Console::tableRow([
            $option   => 15, 
            "\\033[" . $value  .'m'  => 15, 
            Console::text('I am a text style={' . $option .'}', $option) => 50
        ]));
    $index++; 
}
Console::log('  '.Console::tableRowSeparator($rowHeaders));

?>
