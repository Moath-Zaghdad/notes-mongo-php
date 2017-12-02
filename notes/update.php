<?php
$RootDirectory = "../";

if(empty($_POST['title']) || empty($_POST['id']))
{
	header( "Location: $RootDirectory" ) ;
	exit;
}

require($RootDirectory.'ConnectToMongo.php');

$client->Notes->block->updateOne(
	[ '_id' => new MongoDB\BSON\ObjectId($_POST['id']) ],
	[
		'$set' => [
			'title' => $_POST['title'] , 
			'content' => [ $_POST['content'] ] 
		],
		'$currentDate' => ['lastModified' => true],
	]);

header( "Location: $RootDirectory" ) ;
?> 