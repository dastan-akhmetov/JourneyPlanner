<?php

namespace Classes;


class Train extends Transport
{
    /**
     * Travel number.
     * @var string
     */
    protected $travel_number;

    /**
     * Seat number.
     * @var string
     */
    protected $seat;

    /**
     * Train constructor.
     * @param array $boardingCard
     */
    public function __construct(array $boardingCard = [])
    {
        parent::__construct($boardingCard);
        $this->travel_number    = isset($boardingCard['travel_number']) ? $boardingCard['travel_number']    : null;
        $this->seat             = isset($boardingCard['seat'])          ? $boardingCard['seat']             : null;
    }

    /**
     * Prints out a type of a transport.
     * @return string
     */
    public function printAsString()
    {
        return $this->printType() . $this->printTravelNumber() . $this->printFrom() . $this->printTo() . '.' . $this->printSeat() . '.';
    }

    /**
     * Prints out a flight number.
     * @return string
     */
    protected function printTravelNumber()
    {
        return ' ' . $this->travel_number;
    }

    /**
     * Prints out a seat number.
     * @return string
     */
    protected function printSeat()
    {
        return ' Sit in seat ' . $this->seat;
    }
}