<?php

$variable = $_POST['test'];

$food_array = explode("|" , $variable);

#echo "It worked! " . $variable;

include('./firebase.php');
$firebase = new Firebase();

$counter = 0;
$ingredient_array = array();
foreach($food_array as $food){
  $ingredient_array[$counter]  
}















include('firebase.php');
$firebase = new Firebase();
if($_POST != null || $_POST != ""){
  $firebase->createIngredient(1, $_POST['food'], $_POST['expiration'], $_POST['quantity']);
}

header("Location: ingredients.php");
exit();

?>
