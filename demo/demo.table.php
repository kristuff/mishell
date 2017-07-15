<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

require_once __DIR__ .'/index.inc.php';

$rowHeaders = ['Index' => 10, 'Item'  => 25, 'Description' => 50];

$rows = [];
$rows[] = ['foo',       'some text for foo'];
$rows[] = ['bar',       'some text for bar'];
$rows[] = ['foobar',    'some text for foobar'];


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
