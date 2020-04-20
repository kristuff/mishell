<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::clear();
writeLoader();
goIndex();

function goIndex()
{
    writeHeader();
    writeIndex();
    askIndex();
}

function writeLoader()
{

    Console::log();
    Console::log();
    Console::log('    '. Console::text("                _  ", 'black', 'white') . Console::text("  ____  _          _ _    ", 'magenta', 'white'));
    Console::log('    '. Console::text("      _ __ ___ (_) ", 'black', 'white') . Console::text(" / ___|| |__   ___| | |   ", 'magenta', 'white'));
    Console::log('    '. Console::text("     | '_ ` _ \| | ", 'black', 'white') . Console::text(" \___ \| '_ \ / _ \ | |   ", 'magenta', 'white'));
    Console::log('    '. Console::text("     | | | | | | | ", 'black', 'white') . Console::text("  ___) | | | |  __/ | |   ", 'magenta', 'white'));
    Console::log('    '. Console::text("     |_| |_| |_|_| ", 'black', 'white') . Console::text(" |____/|_| |_|\___|_|_|   ", 'magenta', 'white'));
    Console::log('    '. Console::text("                   ", 'black', 'white') . Console::text("                          ", 'magenta', 'white'));
    Console::log('    '. Console::text("                   ", 'black', 'white') . Console::text("        Version 1.0       ", 'black', 'white'));
    Console::log('    '. Console::text("                   ", 'black', 'white') . Console::text("        © 2020 Kristuff   ", 'black', 'white'));
    Console::log('    '. Console::text("                   ", 'black', 'white') . Console::text("                          ", 'magenta', 'white'));
    Console::log();
    Console::log();
 
    $pad = '    ';

    // fake progress message 
    for ($i=0 ; $i<=100 ; $i++) {

        // Overwrite progress message. 
        Console::relog($pad.Console::text('Loading... [', 'white').
                            Console::text($i .'%', 'green').
                            Console::text('] completed', 'white'));

        // wait for a while, so we see the animation
        usleep(15000); 
    }
    // Overwrite progress message. 
    Console::relog($pad.Console::text('Done!', 'white', 'green', 'underline').str_pad(' ', 150));
    usleep(45000); 
    Console::clear();
}

function getIndex()
{
    $index = [];


    
    $index[1] =   ['Styles',        'How to get available basic styles',                'demo.styles.php'];
    $index[2] =   ['Colors',        'How to get available foreground colors',           'demo.colors.php'];
    $index[3] =   ['Backgrounds',   'How to get available background colors',           'demo.bgcolors.php'];
   
    $index[11] =  ['Ask',           'How to ask? (get user input)',                     'demo.ask.php'];
    $index[12] =  ['Ask Number',    'How to ask and expect a number?',                  'demo.askint.php'];
    $index[13] =  ['Ask Password',  'How to ask a password? (do not print user input)', 'demo.askpassword.php'];
   
    $index[14] =  ['Table',         'How to print a table?',                            'demo.table.php'];
    $index[15] =  ['Bell',          'How to run the bell?',                             'demo.bell.php'];
    $index[16] =  ['Progress',      'How to output progress message?',                  'demo.progress.php'];
    $index[17] =  ['New window',    'How to open new/restore window?',                  'demo.window.php'];

//  $index[4] = ['Text',  'Console::text() overview',    'demo.log.php'];      
//  $index[5] = ['Log',   'Console::log() overview',     'demo.log.php'];      
//  $index[6] = ['ReLog', 'Console::relog() overview',   'demo.relog.php'];    
    $index[7] = ['Pad',             'Console::pad() overview',                          'demo.pad.php'];
    $index[8] = ['Size',  'How to get the number of columns and lines in terminal',     'demo.size.php'];
    $index[9] = ['BlueScreen',  'Really nice full screen centered message sample',      'demo.bluescreen.php'];
  
    return $index;
}

function writeHeader()
{
    Console::clear();
    Console::log();
    Console::log(' '.Console::text('                                                   ', 'white', 'bold', 'underline'));
    Console::log(' '.Console::text('                                                   ', 'white', 'cyan', 'bold'));
    Console::log(' '.Console::text('   --- Interactive ~Mishell^^ Console sample ---   ', 'white', 'cyan', 'bold'));
    Console::log(' '.Console::text('                                                   ', 'white', 'cyan', 'bold', 'underline'));
    Console::log();
}

function writeSampleHeader($index, $title)
{
    Console::log('      ' . Console::text(Console::pad('',      20, ' ', STR_PAD_BOTH), 'white', 'bold', 'underline'));
    Console::log('      ' . Console::text(Console::pad('',      20, ' ', STR_PAD_BOTH), 'white', 'yellow', 'bold'));
    Console::log('      ' . Console::text(Console::pad($index .' - ' . $title,  20, ' ', STR_PAD_BOTH), 'white', 'yellow', 'bold'));
    Console::log('      ' . Console::text(Console::pad('',      20, ' ', STR_PAD_BOTH), 'white', 'yellow', 'bold', 'underline'));
    Console::log();
}

function writeIndex()
{
    Console::log(' '. Console::text('Index:', 'underline', 'bold'));
    $rowHeaders = ['Index' => 10, 'Item'  => 25, 'Description' => 70];

    // customize table separator
    // customize table row style (color, bg...)
    Console::$verticalSeparator = '';
    Console::$verticalInnerSeparator = '';
    Console::$horizontalSeparator = ' ';

    //Console::log(' '.Console::tableRowSeparator($rowHeaders, 'gray'));

    Console::$horizontalSeparator = '_';
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'bold'));

    Console::$horizontalSeparator = ' ';
    //Console::$verticalSeparator = '|';
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'blue', 'bold'));


    Console::log(' '.Console::tableRow($rowHeaders, 'white', 'blue', 'bold'));
    Console::$horizontalSeparator = '_';
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'blue', 'bold'));
    Console::log(' '.Console::tableRowEmpty($rowHeaders, 'white', 'cyan'));

    $i = 0;
    foreach (getIndex() as $key => $value){
       
       if (file_exists( __DIR__ . '/'. $value[2])) {
            Console::log(' '.
                Console::tableRow([
                    $key        => 10, 
                    $value[0]   => 25, 
                    $value[1]   => 70
                ], 
                    ($i % 2 == 1) ? 'white' :  'white',  
                    ($i % 2 == 1) ? 'cyan' :   'cyan',
                    ($i % 2 == 1) ? ''      :  'bold'
                )
            );
            $i++;
        }
        
    }
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'cyan', 'bold'));

    // reset table sseparators to defaults
    Console::resetDefaults();

    // --------------------

    Console::log('');
    Console::log(' ' .Console::text('Tips:', 'underline', 'bold'));
    Console::log(' '. Console::text('- At any time you can stop this program using [', 'green') .Console::text('Ctrl+C', 'black','white') .Console::text(']', 'green'));
    Console::log('');
}

function askIndex()
{
    $base = Console::text('~miShell^^' , 'yellow');
    $base .= Console::text(' $ ' , 'gray');
    $selectedIndex = Console::askInt($base . Console::text('Enter desired index then press [Enter] to run sample > ', 'white'));
    $index = getIndex();

    switch($selectedIndex){
        case 0: 
            Console::log();
            exit();
            break;

        default:
            if (array_key_exists($selectedIndex, getIndex())) {

                $title      = $index[$selectedIndex][0];
                $fileName   = $index[$selectedIndex][2];
                $filePath   = __DIR__ . '/'. $fileName;
                
                Console::clear();
                writeHeader();
                writeSampleHeader($selectedIndex, $title);

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
                        foreach($lines as $line){
                            $codeLine = rtrim($line);
                            $isComment = substr(ltrim($codeLine), 0, 2) === '//';
                            Console::log(
                                Console::pad($count . ' ', 3, ' ', STR_PAD_LEFT) . 
                                Console::text(Console::pad($codeLine, 150), $isComment ? 'magenta' : 'black', 'white')
                            );
                            $count++;
                        }
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