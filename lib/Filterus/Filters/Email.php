<?php

namespace Filterus\Filters;

class Email extends \Filterus\Filter {

    public function setDefault ($var) {}
    public function getDefault () {}
    
    public function filter($var) {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

}