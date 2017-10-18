<?php

namespace Tests;


use Classes\Train;
use PHPUnit\Framework\TestCase;

/**
 * Class TrainTest
 * @package App\Tests
 * @covers Train
 */
class TrainTest extends TestCase
{
    /**
     * Test if an object is an instance of a Train Class.
     */
    public function testClassTrainIsValid()
    {
        $train = new Train();
        $this->assertInstanceOf(Train::class, $train);
    }

    /**
     * Test if property 'from' assigns correctly.
     */
    public function testPropertyFromIsValid()
    {
        $train = new Train(['from' => 'New York']);
        $this->assertEquals('New York', $train->from);
    }

    /**
     * Test if property 'to' assigns correctly.
     */
    public function testPropertyToIsValid()
    {
        $train = new Train(['to' => 'Dubai']);
        $this->assertEquals('Dubai', $train->to);
    }

    /**
     * Test if property 'type' assigns correctly.
     */
    public function testPropertyTypeIsValid()
    {
        $train = new Train(['type' => 'train']);
        $this->assertEquals('train', $train->type);
    }

    /**
     * Test if property 'travel_number' assigns correctly.
     */
    public function testPropertyTravelNumberIsValid()
    {
        $train = new Train(['travel_number' => '551GD']);
        $this->assertEquals('551GD', $train->travel_number);
    }

    /**
     * Test if property 'seat' assigns correctly.
     */
    public function testPropertySeatIsValid()
    {
        $train = new Train(['seat' => '13']);
        $this->assertEquals('13', $train->seat);
    }

    /**
     * Test if method 'printAsString' works correctly.
     */
    public function testMethodPrintAsStringIsValid()
    {
        $train = new Train([
            'from'              => 'Abu Dhabi',
            'to'                => 'Dubai',
            'type'              => 'train',
            'travel_number'     => '551GD',
            'seat'              => '13'
        ]);
        $this->assertEquals('Take train 551GD from Abu Dhabi to Dubai. Sit in seat 13.', $train->printAsString());
    }
}