<?php

namespace Filterus\Filters;

class Times extends Moment {

    const FORMAT_DEFAULT = 'H:i:s';
    
    protected $defaultOptions = array(
        'min'       => 8,
        'max'       => 8,
        'format'    => Times::FORMAT_DEFAULT
    );

}