
![logo](doc/screenshots/loading.png)

# Kristuff miShell 

> A mini PHP library to build beautiful CLI apps and reports

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/4fd3728ced2b4d95b0eb549db7a0053b)](https://www.codacy.com/app/kristuff_/mishell?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=kristuff/patabase&amp;utm_campaign=Badge_Grade)
[![Code Climate](https://codeclimate.com/github/kristuff/mishell/badges/gpa.svg)](https://codeclimate.com/github/kristuff/mishell)

- [Features](#features) 
- [Requirements](#requirements) 
- [Install](#install) 
- [Documentation](#Documentation)
- [License](#license) 


Features
--------
- Writing methods:
    - Basic or colored/stylized text
    - Tables
    - Progress message
- Get user inputs
    - standard text input
    - hidden text input (no supported on Windows)
    - numeric values   
- Open new/restore 'window' (no supported on Windows)
- Run the bell

Requirements
------------
- PHP >= 5.6

Install
--------
- Deploy with your project (in `composer.json`):
```
{
    ...
    "require": {
        "kristuff/mishell": "0.*"
    }
}
```

Run the sample
--------
![logo](doc/screenshots/index.png)

- clone this project (demo and doc folers are excluded from dist)
    ```bash
    $ git clone https://github.com/kristuff/mishell.git
    ```
- go to mishell folder
    ```bash
    $ cd mishell
    ```
- install (it just builds autoloader)
    ```bash
    $ composer install
    ```
- run sample
    ```bash
    $ php demo/index.php
    ```

Documentation
--------

1. [Overview](#1-overview)
2. [Api methods](#2)


...TODO...

## 1. Overview

The lib consists of one class `\Kristuff\Mishell\Console` that contains mainly 3 types of methods:
    - writing methods (normal or stylized/colorized text) : echo something
    - stylized/colorized CLI text builder methods : return a string       
    - layout string builder methods (tables, padding) : return a string

To be more flexible, most writing/text/layout builder methods take an indefinite number of arguments called in this document as [styles]. 
The arguments are analyzed as follows:
    - First argument that matchs to known foreground color is taken as foreground color.
    - First argument that matchs to known background color (when a foreground is already define) is taken as foreground color.   
    - Other arguments that match to known option color are taken as option.

## 2. Api methods

-  `Console::text($str, [styles])`  
    Gets a formatted string to be returned in the console 
    
    Returns `string`
-  `Console::log($str, [styles])`   
    Writes a formatted string in the console with new line
    
    Returns `void`
-  `Console::reLog($str, [styles])`
    Writes or overwites the curren line.
    
    Returns `void`
-  `Console::ask($str, [styles])`   
    Writes a formatted string in the console and waits for an input.

    Returns `string`
-  `Console::askInt($str, [styles])` 
    Writes a formatted string in the console and waits for an int input.
    Returns `int`|`bool`    



License
-------

The MIT License (MIT)

Copyright (c) 2017 Kristuff

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
