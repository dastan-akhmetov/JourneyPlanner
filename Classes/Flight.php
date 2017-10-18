<?php

namespace Classes;


class Flight extends Transport
{
    /**
     * Flight number.
     * @var string|null
     */
    protected $travel_number;

    /**
     * Seat number.
     * @var string|null
     */
    protected $seat;

    /**
     * Gate number.
     * @var string|null
     */
    protected $gate;

    /**
     * Baggage.
     * @var string|null
     */
    protected $baggage;

    /**
     * Flight constructor.
     * @param array $boardingCard
     */
    public function __construct(array $boardingCard = [])
    {
        parent::__construct($boardingCard);
        $this->travel_number    = isset($boardingCard['travel_number']) ? $boardingCard['travel_number']    : null;
        $this->seat             = isset($boardingCard['seat'])          ? $boardingCard['seat']             : null;
        $this->gate             = isset($boardingCard['gate'])          ? $boardingCard['gate']             : null;
        $this->baggage          = isset($boardingCard['baggage'])       ? $boardingCard['baggage']          : null;
    }

    /**
     * Prints out an information of a flight boarding card.
     * @return string
     */
    public function printAsString()
    {
        return  $this->printFrom() .
                $this->printType() .
                $this->printTravelNumber() .
                $this->printTo() . '.' .
                $this->printGate() .
                $this->printSeat() . '.' .
                $this->printBaggage() . '.';
    }

    /**
     * Prints out a type of a transport.
     * @return string
     */
    protected function printType()
    {
        return ' take ' . $this->type;
    }

    /**
     * Prints out a departing point.
     * @return string
     */
    protected function printFrom()
    {
        return 'From ' . $this->from . ',';
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
     * Prints out a gate number.
     * @return null|string
     */
    protected function printGate()
    {
        return $this->gate ? ' Gate ' . $this->gate : null;
    }

    /**
     * Prints out a seat number.
     * @return null|string
     */
    protected function printSeat()
    {
        return $this->seat ? ($this->gate ? ', seat ' . $this->seat : ' Seat ' . $this->seat) : null;
    }

    /**
     * Prints out a baggage drop information.
     * @return null|int
     */
    protected function printBaggage()
    {
        return $this->baggage ? ' Baggage drop at ticket counter ' . $this->baggage : ' Baggage will be automatically transferred from your last leg';
    }
}