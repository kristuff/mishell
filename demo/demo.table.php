<?php

require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Basic sample', 'white', 'magenta');
Console::log();

$rowHeaders = ['Index' => 10, 'Item'  => 25, 'Description' => 50];
$rows = [
    ['foo',        'some text for foo'],
    ['bar',       'some text for bar'],
    ['foobar',    'some text for foobar']
];
Console::log(Console::tableSeparator($rowHeaders));
Console::log(Console::tableRow($rowHeaders));
Console::log(Console::tableRowSeparator($rowHeaders));

foreach ($rows as $key => $value){
    Console::log(Console::tableRow([
        $key            => 10, 
        $rows[$key][0]  => 25, 
        $rows[$key][1]  => 50
    ]));
}
Console::log(Console::tableSeparator($rowHeaders));

Console::log();
Console::log();



// -------------------------------
// ------ ADVANCED SAMPLE --------
// -------------------------------
Console::log('Advanced sample', 'white', 'magenta');
Console::log();

$rowHeaders = [
    Console::text('Index', 'blue')                  => 10, 
    Console::text('Item', 'white', 'underline')     => 25, 
    Console::text('Description', 'white')           => 50
];
$rows = [
    [
        Console::text('foo (on right)',   'white'),     
        Console::text('some centered text red for foo', 'red')
    ],
    [
        Console::text('bar (on right)',   'white'),     
        Console::text( 'some centered text gray for bar', 'gray')
    ],
    [
        Console::text('foobar (on right)', 'white'),    
        'some centered text ' .Console::text('on BLUE here', 'white', 'blue'). ' for foobar' 
    ]
];



//Console::$verticalSeparator         = '!'; // change the vertical separator
//Console::$verticalInnerSeparator    = '!'; // change the vertical inner separator
//Console::$horizontalSeparator       = '_'; // change the horizontal separator

Console::$tableCellPadding = '  '; // increase cell padding to 2 white chars (default is 1)

// table start
Console::log(Console::tableSeparator($rowHeaders));    // top line             |-----------------------  ...
Console::log(Console::tableRow($rowHeaders));          // columns headers      | foo     | bar     |---  ...
Console::log(Console::tableRowSeparator($rowHeaders)); // saparator            |---------|---------|---  ...
Console::log(Console::tableRowEmpty($rowHeaders));     // empty row            |         |         |     ...

// tables rows
foreach ($rows as $key => $value){

    Console::log(
        Console::TableRowStart().    // start row with separator. Then, each cell will end with a separator 
        Console::TableRowCell($key, 10).                                   //no align => default is left
        Console::TableRowCell($rows[$key][0] , 25, Console::ALIGN_RIGHT).  //set align right
        Console::TableRowCell($rows[$key][1] , 50, Console::ALIGN_CENTER)  //set align center
    );
}

// table end
Console::log(Console::tableRowEmpty($rowHeaders));     // empty row            |         |         |     ...
Console::log(Console::tableSeparator($rowHeaders)); // saparator               |-----------------------  ...

