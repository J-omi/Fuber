<?php

include('./firebase.php');

$firebase = new Firebase();

$firebase->createUser('paul', 2);

$user = $firebase->getUser('paul');

//echo $user;

$fridge = $firebase->getFridge(1);

$fridge_array = json_decode($fridge, true);

foreach ($fridge_array as $item => $content){
	echo $item . "\n";
	echo $content['expiration'] . "\n\n";
}


?>
