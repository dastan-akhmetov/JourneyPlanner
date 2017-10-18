<?php

namespace Tests;


use Classes\Transport;
use PHPUnit\Framework\TestCase;

/**
 * Class TransportTest
 * @package App\Tests
 * @covers Transport
 */
class TransportTest extends TestCase
{
    /**
     * Test if an object is an instance of a Transport Class.
     */
    public function testClassTransportIsValid()
    {
        $transport = new Transport();
        $this->assertInstanceOf(Transport::class, $transport);
    }

    /**
     * Test if property 'from' assigns correctly.
     */
    public function testPropertyFromIsValid()
    {
        $transport = new Transport(['from' => 'New York']);
        $this->assertEquals('New York', $transport->from);
    }

    /**
     * Test if property 'to' assigns correctly.
     */
    public function testPropertyToIsValid()
    {
        $transport = new Transport(['to' => 'Dubai']);
        $this->assertEquals('Dubai', $transport->to);
    }

    /**
     * Test if property 'type' assigns correctly.
     */
    public function testPropertyTypeIsValid()
    {
        $transport = new Transport(['type' => 'transport']);
        $this->assertEquals('transport', $transport->type);
    }

    /**
     * Test if method 'printAsString' works correctly.
     */
    public function testMethodPrintAsStringIsValid()
    {
        $transport = new Transport([
            'from'  => 'New York',
            'to'    => 'Dubai',
            'type'  => 'ferry'
        ]);
        $this->assertEquals('Take ferry from New York to Dubai.', $transport->printAsString());
    }
}