<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use Console::pad(\$str[, \$input[, \$padLength[, \$padString = ' '[, \$padType = STR_PAD_RIGHT]]]]) to get a text with given padding.");
Console::log("  - The method is equivalent to php str_pad() method, except that it handles not printable ANSI chars.");
Console::log('');   
Console::log('Sample:', 'underline', 'bold');
Console::log('');   
Console::log('1) ' . Console::text('Using php str_pad()', 'white', 'magenta', 'bold', 'underline')); 
Console::log('');   
Console::log(str_pad('I am normal inside str_pad() {padLength:100, padString:\'*\'}', 100, '*'));
Console::log(str_pad(Console::text('I am colorized with ::text() inside str_pad() {padLength:100, padString:\'*\'}', 'blue'), 100, '*'));
Console::log('');   
Console::log('=> you should\'see what you expect. I guess second text has less than 100 chars...', 'white', 'red'); 
Console::log('');   
Console::log('');   
Console::log('2) ' . Console::text('Using Console::pad()', 'white', 'magenta', 'bold', 'underline')); 
Console::log('');   
Console::log(Console::pad('I am normal inside ::pad() {padLength:100, padString:\'*\'}', 100, '*'));
Console::log(Console::pad(Console::text('I am colorized with ::text() inside ::pad() {padLength:100, padString:\'*\'}', 'blue'), 100, '*'));
Console::log('');   
Console::log('=> should be OK', 'white', 'green');
