<?php
  include('firebase.php');
  $firebase = new Firebase();

  $uid = $_COOKIE['uid'];

  if($_POST != null || $_POST != ""){
    $firebase->createIngredient($uid, $_POST['food'], $_POST['expiration'], $_POST['quantity']);
  }

  header("Location: ingredients.php");
  exit();

  ?>
