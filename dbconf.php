<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('reserve-tickets-firebase-adminsdk-dpb3h-57ecb9501d.json')
    ->withDatabaseUri('https://reserve-tickets-default-rtdb.firebaseio.com');

$database = $factory->createDatabase();
?>