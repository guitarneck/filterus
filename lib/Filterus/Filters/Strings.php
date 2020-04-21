<?php

namespace Filterus\Filters;

class Strings extends \Filterus\Filter {
    
    private $default = '';

    protected $defaultOptions = array(
        'min' => 0,
        'max' => PHP_INT_MAX,
    );

    public function setDefault ($var) { $this->default = $var; }
    public function getDefault () { return $this->default; }

    public function filter($var) {
        if (is_object($var) && method_exists($var, '__toString')) {
            $var = (string) $var;
        }
        if (!is_scalar($var)) {
            return $this->filterDefault();
        }
        $var = (string) $var;
        if ($this->options['min'] > strlen($var)) {
            return $this->filterDefault();
        } elseif ($this->options['max'] < strlen($var)) {
            return $this->filterDefault();
        }
        return $var;
    }

    public function validate($var) {
        if (is_object($var) && method_exists($var, '__toString')) {
            $var = (string) $var;
        }
        return parent::validate($var);
    }
}