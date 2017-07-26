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
    Console::log('    '. Console::text("                   ", 'black', 'white') . Console::text("        Version 0.1       ", 'black', 'white'));
    Console::log('    '. Console::text("                   ", 'black', 'white') . Console::text("        © 2017 Kristuff   ", 'black', 'white'));
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

    $index[4] = ['Text',  'Console::text() overview',    'demo.log.php'];      //TODO
    $index[5] = ['Log',   'Console::log() overview',     'demo.log.php'];      //TODO
    $index[6] = ['ReLog', 'Console::relog() overview',   'demo.relog.php'];    // TODO
    $index[7] = ['Pad',   'Console::pad() overview',     'demo.pad.php'];
  
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
    Console::log('my string', 'blue', 'underline', 'none');    // Writes a text with no style at all (note the 'none' argument...)

}

function writeIndex()
{
    Console::log(' '. Console::text('Index:', 'underline', 'bold'));
    $rowHeaders = ['Index' => 10, 'Item'  => 25, 'Description' => 70];

    // customize table separator
    // customize table row style (color, bg...)
    Console::$tableColumnSeparator = '';
    Console::$tableRowSeparator = ' ';

    //Console::log(' '.Console::tableRowSeparator($rowHeaders, 'gray'));

    Console::$tableRowSeparator = '_';
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'bold'));

    Console::$tableRowSeparator = ' ';
    //Console::$tableColumnSeparator = '|';
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'magenta', 'bold'));


    Console::log(' '.Console::tableRow($rowHeaders, 'white', 'magenta', 'bold'));
    Console::$tableRowSeparator = '_';
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'magenta', 'bold'));
    Console::log(' '.Console::tableRowEmpty($rowHeaders, 'black', 'white'));

    $i = 0;
    foreach (getIndex() as $key => $value){
       
       if (file_exists( __DIR__ . '/'. $value[2])) {
            Console::log(' '.Console::tableRow([
                $key        => 10, 
                $value[0]   => 25, 
                $value[1]   => 70
            ], 'black', ($i % 2 == 1) ? 'white' :  'yellow'));
            
            $i++;
        }
        
    }
    Console::log(' '.Console::tableRowSeparator($rowHeaders, 'white', 'white', 'bold'));

    // reset table sseparators to defaults
    Console::tableResetDefaults();

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

            Console::ask($base . Console::text('Press [Enter] to go back to index > ', 'white'));
            goIndex();
    }
}