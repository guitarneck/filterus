<?php

$files = ['vendor/autoload.php','__autoload.php'];
foreach ( $files as $file ) if ( file_exists($file)  ) include $file;

use Filterus\Filter;

$dft_null = serialize(null);
$dft_cent = serialize('my two cents');

$LOL_NOT_VALID = 4;
$LOL_VALID = 3;

$filter = Filter::map(
    array(
        'foo' => 'string,min:4,default:'.$dft_null,
        'nop' => 'string,min:4,default:'.$dft_cent,
        'rol' => 'string,min:4,default:',
        'lol' => 'string,min:'.$LOL_NOT_VALID
    ));
$tmp = array('foo' => 'bar','nop'=>'zop','rol'=>'map','lol'=>'mdr');

var_dump(Filter::factory($filter)->filter($tmp));
var_dump(Filter::factory($filter)->validate($tmp));

$filter = Filter::map(
    array(
        'foo' => 'string,min:4,default:'.$dft_null,
        'nop' => 'string,min:4,default:'.$dft_cent,
        'rol' => 'string,min:4,default:',
        'lol' => 'string,min:'.$LOL_VALID
    ));
$tmp = array('foo' => 'barrr','nop'=>'zop','rol'=>'map','lol'=>'mdr');

echo PHP_EOL;