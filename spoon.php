<!DOCTYPE html>
<html>

<head>
    <title>Recipes</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!------------------------css------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/test.css">
    <!---------------------------js----------------------------->
    <script src="js/jquery.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
    <script src="js/firebaseScript.js"></script>
    <script src="js/slideout.js"></script>
</head>

<body>
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
          $spoonacular->easterEgg($_POST);
					$recipes = $spoonacular->getRecipeByIngredients($_POST);

        	foreach ($recipes as $recipe){
            echo '<div class="recipe_list">';
          	echo '<h4 class="recipe_name">' . $recipe->title . '</h4><br>';
            echo '<span class="recipe_id">Recipe #: ' . $recipe->id . '</span><br>';
            echo '<img id="picture" src=' . $recipe->image . ' style="width:110px;height:110px;"><br><br>';
          	echo '<form action="recipe.php" method="post">';
	  				echo '<input type="hidden" name="ID" value="'.$recipe->id.'" >';
	  				echo '<input type="submit" class="btn btn-info" value="Get Detailed Recipe Instructions"/>';
	  				echo '</form><br>';
            echo '</div>';
        	}
        ?>
    </main>
    <script>
        function myFunction(x) {
            x.classList.toggle("change");
        }

    </script>
</body>

</html>
