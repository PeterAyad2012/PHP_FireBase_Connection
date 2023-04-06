<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('tickets-ds-firebase-adminsdk-lqod8-afc5a9b9f3.json')
    ->withDatabaseUri('https://tickets-ds-default-rtdb.firebaseio.com');

$database = $factory->createDatabase();
?>