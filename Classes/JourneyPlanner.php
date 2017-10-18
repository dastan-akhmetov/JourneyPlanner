<?php

namespace Classes;


class JourneyPlanner
{
    /**
     * Array of boarding cards.
     * @var array
     */
    private $boardingCards;

    /**
     * JourneyPlanner constructor.
     * @param array $boardingCards
     */
    public function __construct(array $boardingCards)
    {
        $this->boardingCards = $this->convertToArrayOfObjects($boardingCards);
    }

    /**
     * Converts from array of arrays to array of objects.
     * @param array $boardingCards
     * @return array
     */
    public function convertToArrayOfObjects(array $boardingCards)
    {
        $boardingCardsObjects = [];

        foreach ($boardingCards as $boardingCard) {
            $transport = null;

            switch ($boardingCard['type']) {
                case 'flight'       : $transport = new Flight($boardingCard);       break;
                case 'airport bus'  : $transport = new AirportBus($boardingCard);   break;
                case 'bus'          : $transport = new Bus($boardingCard);          break;
                case 'train'        : $transport = new Train($boardingCard);        break;
                default             : $transport = null;
            }

            $boardingCardsObjects[] = $transport;
        }

        return $boardingCardsObjects;
    }

    /**
     * Display a journey route to HTML page.
     * @internal param $boardingCards
     * @return string
     */
    public function plan()
    {
        $route = $this->makeRoute();

        $print = '<ul>';
        foreach ($route as $point) {
            $print .= '<li>';
            $print .= '<span>' . $point . '</span>';
            $print .= '</li>';
        }
        $print .= '</ul>';

        return $print;
    }

    /**
     * Puts in a right order a sequence of boarding cards.
     * @return array
     */
    private function makeRoute()
    {
        $route          = [];
        $isFinished     = false;

        $firstPoint     = $this->findEdge(true);
        $lastPoint      = $this->findEdge(false);
        $route[]        = $this->findNext($firstPoint);
        $next           = $this->findNext($firstPoint);

        do {
            $next           = $this->findNext($next->to, $this->boardingCards);
            $route[]        = $next;

            if ($next->to === $lastPoint) {
                $isFinished = true;
            }

        } while($isFinished === false);

        $route[] = 'You have arrived at your final destination.';

        return $route;
    }

    /**
     * Finds next destination.
     * @param $to
     * @return mixed
     * @internal param $boardingCards
     */
    private function findNext(string $to)
    {
        $next = null;

        foreach ($this->boardingCards as $boardingCard) {
            if ($boardingCard->from === $to) {
                $next = $boardingCard;
            }
        }

        return $next;
    }

    /**
     * Finds first and last points in a given journey.
     * @param bool $first
     * @return string
     * @internal param $boardingCards
     */
    private function findEdge(bool $first = true)
    {
        $firstPoint = '';
        $lastPoint  = '';

        foreach ($this->boardingCards as $key1 => $value1) {
            $countFirst = 0;
            $countLast  = 0;

            foreach ($this->boardingCards as $key2 => $value2) {
                if ($first && $this->boardingCards[$key1]->from !== $this->boardingCards[$key2]->to) {
                    $countFirst++;
                } else if (!$first && $this->boardingCards[$key1]->to !== $this->boardingCards[$key2]->from) {
                    $countLast++;
                }
            }

            if ($countFirst === count($this->boardingCards)) {
                $firstPoint .= $this->boardingCards[$key1]->from;
            }
            if ($countLast === count($this->boardingCards)) {
                $lastPoint .= $this->boardingCards[$key1]->to;
            }
        }

        return $first ? $firstPoint : $lastPoint;
    }
}