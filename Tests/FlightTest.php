<?php

namespace Tests;

use Classes\Flight;
use ReflectionClass;
use PHPUnit\Framework\TestCase;

/**
 * Class FlightTest
 * @package App\Tests
 * @covers Flight
 */
class FlightTest extends TestCase
{
    /**
     * Test if an object is an instance of a Flight Class.
     */
    public function testClassFlightIsValid()
    {
        $flight = new Flight();
        $this->assertInstanceOf(Flight::class, $flight);
    }

    /**
     * Test if property 'from' assigns correctly.
     */
    public function testPropertyFromIsValid()
    {
        $flight = new Flight(['from' => 'New York']);
        $this->assertEquals('New York', $flight->from);
    }

    /**
     * Test if property 'to' assigns correctly.
     */
    public function testPropertyToIsValid()
    {
        $flight = new Flight(['to' => 'Dubai']);
        $this->assertEquals('Dubai', $flight->to);
    }

    /**
     * Test if property 'type' assigns correctly.
     */
    public function testPropertyTypeIsValid()
    {
        $flight = new Flight(['type' => 'flight']);
        $this->assertEquals('flight', $flight->type);
    }

    /**
     * Test if property 'travel_number' assigns correctly.
     */
    public function testPropertyTravelNumberIsValid()
    {
        $flight = new Flight(['travel_number' => '123A']);
        $this->assertEquals('123A', $flight->travel_number);
    }

    /**
     * Test if property 'seat' assigns correctly.
     */
    public function testPropertySeatIsValid()
    {
        $flight = new Flight(['seat' => '45']);
        $this->assertEquals('45', $flight->seat);
    }

    /**
     * Test if property 'gate' assigns correctly.
     */
    public function testPropertyGateIsValid()
    {
        $flight = new Flight(['gate' => '9F']);
        $this->assertEquals('9F', $flight->gate);
    }

    /**
     * Test if property 'baggage' assigns correctly.
     */
    public function testPropertyBaggageIsValid()
    {
        $flight = new Flight(['baggage' => '71']);
        $this->assertEquals('71', $flight->baggage);
    }

    /**
     * Internal method to get private/protected methods of a class.
     * @param $name
     * @return \ReflectionMethod
     */
    protected static function getMethod($name) {
        $class  = new ReflectionClass(Flight::class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    /**
     * Tests if method 'printBaggage' works correctly when
     * not provided a value.
     */
    public function testMethodPrintBaggageIfParameterIsNullIsValid()
    {
        $method         = self::getMethod('printBaggage');
        $flight         = new Flight();
        $printBaggage   = $method->invoke($flight);
        $this->assertEquals(' Baggage will be automatically transferred from your last leg', $printBaggage);
    }

    /**
     * Tests if method 'printBaggage' works correctly when
     * a value is provided.
     */
    public function testMethodPrintBaggageIfParameterIsProvidedIsValid()
    {
        $method         = self::getMethod('printBaggage');
        $flight         = new Flight(['baggage' => 11]);
        $printBaggage   = $method->invoke($flight);
        $this->assertEquals(' Baggage drop at ticket counter 11', $printBaggage);
    }

    /**
     * Test if method 'printAsString' works correctly.
     */
    public function testMethodPrintAsStringIsValid()
    {
        $flight = new Flight([
            'from'          => 'New York',
            'to'            => 'Dubai',
            'type'          => 'flight',
            'travel_number' => '123A',
            'seat'          => '45',
            'gate'          => '9F',
            'baggage'       => '71'
        ]);
        $this->assertEquals(
            'From New York, take flight 123A to Dubai. Gate 9F, seat 45. Baggage drop at ticket counter 71.',
            $flight->printAsString()
        );
    }
}