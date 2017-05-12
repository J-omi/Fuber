<html>
<head>
    <title>Information Gathered</title>
    <link rel="stylesheet" href="css/desktop.css">
    <link rel="stylesheet" href="css/mobile.css">
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>

  <?php
    include("Spoonacular.php");
    require_once "vendor/autoload.php";
    $mash_key    = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
    $spoonacular = new Spoonacular($mash_key);
    $recipeId    = $_POST['ID'];

    $recipeSteps = $spoonacular->getRecipeSteps($recipeId);
    $recipe_info = $spoonacular->getRecipeInfo($recipeId);

    echo '<img src="' . $recipe_info->image . '"><br>';
    echo "Prep time: " . $recipe_info->preparationMinutes . " minutes<br>";
    echo "Cook time: " . $recipe_info->cookingMinutes . " minutes<br>";
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
  ?>
</body>
</html>
