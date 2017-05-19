<?php

include('./firebase.php');

$firebase = new Firebase();

$firebase->createIngredient(2, "Apple", 4, 10);

//echo $user;
/*
$fridge = $firebase->getFridge(1);

$fridge_array = json_decode($fridge, true);

foreach ($fridge_array as $item => $content){
	echo $item . "\n";
	echo $content['expiration'] . "\n\n";
}
*/
$fridge_array = json_decode($firebase->readIngredient(1), true);

foreach($fridge_array as $foods => $content){
  echo "Food: " . $foods . "\n";
  echo "Expires in " . $content['expirationDays'] . " days\n";
  echo "Quantity: " . $content['quantity'] . "\n\n";
}


?>
