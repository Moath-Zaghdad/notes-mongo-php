<?php
$RootDirectory = "../";

require($RootDirectory.'ConnectToMongo.php');

$client->Notes->block->deleteOne([ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ]);

header( "Location: $RootDirectory" ) ;
?> 