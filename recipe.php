<html>

<head>
    <title>Information Gathered</title>
    <script src="js/myscript.js"></script>
    <link rel="stylesheet" href="css/media.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/test.css">
    <!-- js -->
    <script src="js/jquery.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
    <script src="js/firebaseScript.js"></script>
</head>

<body id="recipe_page">
    <nav id="menu" class="menu">
        <ul class="sidebar-nav">
            <li>
                <a href="index.html"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="ingredients.php"><i class="fa fa-cutlery"></i>My Kitchen</a>
            </li>
            <li>
                <a href="qr-code-reader/index.html"><i class="fa fa-qrcode"></i>QR scanner</a>
            </li>
            <li>
                <a href="kitchen.html"><i class="fa fa-archive"></i>Recipes</a>
            </li>
            <li>
                <a href="apps.html"><i class="fa fa-users"></i>Fuber Friends</a>
            </li>
        </ul>
    </nav>
    <main id="panel" class="panel">
        <button class="btn-hamburger js-slideout-toggle">
                <div class="container" onclick="myFunction(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
        </button>
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
  echo '<div class="recipe_panel" id="instructions"><div id="recipe_content"><h1 id="recipe_name">' . $recipeName . '</h1><br>';
  echo '<div class="prep">';
  if($recipe_info->preparationMinutes != 0){
    echo 'Preparation time: <span class="recipe_time">' . $recipe_info->preparationMinutes . " min</span><br>";
  }else {
    echo 'Preparation time: <span class="recipe_time"> -- min</span><br>';
  }
  if($recipe_info->cookingMinutes != 0){
    echo 'Cook time: <span class="recipe_time">' . $recipe_info->cookingMinutes . " min</span><br>";
  }else{
    echo 'Cook time:<span class="recipe_time"> -- min</span><br>';
  }
  echo '</div><br><div id="ingredients_section"><h2 class="recipe_header">Ingredient List</h2>';
  $ingredients = $recipe_info->extendedIngredients;
  foreach($ingredients as $ingredient){
    echo '<div id="ingredient_list">' . $ingredient->amount . " " . $ingredient->unit . " " . $ingredient->name . "</div><br>";
  }

  echo '</div><br><h2 class="recipe_header">Directions</h2>';

  foreach ($recipeSteps as $recipe) {
      $steps = $recipe->steps;
      foreach ($steps as $step) {
          echo '<div id="recipe_step"><div id="step_number">' . $step->number . "</div>";
          echo '<div id="step_detail">' . $step->step . "</div></div>";
      }
  }

  echo '</div></div></div>'
  ?>
    </main>
</body>
<script src="js/slideout.js"></script>

</html>
