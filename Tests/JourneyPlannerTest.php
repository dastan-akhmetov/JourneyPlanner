<?php

namespace Tests;


use Classes\JourneyPlanner;
use ReflectionClass;
use PHPUnit\Framework\TestCase;

/**
 * Class JourneyPlannerTest
 * @package App\Tests
 * @covers JourneyPlanner
 */
class JourneyPlannerTest extends TestCase
{
    /**
     * Sample data of boarding cards for testing.
     * @var array
     */
    protected $boardingCards = [
        [
            'type'          => 'airport bus',
            'from'          => 'miami',
            'to'            => 'new york',
            'travel_number' => '44',
            'seat'          => '18'
        ],
        [
            'type'          => 'flight',
            'from'          => 'new york',
            'to'            => 'paris',
            'travel_number' => '123A',
            'seat'          => '33'
        ],
        [
            'type'          => 'flight',
            'from'          => 'dubai',
            'to'            => 'washington',
            'travel_number' => '5545',
            'seat'          => '6'
        ],
        [
            'type'          => 'flight',
            'from'          => 'washington',
            'to'            => 'miami',
            'travel_number' => '9123A',
            'seat'          => '833'
        ],
        [
            'type'          => 'flight',
            'from'          => 'astana',
            'to'            => 'dubai',
            'travel_number' => '5545',
            'seat'          => '6'
        ],
        [
            'type'          => 'train',
            'from'          => 'almaty',
            'to'            => 'astana',
            'travel_number' => '5545',
            'seat'          => '6'
        ],
    ];

    /**
     * Test if an object is an instance of a JourneyPlanner Class.
     */
    public function testClassJourneyPlannerIsValid()
    {
        $journeyPlanner = new JourneyPlanner($this->boardingCards);
        $this->assertInstanceOf(JourneyPlanner::class, $journeyPlanner);
    }

    /**
     * Internal method to get private/protected properties of a class.
     * @param $name
     * @return \ReflectionProperty
     */
    protected static function getProperty($name) {
        $class      = new ReflectionClass(JourneyPlanner::class);
        $property   = $class->getProperty($name);
        $property->setAccessible(true);
        return $property;
    }

    /**
     * Internal method to get private/protected methods of a class.
     * @param $name
     * @return \ReflectionMethod
     */
    protected static function getMethod($name) {
        $class  = new ReflectionClass(JourneyPlanner::class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    /**
     * Test if method 'convertToArrayOfObjects' works correctly.
     */
    public function testMethodConvertToArrayOfObjectsIsValid()
    {
        $journeyPlanner = new JourneyPlanner($this->boardingCards);
        $property       = self::getProperty('boardingCards');
        $this->assertEquals('airport bus', $property->getValue($journeyPlanner)[0]->type);
    }

    /**
     * Test if method 'plan' works correctly.
     */
    public function testMethodPlanIsValid()
    {
        $journeyPlanner = new JourneyPlanner($this->boardingCards);
        $print = '<ul>';
        $print .= '<li><span>Take train 5545 from Almaty to Astana. Sit in seat 6.</span></li>';
        $print .= '<li><span>From Astana, take flight 5545 to Dubai. Seat 6. Baggage will be automatically transferred from your last leg.</span></li>';
        $print .= '<li><span>From Dubai, take flight 5545 to Washington. Seat 6. Baggage will be automatically transferred from your last leg.</span></li>';
        $print .= '<li><span>From Washington, take flight 9123A to Miami. Seat 833. Baggage will be automatically transferred from your last leg.</span></li>';
        $print .= '<li><span>Take the airport bus from Miami to New york. Sit in seat 18.</span></li>';
        $print .= '<li><span>From New york, take flight 123A to Paris. Seat 33. Baggage will be automatically transferred from your last leg.</span></li>';
        $print .= '<li><span>You have arrived at your final destination.</span></li>';
        $print .= '</ul>';
        $this->assertEquals($print, $journeyPlanner->plan());
    }

    /**
     * Test if method 'makeRoute' works correctly.
     */
    public function testMethodMakeRouteIsValid()
    {
        $method         = self::getMethod('makeRoute');
        $journeyPlanner = new JourneyPlanner($this->boardingCards);
        $route          = $journeyPlanner->convertToArrayOfObjects([
            $this->boardingCards[5],
            $this->boardingCards[4],
            $this->boardingCards[2],
            $this->boardingCards[3],
            $this->boardingCards[0],
            $this->boardingCards[1],
        ]);
        $route[]        = 'You have arrived at your final destination.';
        $makeRoute      = $method->invoke($journeyPlanner);
        $this->assertEquals($route, $makeRoute);
    }

    /**
     * Test if method 'findNext' works correctly.
     */
    public function testMethodFindNextIsValid()
    {
        $method = self::getMethod('findNext');
        $journeyPlanner = new JourneyPlanner($this->boardingCards);
        $firstPoint = 'Almaty';
        $findNext = $method->invokeArgs($journeyPlanner, [$firstPoint]);
        $this->assertEquals('Astana', $findNext->to);
    }

    /**
     * Test if method 'findEdge' with firstPoint parameter set to TRUE works correctly.
     */
    public function testMethodFindEdgeWithFirstPointIsValid()
    {
        $method         = self::getMethod('findEdge');
        $journeyPlanner = new JourneyPlanner($this->boardingCards);
        $firstPoint     = 'Almaty';
        $findEdge       = $method->invokeArgs($journeyPlanner, [true]);
        $this->assertEquals('Almaty', $findEdge);
    }

    /**
     * Test if method 'findEdge' with firstPoint parameter set to FALSE works correctly.
     */
    public function testMethodFindEdgeWithLastPointIsValid()
    {
        $method         = self::getMethod('findEdge');
        $journeyPlanner = new JourneyPlanner($this->boardingCards);
        $lastPoint      = 'Paris';
        $findEdge       = $method->invokeArgs($journeyPlanner, [false]);
        $this->assertEquals('Paris', $findEdge);
    }
}