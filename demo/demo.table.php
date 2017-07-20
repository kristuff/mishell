<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

require_once __DIR__ .'/index.inc.php';



Console::log('Basic sample', 'white', 'magenta');
Console::log();

$rowHeaders = ['Index' => 10, 'Item'  => 25, 'Description' => 50];
$rows = [
    ['foo',  'some text for foo'],
    ['bar',       'some text for bar'],
    ['foobar',    'some text for foobar']
];
Console::log('  '.Console::tableRowHeader($rowHeaders));
Console::log('  '.Console::tableRow($rowHeaders));
Console::log('  '.Console::tableRowHeader($rowHeaders));

foreach ($rows as $key => $value){
    Console::log('  '.Console::tableRow([
        $key            => 10, 
        $rows[$key][0]  => 25, 
        $rows[$key][1]  => 50
    ]));
}
Console::log('  '.Console::tableRowHeader($rowHeaders));

Console::log();
Console::log();
Console::log('Advanced sample', 'white', 'magenta');
Console::log();

$rowHeaders = [
    Console::text('Index', 'blue') => 10, 
    Console::text('Item', 'white', 'underline')  => 25, 
    Console::text('Description', 'white') => 50
];
$rows = [
    [Console::text('foo',   'white'),     Console::text('some text for foo', 'gray')],
    [Console::text('bar',   'white'),     Console::text( 'some text for bar', 'gray')],
    [Console::text('foobar', 'white'),    Console::text('some text for foobar', 'gray')]
];


Console::log('  '.Console::tableRowHeader($rowHeaders));
Console::log('  '.Console::tableRow($rowHeaders));
Console::log('  '.Console::tableRowHeader($rowHeaders));
Console::log('  '.Console::tableRowEmpty($rowHeaders));

foreach ($rows as $key => $value){
    Console::log('  '.Console::tableRow([
        $key            => 10, 
        $rows[$key][0]  => 25, 
        $rows[$key][1]  => 50
    ]));
}
Console::log('  '.Console::tableRowEmpty($rowHeaders));
Console::log('  '.Console::tableRowHeader($rowHeaders));
