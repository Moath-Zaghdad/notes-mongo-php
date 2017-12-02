<?php
// http://php.net/manual/en/mongodb.tutorial.library.php

$HOST = "localhost";
$PORT = "27017";
// $USERNAME = "";
// $PASSWORD = "";



require $RootDirectory.'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://$HOST:$PORT");


?>