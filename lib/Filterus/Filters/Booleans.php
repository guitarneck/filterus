<?php

namespace Filterus\Filters;

class Booleans extends \Filterus\Filter {
    
    private $default = null;

    public function setDefault ($var) { $this->default = $var; }
    public function getDefault () { return $this->default; }

    public function filter($var) {
        return $this->filterDefault(filter_var($var, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE));
    }

    public function validate($var) {
        return $this->filter($var) !== null;
    }
}