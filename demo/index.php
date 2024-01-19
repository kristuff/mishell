<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;  

declare(ticks = 1);                                      // Allow posix signal handling
pcntl_async_signals(true);
pcntl_signal(SIGINT,"shutdown");       
register_shutdown_function("shutdown");                 // Handle END of script

// Console::newWindow();
// standWithUkraine("Stand with Ukraine <3", "Slava Ukraini");
// Console::clear(the war);
// Console::destroy("the duck");
// Console::help("PLEASE!");
printLoader(777, false); // à "la va vite".. u sleep? or not u sleep? or caleçon ? ..
splash();
goIndex();

function goIndex()
{
    splash();
    splash();
    Console::newWindow();
    printHeader('index');
    printIndex();
    askIndex();
}

function shutdown(){
   //     echo "\033c";                                        // Clear terminal
   //     echo PHP_EOL;                                        // New line
   Console::clear();
   Console::clear();
   Console::clear();
   Console::clear();
   Console::clear();
   Console::log('SIGINT signal detected, terminate script...');
   sleep(1);
   
   // ..
   // Console::restoreWindow();
   exit(0);
}  

function printLoader($introDelay = 75000, $printAll = true)
{
    Console::newWindow();
    splash();
    Console::clear();
    splash();
    Console::clear();
    Console::log();
    Console::log(Console::text("         _    _        _ _   ", 'yellow').Console::text('    ', 'yellow').Console::text('', 'green') );
    Console::log(Console::text("   _ __ (_)__| |_  ___| | |  ", 'yellow').Console::text('    ', 'yellow').Console::text('', 'green') );
    Console::log(Console::text("  | '  \| (_-< ' \/ -_) | |  ", 'yellow').Console::text('    ', 'yellow').Console::text('', 'green') );
    Console::log(Console::text("  |_|_|_|_/__/_||_\___|_|_|  ", 'yellow').Console::text('By  ', 'yellow').Console::text("kr157uff", 'green') );
    Console::log();
    Console::log('  '.Console::text("-----------------------------------------------------------------", "green"));
    Console::log('  '.Console::text("kristuff/mishell: A mini PHP library to build CLI app and reports", "green"));
    Console::log('  '.Console::text('Made with ', 'green') . Console::text('♥', 'red').
                      Console::text(' ', 'green').
                      Console::text(" | © 2017-2024 kri157uff", "green"));
    Console::log('  '.Console::text("-----------------------------------------------------------------", "green"));
    Console::log();
    usleep($introDelay  * random_int(7, 11)); 
    $new                = Console::text("NEW", 'green', 'blink');
    $fullRowString      = Console::pad('', Console::getColumns());
    $badgeOnline        = Console::text(' ONLINE ', 'yellow', 'green'). '    ';
    $badgeError         = Console::text(' 💀 ERR ', 'yellow', 'red');
    $badgeOffline       = Console::text(' BROKEN ', 'yellow', 'yellow'). '    ';
    $badgeBroken        = Console::text(' 😜 LIKELY NEED INTERNAL REWRITE ', 'yellow', 'red');
    $swu                = Console::text('StandWith', 'yellow', 'blue').Console::text('Ukraine', 'blue', 'yellow');
    $copyright          = Console::text(' [*]', 'green').Console::text(" © 2017-2024 ", 'yellow').Console::text('kri157uff', 'green').Console::text(' aka ', 'yellow').Console::text('Kristuff', 'green');
    $head1              = Console::text(' [*]', 'blue').Console::text(' Kr157uff/mishell ', 'yellow').Console::text(" v1.6 ", 'yellow', 'blue').' released '.$new.Console::text('   ', 'yellow');
    $progress           = Console::text(' [*]', 'blue').Console::text(' This is another ', 'yellow').Console::text('fake', 'green', 'underlined').Console::text(' progress message (', 'yellow').Console::text('0%', 'green').Console::text(') completed', 'yellow');
    $progress1          = Console::text('      [*]', 'yellow').Console::text(' In fact I\'m already loaded for a while...', 'yellow');
    $twitter            = Console::text(' [*]', 'blue').Console::text(' Twitter microservices status: ', 'yellow').$badgeOffline;
    $weSWU              = Console::text(' [*]', 'blue').Console::text(' We ', 'yellow').$swu;
    $msg1               = Console::text(' [*]', 'blue'). Console::text(' Tortoise vs Hare Race will starting soon. Place your bets! ...', 'yellow');
    $msg2               = Console::text('      [*]', 'blue').Console::text(' 🐢 ', 'green').Console::text('Tortoise progress ... ', 'green');
    $msg3               = Console::text('      [*]', 'blue').Console::text(' 🐇 ', 'yellow').Console::text('Hare progress ...     ', 'green');
    Console::log($head1);
    usleep($introDelay * random_int(1, 4)); 
    Console::log();
    Console::log($copyright);
    Console::log();
    usleep($introDelay * random_int(3, 5)); 
    Console::log($weSWU);
    Console::log();
    usleep($introDelay * random_int(5, 7)); 
    Console::log($twitter);
    Console::log();
    usleep($introDelay * random_int(1, 2)); 
    Console::log($msg1);
    Console::log();
    Console::log($msg2);
    Console::log();
    Console::log($msg3);
    Console::log();
    usleep($introDelay * random_int(2, 4)); 
    Console::log($progress);
    Console::log();
    Console::log($progress1);
    Console::log();
    //
    $harePurcent = 0;
    $tortPurcent = 0;
    $twitterStatus = [
        Console::text(' [*]', 'green').Console::text(' Twitter microservices status: ', 'yellow').$badgeOnline,
        Console::text(' [*]', 'yellow').Console::text(' Twitter microservices status: ', 'yellow').$badgeOffline,
        Console::text(' [*]', 'red')    .Console::text(' Twitter microservices status: ', 'yellow').  $badgeError,
    ];
    for ($i=1 ; $i<=100 ; $i++) {
        $isOdd = ($i % 2 == 0);
        
        $progress = Console::text(' [*]', 'blue').Console::text(' This is another ', 'yellow').Console::text('fake', 'green', 'bold', 'underlined').Console::text(' progress message (', 'yellow').Console::text($i .'%', 'green').Console::text(' completed)', 'yellow');
        $twitter  = $twitterStatus[random_int(0, 2)];
      
        if ($i < 75 ){
            $isOdd && $tortPurcent++;
        } else {
            $twitter = Console::text(' [*]', 'red').Console::text(' Twitter microservices status: ', 'yellow').$badgeBroken;
            $tortPurcent = min($tortPurcent + 3, 100);
        }
        if ($i == 100) {
            Console::text(' [*]', 'red').Console::text(' Twitter microservices status: ', 'yellow').$badgeBroken;
        } 
        $harePurcent++;
        if ($i== 100){
            $tortColor  = $tortPurcent >= $harePurcent ? 'green' : 'red' ;
            $hareColor  = $tortPurcent <  $harePurcent ? 'green' : 'red' ;
        } else {
            $tortColor  = $tortPurcent >= $harePurcent ? 'green' : 'yellow' ;
            $hareColor  = $tortPurcent <  $harePurcent ? 'green' : 'yellow' ;
        }
        $msg1 = $i==100 ?  
            Console::text(' [*]', 'blue').Console::text(' Tortoise vs Hare Race - Final Results', 'yellow') : 
            Console::text(' [*]', 'blue').Console::text(' Tortoise vs Hare Race: ', 'yellow').Console::text(' RUNNING ', 'yellow', 'yellow'). '                                    '  ;
        $msg2 = Console::text('      [*]', $i==100 ? $tortColor : 'blue').Console::text(' 🐢 ', 'green').Console::text('Tortoise progress: ', 'yellow').Console::progressBar($tortPurcent, $tortColor, $tortColor);
        $msg3 = Console::text('      [*]', $i==100 ? $hareColor : 'blue').Console::text(' 🐇 ', 'yellow').     Console::text('Hare progress:     ', 'yellow').Console::progressBar($harePurcent, $hareColor, $hareColor);
        $msg2End = $tortPurcent == 100 ? '  '.Console::text('🏆 WINNER!!!', 'green') : '';
        $msgs = [
                 $head1 
               , 
            ' ', $copyright, 
            ' ', $weSWU, 
            ' ', $twitter, 
            ' ', $msg1,
            ' ', $msg2.$msg2End,
            ' ', $msg3, 
            ' ', $progress,
            ' ', $progress1,
            ' ',
        ];

        // rewrite the last printed lines
        Console::overwrite($msgs);
        
        // wait for a while, so we see the animation
        usleep($introDelay); 
    }

    $apt1 = Console::text(' dpkg install nothing [ ', 'yellow').Console::progressBar(0, 'default', 'default','default', Console::getColumns() - 26, ' ', '.', false).Console::text(' ]', 'yellow');
    $apt2 = Console::pad(Console::text(' dpkg finished to install nothing ...', 'yellow'), Console::getColumns() -26); 
    $apt3 = '';
    $apt4 = Console::pad(Console::text(' it works on my machine ...', 'yellow'), Console::getColumns() -26); 
    $apt5 = '';
    $apt6 = Console::pad(Console::text(' failed to import new galaxy, we will retry later ...', 'red'), Console::getColumns() -26);

    usleep($introDelay * random_int(2, 3)); 
    Console::log($apt1);
    for ($i=1 ; $i<=100 ; $i++) {
        $apt1  = Console::text(' dpkg install nothing [ ', 'yellow').Console::progressBar($i, 'default', 'default','default', Console::getColumns() - 26, ' ', '#', false).Console::text(' ]', 'yellow');
        Console::overwrite($apt1);
        usleep($introDelay / 3); 
    }
    Console::overwrite($apt2);
   
    Console::log($apt3);
    for ($i=1 ; $i<=100 ; $i++) {
        $apt3 = Console::text(' dpkg purge nothing   [ ', 'yellow').Console::progressBar($i, 'default', 'default','default', Console::getColumns() - 26, Console::text('.', 'yellow'), Console::text('#', 'green'), false).Console::text(' ]', 'yellow');
        Console::overwrite($apt3);
        usleep($introDelay / 4); 
    }
    Console::overwrite($apt4);

    usleep($introDelay * random_int(2, 3)); 
    Console::log($apt5);
    for ($i=1 ; $i<=100 ; $i++) {
        $apt5 = Console::text(' importing new galaxy [ ', 'yellow').Console::progressBar($i, 'default', 'default','default', Console::getColumns() - 26, Console::text('.', 'yellow'), Console::text('!', 'red'), false).Console::text(' ]', 'yellow');
        Console::overwrite($apt5);
        usleep($introDelay / 5 ); 
    }
    Console::overwrite($apt6);

    $magicTime = $printAll ? 122000 : false;

    Console::log(' '.Console::text("- CRITICAL FAILURE -", 'yellow', 'red'));
    usleep($magicTime ?? 556000); 
    Console::overwrite(Console::text(" just kidding ...", 'yellow'));
    usleep($magicTime ?? 9155000); 
    Console::overwrite(Console::text(" demo complete", 'green'));
    usleep($magicTime ?? 1355000); 
    Console::overwrite(Console::text(" oh wait! I forgot something 🤔", 'yellow'));
    usleep($magicTime ?? 1355000); 

    if ($printAll) {

        Console::overwrite($fullRowString);
        Console::log(
            Console::text(" →", 'yellow').Console::text(' → ', 'blue').
            Console::text(" →", 'yellow').Console::text(' → ', 'blue').
            Console::text(" →", 'yellow').Console::text(' → ', 'blue').
            Console::text(" →", 'yellow').Console::text(' → ', 'blue').
            $swu.
            Console::text(" ←", 'yellow').Console::text(' ← ', 'blue').  
            Console::text(" ←", 'yellow').Console::text(' ← ', 'blue').  
            Console::text(" ←", 'yellow').Console::text(' ← ', 'blue').  
            Console::text(" ←", 'yellow').Console::text(' ← ', 'blue')  
        );
        usleep($introDelay * 10); 

        Console::log();
        Console::log(       Console::text(" also forgot to install Kr157uff-socials-links-2.0 package", 'yellow')); usleep(1355000); 
        Console::overwrite( Console::text(" Do you want to install Kr157uff-socials-links package? (634 Go)", 'yellow'));  usleep(1355000); 
        Console::log(       Console::text(" i readed in your mind and detected ", 'yellow').Console::text('YES OF COURSE', 'yellow').Console::text(" ...", 'yellow')); usleep($introDelay * 5); 
        Console::log(       Console::text(" i never cheat ...", 'yellow')); usleep($introDelay * 5); 
        Console::log(       Console::text(" okay sometimes ...", 'yellow'));
        $socials = [
            ["name" => "Github",        "user" => "kristuff   ",  "link" => "https://github.com/kristuff"],    
            ["name" => "Twitter",       "user" => "@_kristuff ",  "link" => "https://twitter.com/_kristuff"], 
            ["name" => "Mastodon",      "user" => "@kristuff  ",  "link" => "https://infosec.exchange/@kristuff"],
        ];

        $aptLink        = Console::text(' unpacking Kr157uff-social-links-2.0-prod-test   [ ', 'yellow').Console::progressBar(0, 'default', 'default','default', Console::getColumns() - 56, '.', Console::text('#', 'green'), false).Console::text(' ]', 'yellow');
        Console::log();
        Console::log();
        Console::log();
        Console::log($aptLink);
        Console::log();
    
        $i = 0;
        foreach ($socials as $social){
            $socialLog  = Console::pad(
                                Console::text(' preparing to unpack ', 'yellow').
                                Console::text('kristuff-'.$social['name'].'.deb', 'green').
                                Console::text(' ...', 'yellow'),
                            Console::getColumns() - 12
                        ) ; 
            $socialLog3 = Console::text( ' created symlink ', 'yellow'). 
                        Console::text('/usr/bin/'.$social['user'], 'yellow').
                        Console::text(' → ', 'yellow'). 
                        Console::text($social['link'], 'lightblue', 'underlined');

            $socialLog2 = Console::text( ' unpacking ', 'yellow'). 
                        Console::text('kristuff-'. $social['name'].'-prod-test~deb12u99', 'yellow').
                        Console::text('-prod-test~deb12u99', 'green').
                        Console::text(' ...', 'yellow'); 


            $aptLink =  Console::text(' unpacking ', 'yellow').
                        Console::text('kristuff-social-links_2.0-prod-test~deb12u99', 'yellow').
                        Console::text(' [ ', 'yellow').
                        Console::progressBar(round(($i+0.3)/(count($socials)*2)*100), 'default', 'default','default', Console::getColumns() - 64, '.', Console::text('#', 'green'), false).Console::text(' ]', 'yellow');
    
            Console::overwrite([$fullRowString,$fullRowString]);
            Console::overwrite([$socialLog, $socialLog2]);
            Console::log($socialLog3);
            Console::log();
            Console::log($aptLink);
            usleep($introDelay * random_int(2, 4)); 

            $i++;
            $aptLink =  Console::text(' unpacking ', 'yellow').
                        Console::text('kristuff-social-links_2.0-prod-test~deb12u99', 'yellow').
                        Console::text(' [ ', 'yellow').
                        Console::progressBar(round($i+0.3/count($socials)*2*100), 'default', 'default','default', 
                            Console::getColumns() - 64, '.', Console::text('#', 'green'), false).
                        Console::text(' ]', 'yellow');
            usleep($introDelay * random_int(2, 4)); 
            Console::overwrite([$fullRowString,$fullRowString]);
            Console::overwrite([' ', $aptLink]);
            $i++;
        }

        $aptLink =  Console::text(' unpacking ', 'yellow').
                    Console::text('kristuff-social-links_2.0-prod-test~deb12u99', 'yellow').
                    Console::text(' [ ', 'yellow').
                    Console::progressBar(100, 'default', 'default','default', 
                        Console::getColumns() - 64, '.', Console::text('#', 'green'), false).
                    Console::text(' ]', 'yellow');
        
        Console::overwrite($aptLink);
        usleep($introDelay * random_int(10, 50)); 

        Console::overwrite(Console::pad('', Console::getColumns()));
        $aptLink =  Console::text(' unpacking ', 'yellow').
                    Console::text('kristuff-social-links_2.0-prod-test~deb12u99', 'yellow').
                    Console::text(' completed ... ', 'yellow').

        Console::overwrite($fullRowString);
        Console::log($aptLink);
        Console::log();
        Console::log(Console::text("         _    _        _ _   ", 'yellow').Console::text('    ', 'yellow').Console::text('', 'green') );
        Console::log(Console::text("   _ __ (_)__| |_  ___| | |  ", 'yellow').Console::text('    ', 'yellow').Console::text('', 'green') );
        Console::log(Console::text("  | '  \| (_-< ' \/ -_) | |  ", 'yellow').Console::text('    ', 'yellow').Console::text('', 'green') );
        Console::log(Console::text("  |_|_|_|_/__/_||_\___|_|_|  ", 'yellow').Console::text('By  ', 'yellow').Console::text("kr157uff", 'green') );
        Console::log('  '.Console::text("-----------------------------------------------------------------", "green"));
        Console::log('  '.Console::text("kr157uff/mishell: A mini PHP library to build CLI app and reports", "green"));
        Console::log('  '.Console::text('Made with ', 'green') . Console::text('♥', 'red').
                        Console::text(' in France', 'green').
                        Console::text(" | © 2017-2024 kri157uff", "green"));
        Console::log('  '.Console::text("-----------------------------------------------------------------", "green"));
        Console::log();
        usleep(1200000); 
        usleep($introDelay * random_int(10, 50)); 
        Console::log();
        Console::log(Console::text(" If you don't have the time to read, you can replay this intro slowwwly. Hura!", 'yellow'));
        Console::log();

    }

    usleep($introDelay * random_int(20, 40)); 
    Console::restoreWindow();
    
}

function standWithUkraine($msg1, $msg2, $delay = 2000000)
{
    // *open* new window
    Console::newWindow();

    // get columns / lines and calculate middle
    $lines = Console::getLines();
    $cols = Console::getColumns();
    $middle = round($lines/2);

    for ($i= 1; $i <= $lines ; $i++){

        switch($i){
            case $middle -1:
                Console::log(Console::pad($msg1, $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');
                break;
            case $middle:
                Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');
                break;
            case $middle +1:
                Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');
                break;
            case $middle +2:
                Console::log(Console::pad($msg2, $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');
                break;
            case $lines:
                Console::relog(Console::pad('Please wait a moment ', $cols, ' ', STR_PAD_LEFT), 'blue', 'yellow');
                break;

            default:
                if ($i > $middle) {
                    Console::log(Console::pad(' ', $cols), 'blue', 'yellow');
                } else {
                    Console::log(Console::pad(' ', $cols), 'yellow', 'blue');
                }
        }
    }
    
    usleep($delay); 
    // restore previous window
    Console::restoreWindow();
}

function getIndex()
{
    $index  = [];
    $new    = Console::text("NEW", 'green', 'blink');

    $index[99]  =  ['Quit           ',  'Quit and *restore* my terminal  '                                                                 ,                                                          ''];
    $index[1]   =  ['Styles         ',  'How to get basic styles         '                                                                 ,  'demo.styles.php    '     ,                              ''];
    $index[2]   =  ['Colors         ',  'How to get foreground colors    '                                                                 ,  'demo.colors.php    '       ,                             ''];
    $index[3]   =  ['Backgrounds    ',  'How to get background colors    '                                                                 ,  'demo.bgcolors.php  '         ,                            ''];
    $index[7]   =  ['Pad            ',  'How to get padded string        '      .Console::text( ' Console::pad()          '                ,  'lightblue' ).      'overview'  ,  'demo.pad.php',          ''];
    $index[8]   =  ['Size           ',  'How to get lines/columns number '                                                                 ,  'demo.size.php      '      ,                                 ''];
    $index[11]  =  ['Ask            ',  'How to ask? (get user input)    '                                                                 ,  'demo.ask.php       '       ,                                 ''];
    $index[12]  =  ['Ask Number     ',  'How to ask and expect a number? '                                                                 ,  'demo.askint.php     '        ,                                ''];
    $index[13]  =  ['Ask Password   ',  'How to ask and hide input       '                                                                 ,  'demo.askpassword.php  '        ,                               ''];
    $index[14]  =  ['Table          ',  'How to print a table?           '                                                                 ,  'demo.table. php         '  ,                                    ''];
    $index[15]  =  ['Bell           ',  'How to run the bell?            '                                                                 ,  'demo.bell.ph p     '         ,                                   ''];
    $index[16]  =  ['Progress (1)   ',  'How to print progress message?  '      .Console::text( ' Console::relog()        '                ,  'lightblue' ).      'overview'  ,         'demo.progress.php',     ''];
    $index[17]  =  ['Progress (2)   ',  'How to print progress message?  '      .Console::text( ' Console::overwrite()    '                ,  'lightblue' ).      'basic usage '.$new,   'demo.progress2.php',    ''];
    $index[18]  =  ['Progress (3)   ',  'How to print progress message?  '      .Console::text( ' Console::overwrite()    '                ,  'lightblue' ).      'advanced usage '.$new,  'demo.progress3.php',   ''];
    $index[19]  =  ['New window     ',  'How to open new/restore window? '                                                                 ,  'demo.window.php    '             ,                                   ''];
    $index[80]  =  ['BlueScreen     ',  'How to print blue screen        '      .Console::text( ' Console::BUG(?)', 'yellow').'         OLD && ' .$new                                     ,  'demo.bluescreen.php' , ''];
    $index[90]  =  ['Loader         ',  'Replay the loader               '      .Console::text( ' RealTime™v2.0                 '          ,  'yellow             ', 'blue')          . ' ' .$new,                     ''];
    $index[91]  =  ['Loader         ',  'Replay the loader (more slowly) '      .Console::text( ' SLOOOOW!                      ',  'black',  'yellow').   ' '   .$new      ,                                           ''];
    $index[92]  =  ['Loader         ',  'Replay the loader (very slowly) '      .Console::text( ' SLOOOOOOOOOOOOW!              ', 'yellow',  'red'   ).   ' '   .$new         ,                                         ''];
    $index[800] =  ['lifeA          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',          ''];
    $index[801] =  ['lifeB          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',           ''];
    $index[802] =  ['lifeC          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',            ''];
    $index[803] =  ['lifeE          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',             ''];
    $index[804] =  ['lifeF          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',              ''];
    $index[805] =  ['lifeG          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',               ''];
    $index[807] =  ['lifeH          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                ''];
    $index[808] =  ['lifeI          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                 ''];
    $index[809] =  ['lifeJ          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                  ''];
    $index[810] =  ['lifeK          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                   ''];
    $index[811] =  ['lifeL          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                    ''];
    $index[812] =  ['lifeMNO        ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                     ''];
    $index[822] =  ['lifePQ         ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                      ''];
    $index[844] =  ['lifeR          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                       ''];
    $index[888] =  ['lifeNOSS       ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                        ''];
    $index[869] =  ['lifeTHE-TEA    ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                         ''];
    $index[870] =  ['lifeUV-SOL-AIR ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                          ''];
    $index[890] =  ['lifeW          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                           ''];
    $index[899] =  ['lifeXYQ        ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , '',                            ''];
    $index[81]  =  ['life.          ',  'How to print " I love life "    '      .Console::text( ' 5tandWith',                   'yellow'   ,  'blue').Console::text('Ukraine', 'blue', 'yellow'). ' '.$new , 'demo.standwithukraine.php',    ''];

    return $index;
}

function printHeader($title = '', $demoPart = false)
{
    Console::log(Console::text("         _    _        _ _   ", 'yellow'));
    Console::log(Console::text("   _ __ (_)__| |_  ___| | |  ", 'yellow').Console::text('  Kr157uff/Mishell ', 'green') . Console::text(' v1.6 ', 'yellow', 'blue'). '                                 '.                      Console::text(' StandWith ', 'yellow', 'blue'));
    Console::log(Console::text("  | '  \| (_-< ' \/ -_) | |  ", 'yellow').Console::text('  Made with ', 'green') . Console::text('♥', 'red') . Console::text(' in France', 'green'). '                                   '.Console::text('  Ukraine  ', 'blue', 'yellow'));
    Console::log(Console::text("  |_|_|_|_/__/_||_\___|_|_|  ", 'yellow').
        Console::text('  © 2017-2024 Kr157uff (', 'green') . 
        Console::text('https://github.com/kristuff', 'green', 'underlined') .
        Console::text(')', 'green')
    );

    Console::log();    
    $demoTitle = Console::pad(' Mishell Interactive Sample - '.$title. ' ', 108, ' ', STR_PAD_BOTH);
    Console::log(Console::text('  ┌'.Console::pad('', 108, '─').'┐', 'yellow'));    
    Console::log(Console::text('  │'.$demoTitle.'│', 'yellow'));

    if ($demoPart){
        Console::log(Console::text('  └'.Console::pad('', 108, '─').'┘', 'yellow'));    
        Console::log();
    }
}

function printSampleHeader($index, $title)
{
    Console::log('   ' . Console::text(' - '. $index .' - ' . $title . ' ', 'yellow', 'blue'));
    Console::log();
}

function printIndex()
{
    $rowHeaders = [
        'Index'         => 5, 
        'Item'          => 20, 
        'Description'   => 75
    ];
    $i = 0;

    // customize table separator
    Console::$horizontalSeparator = '─'; 
    Console::$verticalSeparator = Console::text('│', 'yellow'); 
    Console::$verticalInnerSeparator = ' ';
    Console::$tableCellPadding = ' ';
    
    $line       = Console::text('  ├', 'yellow');
    $isFirst    = true;
    foreach ($rowHeaders as $column => $pad){
        $line  .= $isFirst ? '': Console::text('┬', 'yellow');
        $line  .= Console::text(Console::pad('', $pad+2, '─'), 'yellow');
        $isFirst = false;
    }
    $line       .= Console::text('┤', 'yellow');
    Console::log($line);

    $isFirst    = true;
    $line       = Console::text('  │', 'yellow');
    foreach ($rowHeaders as $column => $pad){
        $line  .= $isFirst ? '': Console::text('│', 'yellow');
        $line  .= Console::text(Console::pad(' '.$column. ' ', $pad +2), 'yellow');
        $isFirst = false;
    }
    $line       .= Console::text('│', 'yellow');
    Console::log($line);

 
    $isFirst    = true;
    $line       = Console::text('  ├', 'yellow');
    foreach ($rowHeaders as $column => $pad){
        $line  .= $isFirst ? '': Console::text('┼', 'yellow');
        $line  .= Console::text(Console::pad('', $pad+2, '─'), 'yellow');
        $isFirst = false;
    }
    $line       .= Console::text('┤', 'yellow');
    
    Console::log($line);

    foreach (getIndex() as $key => $value){
       if (file_exists( __DIR__ . '/'. $value[2])) {
            Console::log('  '.
                Console::TableRowStart().
                Console::text(Console::TableRowCell($key, 5, Console::ALIGN_CENTER),'green').    
                Console::text(Console::TableRowCell($value[0], 20),'green'). // no alignment set => default is left
                Console::text(Console::TableRowCell($value[1], 75),'green')  
            );
            $i++;
        }
    }

    $isFirst    = true;
    $line       = Console::text('  └', 'yellow');
    foreach ($rowHeaders as $column => $pad){
        $line  .= $isFirst ? '': Console::text('┴', 'yellow');
        $line  .= Console::text(Console::pad('', $pad+2, '─'), 'yellow');
        $isFirst = false;
    }
    $line       .= Console::text('┘', 'yellow');
    
    Console::log($line);
    Console::log('');
    Console::log('   '. Console::text('Tips:', 'underlined', 'bold'));
    Console::log('   '. Console::text(' - At any time you can stop this program using [') .Console::text('Ctrl+C', 'green') .Console::text('] '));
    Console::log('');
    // reset table separators to defaults
    Console::resetDefaults();
}


function splash()
{
    // magical stuff
    Console::newWindow();

    // get columns / lines and calculate middle
    $lines  = Console::getLines();
    $cols   = Console::getColumns();
    $middle = round($lines/2);

    for ($i= 1; $i <= $lines ; $i++){
        switch($i){
            case $middle -1:    Console::log(Console::pad("Stand With Ukraine <3", $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');    break;
            case $middle:       Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'yellow', 'blue');                        break;
            case $middle +1:    Console::log(Console::pad(' ', $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');                        break;
            case $middle +2:    Console::log(Console::pad('Slava Ukraini', $cols, ' ', STR_PAD_BOTH), 'blue', 'yellow');            break;
            case $lines:        Console::print(Console::pad(' Wait a few seconds or hint Ctrl+C', $cols , ' ', STR_PAD_LEFT), 'blue', 'yellow');  break; // no new line here
            default:
                if ($i > $middle) {
                    Console::log(Console::pad(' ', $cols), 'blue', 'yellow');
                } else {
                    Console::log(Console::pad(' ', $cols), 'yellow', 'blue');
                }
        }
    }

    // magical stuff..
    usleep(74442);

    // restore previous window
    Console::restoreWindow();

}


function askIndex()
{
    $base = Console::text(' Kr157uff/mishell-demo' , 'yellow');
    $base .= Console::text('~$ ' , 'gray');
    $selectedIndex = Console::askInt($base . Console::text(' Enter desired index then press [Enter] to run sample > ', 'yellow'));
    $index = getIndex();

    switch($selectedIndex){
        case 90: 
            splash();
            printLoader(100000);
            splash();
            goIndex();
            break;
        case 91: 
            splash();
            splash();
            printLoader(275000);
            splash();
            goIndex();
            break;

        case 92: 
            splash();
            splash();
            splash();
            printLoader(575000);
            splash();
            goIndex();
            break;


        case 99: 
            //Console::clear();
            Console::restoreWindow();
            break;
        case 0: 
            Console::log();
//            Console::restoreWindow();
            exit();
            break;

        default:

            if ($selectedIndex >= 800){
                splash();
                splash();
                splash();
                Console::clear();
                goIndex();
                break;
            } 

            if (array_key_exists($selectedIndex, getIndex())) {

                $title          = $index[$selectedIndex][0];
                $fileName       = $index[$selectedIndex][2];
                $samplefileName = $index[$selectedIndex][3];
                $filePath       = __DIR__ . '/'. $fileName;
                $samplefilePath = __DIR__ . '/'. $samplefileName;
                 
                Console::clear();
                printHeader($title, true);
                //printSampleHeader($selectedIndex, $title);

                Console::log($base . Console::text('Start running sample index [', 'yellow') . 
                Console::text( $selectedIndex, 'lightcyan') . 
                Console::text(']', 'yellow'));

                Console::log($base . Console::text('Loading sample [', 'yellow') . 
                                     Console::text( $title, 'lightcyan') . 
                                     Console::text('] in file [', 'yellow')  .
                                     Console::text( $fileName, 'lightcyan') . 
                                     Console::text(']', 'yellow'));

                if (file_exists($filePath)){
                    //Console::log();
                    include $filePath;

                    if (!empty($samplefileName) && file_exists($samplefilePath)){
                        include $samplefilePath;
                        $filePath = $samplefilePath;
                    }
                    //Console::log();
                    Console::log($base . Console::text('End running [', 'yellow')  .
                                     Console::text( $title, 'lightcyan') . 
                                     Console::text(']', 'yellow')); 
                    
                                     $response = Console::ask($base . Console::text('Do you want to see the code that has been executed? (type y/Y to see the code) > ', 'yellow'));
                     if (strtoupper($response) === 'Y') {
                        Console::log($base . Console::text('The code in file [', 'yellow')  .
                                     Console::text( $fileName, 'lightcyan') . 
                                     Console::text('] is:', 'yellow')); 
                        Console::log();

                        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        $count = 1;

                        Console::log(Console::pad('   ', 100, '-'), 'green');
                        foreach($lines as $line){
                            $codeLine = rtrim($line);
                            $isComment = substr(ltrim($codeLine), 0, 2) === '//';
                            $isPhp = substr(ltrim($codeLine), 0, 5) === '<?php' || substr(ltrim($codeLine), 0, 2) === '?>';
                            $color = $isPhp ? 'blue' : ($isComment ? 'green' : 'green');
                            Console::log('   '. Console::text($codeLine, $color));
                            $count++;
                        }
                        Console::log(Console::pad('  ', 100, '-'), 'green');
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

            Console::ask($base . Console::text('Press [Enter] to go back to index > ', 'yellow'));
            goIndex();
    }
}