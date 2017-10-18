<?php

namespace Tests;


use Classes\AirportBus;
use PHPUnit\Framework\TestCase;

/**
 * Class AirportBusTest
 * @package App\Tests
 * @covers AirportBus
 */
class AirportBusTest extends TestCase
{
    /**
     * Test if an object is an instance of an AirportBus Class.
     */
    public function testClassAirportBusIsValid()
    {
        $airportBus = new AirportBus();
        $this->assertInstanceOf(AirportBus::class, $airportBus);
    }

    /**
     * Test if property 'from' assigns correctly.
     */
    public function testPropertyFromIsValid()
    {
        $airportBus = new AirportBus(['from' => 'Abu Dhabi']);
        $this->assertEquals('Abu Dhabi', $airportBus->from);
    }

    /**
     * Test if property 'to' assigns correctly.
     */
    public function testPropertyToIsValid()
    {
        $airportBus = new AirportBus(['to' => 'Dubai']);
        $this->assertEquals('Dubai', $airportBus->to);
    }

    /**
     * Test if property 'type' assigns correctly.
     */
    public function testPropertyTypeIsValid()
    {
        $airportBus = new AirportBus(['type' => 'airport bus']);
        $this->assertEquals('airport bus', $airportBus->type);
    }

    /**
     * Test if property 'seat' assigns correctly.
     */
    public function testPropertySeatIsValid()
    {
        $airportBus = new AirportBus(['seat' => '42B']);
        $this->assertEquals('42B', $airportBus->seat);
    }

    /**
     * Test if method 'printAsString' works correctly.
     */
    public function testMethodPrintAsStringIsValid()
    {
        $airportBus = new AirportBus([
            'from'  => 'Abu Dhabi',
            'to'    => 'Dubai',
            'type'  => 'airport bus'
        ]);
        $this->assertEquals('Take the airport bus from Abu Dhabi to Dubai. No seat assignment.', $airportBus->printAsString());
    }
}