<?php

namespace Filterus\Filters;

class TimesTest extends \PHPUnit_Framework_TestCase {
    
    public static function provideTestFilter() {

        $now = new \DateTime('now');

        return array(
            array(array(), '15:50:10', '15:50:10', true),
            array(array('format' => 'h:i:s'), '15:50:10', null, false),
            array(array('format' => 'g:i:s', 'min' => 7), '1:50:10', '1:50:10', true),
            array(array('default'=>''), '11:70:10', $now->format(Times::FORMAT_DEFAULT), true),
            array(array('format' => 'h:i:s', 'default'=>serialize($now->format('h:i:s'))), '4:20:31', $now->format('h:i:s'), true),
            array(array('format' => 'g:i:s', 'default'=>serialize('01:01:00')), '15:78:80', '1:01:00', true),
            array(array('format' => 'g:i:s', 'default'=>serialize('1:01:00')), '15:25:20', '1:01:00', true),
        );
    }

    /**
     * @dataProvider provideTestFilter
     */
    public function testFilter($options, $raw, $filtered, $valid) {
        $times = new Times($options);
        $this->assertEquals($filtered, $times->filter($raw));
        $this->assertEquals($valid, $times->validate($raw));
    }

}