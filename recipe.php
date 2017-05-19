<html>

<head>
    <title>Information Gathered</title>
    <script src="js/myscript.js"></script>
    <link rel="stylesheet" href="css/media.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- css link-->
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
</head>

<body id="recipe_page">
    <div id="wrapper">
        <header role="banner" class="navbar navbar-fixed-top">
            <div class="navbar-header">
                <a href="#menu-click" id="menu-click">
                    <div class="container" onclick="myFunction(this)">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </a>
            </div>
        </header>
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                </li>
                <li class="sidebar-brand">
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="kitchen.html"><i class="fa fa-cutlery"></i>My Kitchen</a>
                </li>
                <li>
                    <a href="qr-code-reader/index.html"><i class="fa fa-qrcode"></i>QR scanner</a>
                </li>
                <li>
                    <a href="recipe.php"><i class="fa fa-archive"></i>Recipes</a>
                </li>
                <li>
                    <a href="apps.html"><i class="fa fa-users"></i>Fuber Friends</a>
                </li>
            </ul>
        </div>
        <?php
  include("Spoonacular.php");
  require_once "vendor/autoload.php";
  $mash_key    = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
  $spoonacular = new Spoonacular($mash_key);
  $recipeId    = $_POST['ID'];
  $recipeName  = $_POST['name'];

  $recipeSteps = $spoonacular->getRecipeSteps($recipeId);
  $recipe_info = $spoonacular->getRecipeInfo($recipeId);

  echo '<div id="recipe_wrap"><img id="recipe_image"  src="' . $recipe_info->image . '">';
  echo '<div class="recipe_panel" id="instructions"><h3 id="recipe_name">' . $recipeName . '</h3><br>';
  if($recipe_info->preparationMinutes != 0){
    echo 'rep time: <span class="recipe_time">' . $recipe_info->preparationMinutes . " min</span><br>";
  }else {
    echo 'Prep time: <span class="recipe_time"> -- min</span><br>';
  }
  if($recipe_info->cookingMinutes != 0){
    echo 'Cook time: <span class="recipe_time>"' . $recipe_info->cookingMinutes . " min</span><br>";
  }else{
    echo 'Cook time:<span class="recipe_time"> -- min</span><br>';
  }
  echo "<br>Ingredient List:<br>";

  $ingredients = $recipe_info->extendedIngredients;
  foreach($ingredients as $ingredient){
    echo $ingredient->amount . " " . $ingredient->unit . " " . $ingredient->name . "<br>";
  }

  echo "<br>";

  foreach ($recipeSteps as $recipe) {
      $steps = $recipe->steps;
      foreach ($steps as $step) {
          echo "Step Number: " . $step->number . "<br>";
          echo "Step: " . $step->step . "<br><br>";
      }
  }

  echo '</div></div>'
  ?>
    </div>
</body>
<script src="js/navbar.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script src="js/firebaseScript.js"></script>

</html>
