<?php

namespace Filterus\Filters;

class Raw extends \Filterus\Filter {

    public function setDefault ($var) {}
    public function getDefault () {}
    
    public function filter($var) {
        return $var;
    }
}