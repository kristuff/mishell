<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

console::resetDefaults();

Console::log(' ' . Console::text('Basic sample', 'white', 'underlined'));
Console::log();

$rowHeaders = ['Index' => 10, 'Item'  => 25, 'Description' => 50];
$rows = [
    ['foo',       'some text for foo'],
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
Console::log(' ' . Console::text('Advanced sample', 'white', 'underlined'));
Console::log();

$rowHeaders = [
    Console::text('Index', 'blue')                  => 10, 
    Console::text('Item', 'white', 'underlined')    => 25, 
    Console::text('Description', 'white')           => 50
];
$rows = [
    [
        Console::text('foo',   'white'),     
        Console::text('some centered text red for foo', 'red')
    ],
    [
        Console::text('bar',   'white'),     
        Console::text( 'some centered text green for bar', 'green')
    ],
    [
        Console::text('foobar', 'white'),    
        'some text with unicode ✓ ' .Console::text('on BLUE here', 'white', 'blue')  
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
console::resetDefaults();

// -------------------------------
// ------ ANOTHER STYLE  ---------
// -------------------------------
Console::log();
Console::log(' ' . Console::text('Another style sample', 'white', 'underlined'));
Console::log();

$rowHeaders = [
    Console::text('Item',           'darkgray')    => 10, 
    Console::text('Status',         'darkgray')    => 12,
    Console::text('Description',    'darkgray')    => 25
];
$rows = [
    [Console::text('foo',     'white'), Console::text(' ONLINE ',  'white', 'green') , Console::text('some text for foo',    'white')],
    [Console::text('bar',     'white'), Console::text(' ONLINE ',  'white', 'green') , Console::text('some text for bar',    'white')],
    [Console::text('foobar ', 'white'), Console::text(' OFFLINE ', 'white', 'red')   , Console::text('some text for foobar', 'white')]
];

Console::$horizontalSeparator = '-';            // change the horizontal separator
Console::$tableCellPadding = '';                // no padding 
Console::$verticalInnerSeparator = '   ';       // blank separator
     Console::$verticalSeparator = '   ';       // no top left/right separator except a margin..
// Console::$verticalHeaderSeparator = '';      // no top left/right separator (not needed)

// table start
Console::log(Console::tableRowSeparator($rowHeaders, 'drakgray')); // saparator            ---------   ---------   ---  
Console::log(Console::tableRow($rowHeaders, 'drakgray'));          // columns headers      foo         bar         f... 
Console::log(Console::tableRowSeparator($rowHeaders, 'drakgray')); // saparator            ---------   ---------   ---  

// tables rows
foreach ($rows as $row){
    Console::log(
        Console::TableRowStart().               // start row with separator. Then, each cell will end with a separator 
        Console::TableRowCell($row[0] , 10).    // keep left alignment 
        Console::TableRowCell($row[1] , 12, Console::ALIGN_CENTER).  // align center
        Console::TableRowCell($row[2] , 25)     // keep left alignment
    );
}
// table end
Console::log(Console::tableRowSeparator($rowHeaders, 'drakgray')); // saparator            ---------   ---------   ---  
console::resetDefaults();

?>
