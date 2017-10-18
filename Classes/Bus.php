<?php

namespace Classes;


class Bus extends Transport
{
    /**
     * Seat number.
     * @var string|null
     */
    protected $seat;

    /**
     * Bus constructor.
     * @param array $boardingCard
     */
    public function __construct(array $boardingCard = [])
    {
        parent::__construct($boardingCard);
        $this->seat = isset($boardingCard['seat']) ? $boardingCard['seat'] : null;
    }

    /**
     * Prints out an information of a bus boarding card.
     * @return string
     */
    public function printAsString()
    {
        return $this->printType() . $this->printFrom() . $this->printTo() . '.' . $this->printSeat() . '.';
    }

    /**
     * Prints out a type of a transport.
     * @return string
     */
    protected function printType()
    {
        return 'Take the ' . $this->type;
    }

    /**
     * Prints out a seat number.
     * @return string
     */
    protected function printSeat()
    {
        return $this->seat ? ' Sit in seat ' . $this->seat : ' No seat assignment';
    }
}