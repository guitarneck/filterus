<?php

namespace Filterus\Filters;

class Objects extends \Filterus\Filter {

    private $default = null;

    protected $defaultOptions = array(
        'class' => '',
    );

    public function setDefault ($var) { $this->default = $var; }
    public function getDefault () { return $this->default; }

    public function filter($var) {
        if (!is_object($var)) {
            return $this->filterDefault();
        }
        if ($this->options['class'] && !$var instanceof $this->options['class']) {
            return $this->filterDefault();
        }

        return $var;
    }

    public function validate($var) {
        return $var === $this->filter($var);
    }

}
