<html>
<head>
</head>
<body>
<?php

include('../firebase.php');
$firebase = new Firebase();
$location = 'location="../ingredients.php"';

$food_list = $_POST['test'];

$foods = explode(":",$food_list);

/*
foreach($foods as $food){
  $food_info = explode(",",$food);
  echo $food_info[0] . '<br>';
  echo 'Expires in: ' . $food_info[1] . ' days <br>';
  echo 'Quantity: ' . $food_info[2] . '<br><br>';
}

echo '<input type="button" value="Say Hi!" onclick="' . $location . '" />';
*/


foreach($foods as $food){
  $food_info = explode(",",$food);
  $firebase->createIngredient(1, $food_info[0], $food_info[1], $food_info[2]);
}

header("Location: ../ingredients.php");
exit();


?>
</body>
</html>
