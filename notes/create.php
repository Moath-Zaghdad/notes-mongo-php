<?php
$RootDirectory = "../";

if(empty($_POST['title']))
{
    header( "Location: $RootDirectory" ) ;
    exit;
}

require($RootDirectory.'ConnectToMongo.php');

$collection = $client->Notes->block;

$result = $collection->insertOne( 
    [ 
        'title' => $_POST['title'] , 
        'content' => [ $_POST['content'] ]
    ]);


echo "Inserted with Object ID '{$result->getInsertedId()}'";

header( "Location: $RootDirectory" ) ;

?> 