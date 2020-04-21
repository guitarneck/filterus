<?php

namespace Filterus\Filters;

class Dates extends Moment {
    
    const FORMAT_DEFAULT = 'Y-m-d';

    protected $defaultOptions = array(
        'min'       => 10,
        'max'       => 10,
        'format'    => Dates::FORMAT_DEFAULT
    );

}