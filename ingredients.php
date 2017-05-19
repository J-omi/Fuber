<html>
<head>
   <script src="js/jquery.js"></script>
   <script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
   <script src="js/firebaseScript.js"></script>
</head>
<body>
  <?php
  include("Spoonacular.php");
  require_once "vendor/autoload.php";
  $mash_key    = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
  $spoonacular = new Spoonacular($mash_key);

    include('firebase.php');

    $firebase = new Firebase();
    $fridge = json_decode($firebase->readIngredient(1), true);
    $ingredient = "";
    #var_dump($spoonacular->getIngredientImage());
    foreach($fridge as $foods => $content){
      #echo '<img src="' . $spoonacular->getIngredientImage($foods)->image . '"><br>';
      echo "<form id='food'>";
      echo "Food: " . $foods . "<br>";
      echo "Expires in " . $content['expirationDays'] . " days<br>";
      echo "Quantity: " . $content['quantity'] . "<br>";
      echo "<button class='removeBtn' id='".$foods."'>Remove</button><br><br>";
      echo "</form>";
      $ingredient = $ingredient . "|" . $foods;
    }
    $ingredients = explode("|", $ingredient);
    echo '<form id="recipes" action="spoon.php" method="post">';
    foreach($ingredients as $ingredient){
      echo '<input type="hidden" id="textBox" name="ingredient" value="'.$ingredient.'"/><br>';
    }
    echo '<input type="submit" value="Generate Recipes"><br><br>';
    echo '</form>';
    ?>

    <form id="food" action="grease.php" method="post">
     Food: <input type="text" name="food" value=""><br>
     Expiration: <input type="text" name="expiration" value=""><br>
     Quantity: <input type="text" name="quantity" value=""><br>
     <input type="submit" value="Submit">
   </form>
  </body>
  </html>
