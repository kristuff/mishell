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
    Console::log('     '. Console::text("                _  ", 'black', 'white') . Console::text("  ____  _          _ _    ", 'magenta', 'white'));
    Console::log('     '. Console::text("      _ __ ___ (_) ", 'black', 'white') . Console::text(" / ___|| |__   ___| | |   ", 'magenta', 'white'));
    Console::log('     '. Console::text("     | '_ ` _ \| | ", 'black', 'white') . Console::text(" \___ \| '_ \ / _ \ | |   ", 'magenta', 'white'));
    Console::log('     '. Console::text("     | | | | | | | ", 'black', 'white') . Console::text("  ___) | | | |  __/ | |   ", 'magenta', 'white'));
    Console::log('     '. Console::text("     |_| |_| |_|_| ", 'black', 'white') . Console::text(" |____/|_| |_|\___|_|_|   ", 'magenta', 'white'));
    Console::log('     '. Console::text("                   ", 'black', 'white') . Console::text("                          ", 'magenta', 'white'));
    Console::log('     '. Console::text("                   ", 'black', 'white') . Console::text("        Version 0.1       ", 'black', 'white'));
    Console::log('     '. Console::text("                   ", 'black', 'white') . Console::text("        © 2017 Kristuff   ", 'black', 'white'));
    Console::log('     '. Console::text("                   ", 'black', 'white') . Console::text("                          ", 'magenta', 'white'));
    Console::log();
    Console::log();
 
//            _   ____  _          _ _
//  _ __ ___ (_) / ___|| |__   ___| | |
// | '_ ` _ \| | \___ \| '_ \ / _ \ | |
// | | | | | | |  ___) | | | |  __/ | |
// |_| |_| |_|_| |____/|_| |_|\___|_|_|

    $pad = '     ';

    // fake progress message 
    for ($i=0 ; $i<=100 ; $i++) {

        // Overwrite progress message. 
        Console::relog($pad.Console::text('Loading... [', 'white').
                            Console::text($i .'%', 'green').
                            Console::text('] completed', 'white'));

        // wait for a while, so we see the animation
        usleep(35000); 
    }
    // Overwrite progress message. 
    // note: you may need to use str_pad() method to be sure all previous text is overwitted.
    Console::relog($pad.Console::text('Done!', 'white', 'green', 'underline').str_pad(' ', 150));
    Console::log('');
    Console::log('');
    usleep(35000); 

}

function getIndex()
{
    $index = [];
    //$index[1]  = ['Basic',                'sdcsdcsd', ''];

    $index[1] = ['Styles',       'See available basic styles',      'demo.styles.php'];
    $index[2] = ['Colors',       'See available foreground colors', 'demo.colors.php'];
    $index[3] = ['Backgrounds',  'See available background colors', 'demo.bgcolors.php'];

    $index[56] = ['Text',   'Console::log() overview',     'demo.log.php'];
    $index[51] = ['Log',    'Console::log() overview',      'demo.log.php'];
    $index[52] = ['ReLog',  'Console::relog() overview',    'demo.relog.php'];

    $index[11] = ['ask',            'How to ask? (get user input)',                     'demo.ask.php'];
    $index[12] = ['askInt',         'How to ask and expect a number?',                  'demo.askint.php'];
    $index[13] = ['ask a password', 'How to ask a password (do not print user input)',  'demo.askpassword.php'];
    $index[14] = ['Table',          'How to print a table',                             'demo.table.php'];
    $index[15] = ['Bell',           'How to run the bell?',                             'demo.bell.php'];
    $index[16] = ['Progress',       'How to ouput progress message?',                   'demo.progress.php'];
//using Console::bell([int $repeat)].
    $index[99] = ['TEST',   '',     'demo.allstyles.php'];

//$index[72] = ['Table',  'Console::table() overview',      'demo.table2.php'];
    return $index;
}

function writeHeader()
{
    Console::clear();
    Console::log();
    Console::log('  '.Console::text('****************************************************', 'white', 'cyan'));
    Console::log('  '.Console::text('****** Interactive ~Mishell^^ Console sample *******', 'white', 'cyan'));
    Console::log('  '.Console::text('****************************************************', 'white', 'cyan'));
    Console::log();
}

function writeIndex()
{
    Console::log('  '. Console::text('Index:', 'underline', 'bold'));
    $rowHeaders = ['Index' => 10, 'Item'  => 25, 'Description' => 70];

    // customize table separator
    // customize table row style (color, bg...)
    Console::$tableColumnSeparator = ' ';
    Console::$tableRowSeparator = ' ';

    //Console::log('  '.Console::tableRowHeader($rowHeaders, 'gray'));

    Console::$tableRowSeparator = '_';
    Console::log('  '.Console::tableRowHeader($rowHeaders, 'lightgray'));

    Console::$tableRowSeparator = ' ';
    Console::$tableColumnSeparator = '|';
    Console::log('  '.Console::tableRowHeader($rowHeaders, 'lightgray','black'));


    Console::log('  '.Console::tableRow($rowHeaders, 'lightgray', 'black'));
    Console::$tableRowSeparator = '_';
    Console::log('  '.Console::tableRowHeader($rowHeaders, 'lightgray','black'));
    Console::log('  '.Console::tableRowEmpty($rowHeaders, 'lightgray','black'));

    foreach (getIndex() as $key => $value){

        if (file_exists( __DIR__ . '/'. $value[2])) {
            Console::log('  '.Console::tableRow([
                $key        => 10, 
                $value[0]   => 25, 
                $value[1]   => 70
            ], 'lightgray','black'));
        }
    }
    Console::log('  '.Console::tableRowHeader($rowHeaders, 'lightgray','black'));

    // reset table seperator to defaults
    Console::tableResetDefaults();

    // --------------------

    Console::log('');
    Console::log('  ' .Console::text('Tips:', 'underline', 'bold'));
    Console::log('  '. Console::text('- At any time you can stop this program using [', 'green') .Console::text('Ctrl+C', 'black','white') .Console::text(']', 'green'));
    Console::log('');
}

function askIndex()
{
    $base = Console::text('~miShell^^' , 'yellow');
    $base .= Console::text(' $ ' , 'gray');
    $selectedIndex = Console::askInt($base . Console::text('Enter desired index: ', 'white'));
    $index = getIndex();

    switch($selectedIndex){
        case 0: 
            Console::log();
            exit();
            break;

        default:
            if (array_key_exists($selectedIndex, getIndex())) {
                Console::clear();
                writeHeader();
                Console::log($base . Console::text('Start running [' . $index[$selectedIndex][0] . ']' , 'white'));
                Console::log();

                $script = __DIR__ . '/'. $index[$selectedIndex][2];
                if (file_exists($script)){
                    include $script;
                    Console::log();
                    Console::log($base . Console::text('End running [' . $index[$selectedIndex][0] . ']' , 'white'));
               } else {
                    Console::log($base . Console::text('Error' , 'red'));
                    Console::log($base . Console::text(' => File missing [' . $script . ']' , 'red'));
               }

            } else {
                Console::log($base . Console::text('Error:', 'red'));
                Console::log($base . Console::text('=> the value you entered is not a valid index number.', 'red'));
                askIndex();
            }

            Console::ask($base . Console::text('Press any key to go back to index.', 'white'));
            goIndex();
    }
}