<?php

include('../firebase.php');
$firebase = new Firebase();

$food_list = $_POST['test'];

$foods = explode(":",$food_list);

foreach($foods as $food){
  $food_info = explode(",",$food);
  $firebase->createIngredient(1, $food_info[0], $food_info[1], $food_info[2]);
}

header("Location: ../ingredients.php");
exit();
?>
