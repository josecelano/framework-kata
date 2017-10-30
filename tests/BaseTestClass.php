<?php

namespace JoseCelano\Tests;

class BaseTestClass extends \PHPUnit_Framework_TestCase
{
    protected $object;

    protected function expect($object)
    {
        $this->object = $object;
        return $this;
    }

    protected function toBe($object)
    {
        $this->assertEquals($this->object, $object);
    }
}