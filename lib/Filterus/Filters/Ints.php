<?php

namespace Filterus\Filters;

defined('PHP_INT_MIN') or define('PHP_INT_MIN', ~PHP_INT_MAX);

class Ints extends \Filterus\Filter {
    
    private $default = 0;

    protected $defaultOptions = array(
        'min' => PHP_INT_MIN,
        'max' => PHP_INT_MAX,
    );

    public function setDefault ($var) { $this->default = $var; }
    public function getDefault () { return $this->default; }

    public function filter($var) {
        if (!is_numeric($var)) {
            return $this->filterDefault();
        }
        $var = (int) $var;
        if ($this->options['min'] > $var) {
            return $this->filterDefault($this->options['min']);
        } elseif ($this->options['max'] < $var) {
            return $this->filterDefault($this->options['max']);
        }
        return $var;
    }

    public function validate($var) {
        if (!is_numeric($var)) {
            return false;
        }
        return parent::validate($var);
    }
}