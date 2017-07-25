<?php
require_once __DIR__ .'/../vendor/autoload.php';
use Kristuff\Mishell\Console;

Console::log('Overview:', 'underline', 'bold');
Console::log("  - Use Console::pad(\$str[, \$input[, \$padLength[, \$padString = ' '[, \$padType = STR_PAD_RIGHT]]]]) to get a text with given padding.", 'white');
Console::log("  - The method is equivalent to php str_pad() method, except that it handles not printable ANSI chars.", 'white');
Console::log('');   
Console::log('Sample:', 'underline', 'bold');
Console::log(Console::pad('I am normal inside ::pad() {padLength:100, padString:\'*\'}', 100, '*'));
Console::log(Console::pad(Console::text('I am colorized with ::text() inside ::pad() {padLength:100, padString:\'*\'}', 'white', 'blue'), 100, '*'), 'white', 'blue');
