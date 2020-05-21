<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::clear();
printLoader();
goIndex();
//Console::newWindow();

function goIndex()
{
    printHeader();
    printIndex();
    askIndex();
}

function printLoader()
{
    Console::log();
    Console::log();
    Console::log('    '. Console::text("             _  ____  _          _ _    ", 'red'));
    Console::log('    '. Console::text("   _ __ ___ (_)/ ___|| |__   ___| | |   ", 'red'));
    Console::log('    '. Console::text("  | '_ ` _ \| |\___ \| '_ \ / _ \ | |   ", 'red'));
    Console::log('    '. Console::text("  | | | | | | | ___) | | | |  __/ | |   ", 'red'));
    Console::log('    '. Console::text("  |_| |_| |_|_||____/|_| |_|\___|_|_|   ", 'red'));
    Console::log('    '. Console::text("                                        ", 'red'));
    Console::log('    '. Console::text("                 Version 1.2            ", 'red'));
    Console::log('    '. Console::text("                 © 2017-2020 Kristuff   ", 'red'));
    Console::log('    '. Console::text("                                        ", 'red'));
    Console::log();
    Console::log();
    Console::log();
 
    $pad = '    ';

    // fake progress message 
    for ($i=0 ; $i<=100 ; $i++) {

        // Overwrite progress message. 
        Console::relog($pad.Console::text('This is a fake progress message... [', 'white').
                            Console::text($i .'%', 'green').
                            Console::text('] completed', 'white'));

        // wait for a while, so we see the animation
        usleep(17000); 
    }
    // Overwrite progress message. 
    Console::relog($pad.Console::text('Done!', 'white', 'green', 'underlined').str_pad(' ', 100));
    usleep(45000); 
    Console::clear();
}

function getIndex()
{
    $index = [];
    
    $index[1] =   ['Styles',        'How to get available basic styles',                'demo.styles.php'];
    $index[2] =   ['Colors',        'How to get available foreground colors',           'demo.colors.php'];
    $index[3] =   ['Backgrounds',   'How to get available background colors',           'demo.bgcolors.php'];
//  $index[4] = ['Text',  'Console::text() overview',    'demo.log.php'];      
//  $index[5] = ['Log',   'Console::log() overview',     'demo.log.php'];      
//  $index[6] = ['ReLog', 'Console::relog() overview',   'demo.relog.php'];    
    $index[7] = ['Pad',             'Console::pad() overview',                          'demo.pad.php'];
    $index[8] = ['Size',  'How to get the number of columns and lines in terminal',     'demo.size.php'];
    
    $index[11] =  ['Ask',           'How to ask? (get user input)',                     'demo.ask.php'];
    $index[12] =  ['Ask Number',    'How to ask and expect a number?',                  'demo.askint.php'];
    $index[13] =  ['Ask Password',  'How to ask a password? (do not print user input)', 'demo.askpassword.php'];
   
    $index[14] =  ['Table',         'How to print a table?',                            'demo.table.php'];
    $index[15] =  ['Bell',          'How to run the bell?',                             'demo.bell.php'];
    $index[16] =  ['Progress',      'How to output progress message?',                  'demo.progress.php'];
    $index[17] =  ['New window',    'How to open new/restore window?',                  'demo.window.php'];

    $index[20] = ['BlueScreen',  'Really nice full screen centered message sample',      'demo.bluescreen.php'];

    return $index;
}

function printHeader()
{
    Console::clear();
    Console::log();
    Console::log(Console::text('  Kristuff/Mishell ', 'darkgray') . Console::text(' v1.2 ', 'white', 'green')); 
    Console::log(Console::text('  Made with ', 'darkgray') . Console::text('♥', 'red') . Console::text(' in France', 'darkgray'));
    Console::log(
        Console::text('  © 2017-2020 Kristuff (', 'darkgray') . 
        Console::text('https://github.com/kristuff)', 'darkgray', 'underlined') .
        Console::text(')', 'darkgray')
    );
    Console::log();    
    Console::log('  '.Console::text(' Interactive sample ', 'white', 'blue', 'bold'));
    Console::log();    
}

function printSampleHeader($index, $title)
{
    Console::log('   ' . Console::text(' - '. $index .' - ' . $title . ' ', 'white', 'blue'));
    Console::log();
}

function printIndex()
{
    $rowHeaders = ['Index' => 6, 'Item'  => 15, 'Description' => 55];
    $i = 0;

    // customize table separator
    Console::$horizontalSeparator = '-'; 
    Console::$verticalSeparator = '   '; 
    Console::$verticalInnerSeparator = '   ';
    Console::$tableCellPadding = ' ';

    Console::log(''.Console::tableRowSeparator($rowHeaders, 'darkgray'));
    Console::log(''.Console::tableRow($rowHeaders, 'darkgray'));
    Console::log(''.Console::tableRowSeparator($rowHeaders, 'darkgray'));
    Console::log();

    foreach (getIndex() as $key => $value){
       if (file_exists( __DIR__ . '/'. $value[2])) {
            Console::log(''.
                Console::TableRowStart().
                Console::TableRowCell(Console::text($key,'lightgray'), 6, Console::ALIGN_CENTER).                                    //no align => default is left
                Console::TableRowCell(Console::text($value[0], 'lightgray'), 15).
                Console::TableRowCell(Console::text($value[1], 'lightgray'), 55)  
            );
            $i++;
        }
    }
    Console::log('');
    Console::log(''.Console::tableRowSeparator($rowHeaders, 'darkgray'));
    Console::log('');
    Console::log('   '. Console::text('Tips:', 'underlined', 'bold'));
    Console::log('   '. Console::text(' - At any time you can stop this program using [') .Console::text('Ctrl+C', 'green') .Console::text(']'));
    Console::log('');
    // reset table separators to defaults
    Console::resetDefaults();
}

function askIndex()
{
    $base = Console::text(' kristuff/mishell-demo' , 'yellow');
    $base .= Console::text('~$ ' , 'gray');
    $selectedIndex = Console::askInt($base . Console::text(' Enter desired index then press [Enter] to run sample > ', 'white'));
    $index = getIndex();

    switch($selectedIndex){
        case 0: 
            Console::log();
//            Console::restoreWindow();
            exit();
            break;

        default:
            if (array_key_exists($selectedIndex, getIndex())) {

                $title      = $index[$selectedIndex][0];
                $fileName   = $index[$selectedIndex][2];
                $filePath   = __DIR__ . '/'. $fileName;
                
                Console::clear();
                printHeader();
                printSampleHeader($selectedIndex, $title);

                Console::log($base . Console::text('Start running [', 'white') . 
                                     Console::text( $title, 'lightcyan') . 
                                     Console::text('] in file [', 'white')  .
                                     Console::text( $fileName, 'lightcyan') . 
                                     Console::text(']', 'white'));

                if (file_exists($filePath)){
                    Console::log();
                    include $filePath;
                    Console::log();
                    Console::log($base . Console::text('End running [', 'white')  .
                                     Console::text( $title, 'lightcyan') . 
                                     Console::text(']', 'white')); 
                    
                                     $response = Console::ask($base . Console::text('Do you want to see the code that has been executed? (type y/Y to see the code) > ', 'white'));
                     if (strtoupper($response) === 'Y') {
                        Console::log($base . Console::text('The code in file [', 'white')  .
                                     Console::text( $fileName, 'lightcyan') . 
                                     Console::text('] is:', 'white')); 
                        Console::log();

                        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        $count = 1;

                        Console::log(Console::pad('   ', 100, '-'), 'darkgray');
                        foreach($lines as $line){
                            $codeLine = rtrim($line);
                            $isComment = substr(ltrim($codeLine), 0, 2) === '//';
                            $isPhp = substr(ltrim($codeLine), 0, 5) === '<?php' || substr(ltrim($codeLine), 0, 2) === '?>';
                            $color = $isPhp ? 'blue' : ($isComment ? 'green' : 'lightgray');
                            Console::log('   '. Console::text($codeLine, $color));
                            $count++;
                        }
                        Console::log(Console::pad('  ', 100, '-'), 'darkgray');
                        Console::log();
                    }
               } else {
                    Console::log($base . Console::text('Error' , 'red'));
                    Console::log($base . Console::text(' => File missing [' . $fileName . ']' , 'red'));
               }

            } else {
                Console::log($base . Console::text('Error:', 'red'));
                Console::log($base . Console::text('=> the value you entered is not a valid index number.', 'red'));
                askIndex();
            }

            Console::ask($base . Console::text('Press [Enter] to go back to index > ', 'white'));
            goIndex();
    }
}