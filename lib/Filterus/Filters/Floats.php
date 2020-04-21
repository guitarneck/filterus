<?php

namespace Filterus\Filters;

class Floats extends \Filterus\Filter {

    private $default = 0.0;

    protected $defaultOptions = array(
        'min' => null,
        'max' => null,
    );

    public function setDefault ($var) { $this->default = $var; }
    public function getDefault () { return $this->default; }

    public function filter($var) {
        if (!is_numeric($var)) {
            return $this->filterDefault();
        }
        $var = (float) $var;
        if (null !== $this->options['min'] && $this->options['min'] > $var) {
            return $this->filterDefault($this->options['min']);
        } elseif (null !== $this->options['max'] && $this->options['max'] < $var) {
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