<?php

namespace Classes;


class Transport
{
    /**
     * Departing point.
     * @var string|null
     */
    protected $from;

    /**
     * Arriving point.
     * @var string|null
     */
    protected $to;

    /**
     * Type of transport.
     * @var string|null
     */
    protected $type;

    /**
     * Transport constructor.
     * @param array $boardingCard
     */
    public function __construct(array $boardingCard = [])
    {
        $this->from = isset($boardingCard['from'])  ? ucfirst($boardingCard['from'])    : null;
        $this->to   = isset($boardingCard['to'])    ? ucfirst($boardingCard['to'])      : null;
        $this->type = isset($boardingCard['type'])  ? $boardingCard['type']             : null;
    }

    /**
     * Prints out an object as a string.
     * @return string
     */
    public function __toString()
    {
        return $this->printAsString();
    }

    /**
     * Prints out an information of a current transport boarding card.
     * @return string
     */
    public function printAsString()
    {
        return $this->printType() . $this->printFrom() . $this->printTo() . '.';
    }

    /**
     * Prints out a type of a transport.
     * @return string
     */
    protected function printType()
    {
        return 'Take ' . $this->type;
    }

    /**
     * Prints out a departing point.
     * @return string
     */
    protected function printFrom()
    {
        return ' from ' . $this->from;
    }

    /**
     * Prints out an arriving point.
     * @return string
     */
    protected function printTo()
    {
        return ' to ' . $this->to;
    }

    /**
     * Getter.
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            return false;
        }

        return $this->{$name};
    }
}