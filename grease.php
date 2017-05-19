<?php
  include('firebase.php');
  $firebase = new Firebase();
  if($_POST != null || $_POST != ""){
    $firebase->createIngredient(1, $_POST['food'], $_POST['expiration'], $_POST['quantity']);
  }

  header("Location: ingredients.php");
  exit();

  ?>
