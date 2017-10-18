<?php

namespace Tests;


use Classes\Bus;
use PHPUnit\Framework\TestCase;

/**
 * Class BusTest
 * @package App\Tests
 * @covers Bus
 */
class BusTest extends TestCase
{
    /**
     * Test if an object is an instance of a Bus Class.
     */
    public function testClassBusIsValid()
    {
        $bus = new Bus();
        $this->assertInstanceOf(Bus::class, $bus);
    }

    /**
     * Test if property 'from' assigns correctly.
     */
    public function testPropertyFromIsValid()
    {
        $bus = new Bus(['from' => 'Abu Dhabi']);
        $this->assertEquals('Abu Dhabi', $bus->from);
    }

    /**
     * Test if property 'to' assigns correctly.
     */
    public function testPropertyToIsValid()
    {
        $bus = new Bus(['to' => 'Dubai']);
        $this->assertEquals('Dubai', $bus->to);
    }

    /**
     * Test if property 'type' assigns correctly.
     */
    public function testPropertyTypeIsValid()
    {
        $bus = new Bus(['type' => 'bus']);
        $this->assertEquals('bus', $bus->type);
    }

    /**
     * Test if property 'seat' assigns correctly.
     */
    public function testPropertySeatIsValid()
    {
        $bus = new Bus(['seat' => '42B']);
        $this->assertEquals('42B', $bus->seat);
    }

    /**
     * Test if method 'printAsString' works correctly.
     */
    public function testMethodPrintAsStringIsValid()
    {
        $bus = new Bus([
            'from'  => 'Abu Dhabi',
            'to'    => 'Dubai',
            'type'  => 'bus'
        ]);
        $this->assertEquals('Take the bus from Abu Dhabi to Dubai. No seat assignment.', $bus->printAsString());
    }
}