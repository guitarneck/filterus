<?php

namespace Filterus\Filters;

class Moment extends Strings {
    
    const FORMAT_DEFAULT    = 'Y-m-d G:i:s';

    protected $default = 'now';

    protected $defaultOptions = array(
        'min'       => 10,
        'max'       => 10,
        'format'    => Moment::FORMAT_DEFAULT
    );

    public function setDefault ($var) { $this->default = $var; }
    public function getDefault () { 
        try {
            return (new \DateTime($this->default))->format($this->options['format']);
        } catch (\Exception $e) { return null; }
    }

    public function filter($var) {
        $var = parent::filter($var);
        try {
            $flt = \DateTime::createFromFormat($this->options['format'],$var);
            if ( $flt === false ) return $this->filterDefault();
            if ( $flt->format($this->options['format']) !== $var ) return $this->filterDefault();
        } catch (\Exception $e) { $var = $this->filterDefault(); }
        return $var;
    }

    public function validate($var) {
        return $this->filter($var) !== null;
    }
}