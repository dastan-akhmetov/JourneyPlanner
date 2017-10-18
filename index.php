<?php

/**
 * Display errors for debugging.
 */
ini_set('display_errors', 1);

/**
 * Include Composer autoloader to
 * easily utilize classes.
 */
require __DIR__.'/vendor/autoload.php';

/**
 * Import boarding cards.
 */
$boardingCards = require __DIR__.'/BoardingCards.php';

/**
 * Instantiate a JourneyPlanner Class by
 * passing a boarding cards array to it
 */
$journeyPlanner = new Classes\JourneyPlanner($boardingCards);

/**
 * Call method 'plan' to finally display
 * the ordered result to a web page.
 */
echo $journeyPlanner->plan();
?>

<!-- Styling for better presentation -->
<style>
    * {
        line-height: 22px;
        font-size: 18px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    ul li {
        list-style-type: decimal;
        margin-left: 18px;
        color: #e4022e;
        margin-bottom: 25px;
    }
    ul li span {
        color: #333333;
    }
</style>
