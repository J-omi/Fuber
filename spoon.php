<html>
    <head>
        <title>Recipes</title>
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

      <div id="apps_header">
        <i class="fa fa-archive fa-5x" aria-hidden="true"></i>
        <h1>Recipes</h1>
      </div>
        <?php

					include("Spoonacular.php");
        	require_once "vendor/autoload.php";
					/*Instantiates variable $recipe as an array.
						Array $recipes contain 7 variables
						1) id
						2) title
						3) image
						4) imageType
						5) usedIngredientCount
						6) missedIngredientCount
						7) likes
					*/

					$mash_key = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
					$spoonacular = new Spoonacular($mash_key);
					$recipes = $spoonacular->getRecipeByIngredients($_POST);

        	foreach ($recipes as $recipe){
            echo '<div class="recipe_list">';
          	echo '<h4 class="recipe_name">' . $recipe->title . '</h4><br>';
            echo '<span class="recipe_id">id: ' . $recipe->id . '</span><br>';
            echo '<img id="picture" src=' . $recipe->image . ' style="width:110px;height:110px;"><br>';
          	echo '<form action="recipe.php" method="post">';
	  				echo '<input type="hidden" name="ID" value="'.$recipe->id.'" >';
	  				echo '<input type="submit" value="Get Detailed Recipe Instructions"/>';
	  				echo '</form><br>';
            echo '</div>';
        	}
        ?>
    </body>
</html>
