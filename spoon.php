<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
</head>

<body>
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
                    <a href="#"><i class="fa fa-qrcode"></i>QR scanner</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-archive"></i>Recipes</a>
                </li>
                <li>
                    <a href="apps.html"><i class="fa fa-users"></i>Fuber Friends</a>
                </li>
            </ul>
        </div>
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
            echo '<div class="recipe_list col-sm-12 col-xs-12">';
            echo '<img id="picture" class="col-sm-4 col-xs-4" src="' . $recipe->image . '">';
          	echo '<div class="col-sm-8 col-xs-8"><h4 class="recipe_name">' . $recipe->title . '</h4><br>';
            echo '<span class="recipe_id">Recipe #: ' . $recipe->id . '</span><br>';
          	echo '<form action="recipe.php" method="post">';
            echo '<input type="hidden" name="name" value="'.$recipe->title.'">';
	  				echo '<input type="hidden" name="ID" value="'.$recipe->id.'" >';
	  				echo '<input type="submit" class="btn btn-info" value="Get Detailed Recipe Instructions"/></div>';
	  				echo '</form><br>';
            echo '</div>';
        	}
        ?>
    </div>
    <script src="js/navbar.js"></script>
</body>

</html>
