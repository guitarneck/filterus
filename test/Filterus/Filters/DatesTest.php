<?php

namespace Filterus\Filters;

class DatesTest extends \PHPUnit_Framework_TestCase {

    public static function provideTestFilter() {

        $now = new \DateTime('now');

        return array(
            array(array(), '2020-04-15', '2020-04-15', true),
            array(array('format' => 'd/m/Y'), '2020-04-15', null, false),
            array(array('format' => 'd/m/Y'), '15/04/2020', '15/04/2020', true),
            array(array('default'=>''), '15/25/2020', $now->format(Dates::FORMAT_DEFAULT), true),
            array(array('format' => 'd/m/Y', 'default'=>serialize($now->format('Y-m-d'))), '15/25/2020', $now->format('d/m/Y'), true),
            array(array('format' => 'd/m/Y', 'default'=>serialize('1900-01-01')), '15/25/2020', '01/01/1900', true),
            array(array('format' => 'Y-m-d', 'default'=>serialize('1900-01-01')), '15/25/2020', '1900-01-01', true),
        );
    }

    /**
     * @dataProvider provideTestFilter
     */
    public function testFilter($options, $raw, $filtered, $valid) {
        $dates = new Dates($options);
        $this->assertEquals($filtered, $dates->filter($raw));
        $this->assertEquals($valid, $dates->validate($raw));
    }

}