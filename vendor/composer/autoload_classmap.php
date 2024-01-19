<?php

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Kristuff\\Mishell\\Console'         => $baseDir . '/lib/Console.php',
    'Kristuff\\Mishell\\Program'          => $baseDir . '/lib/Program.php',
    'Kristuff\\Mishell\\ShellPrinter'      => $baseDir . '/lib/ShellPrinter.php',
    'Kristuff\\Mishell\\ShellTablePrinter'  => $baseDir . '/lib/ShellTablePrinter.php',
    'Kristuff\\Mishell\\ShellColoredPrinter' => $baseDir . '/lib/ShellColoredPrinter.php',
    'Composer\\InstalledVersions'             => $vendorDir . '/composer/InstalledVersions.php',
);
