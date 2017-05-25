<!DOCTYPE HTML>
<html>

<head>
    <title>My Kitchen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <!------------------------css------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test.css">
    <!---------------------------js----------------------------->
    <script src="js/jquery.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
    <script src="js/slideout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/firebaseScript.js"></script>
</head>

<body>
    <nav id="menu" class="menu">
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
            <i class="fa fa-cutlery fa-5x" aria-hidden="true"></i>
            <h1 id="Kitchen_header">My Kitchen</h1>
        </div>
        <?php
  include("Spoonacular.php");
  require_once "vendor/autoload.php";
  $mash_key    = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
  $spoonacular = new Spoonacular($mash_key);

    include('firebase.php');

    $firebase = new Firebase();
/*
    $user = $firebase->auth()->currentUser;
    echo $user;
*/
    $uid = $_COOKIE['uid'];
    /*
    Checks to see if use is logged in
    */
    if (!isset($uid)){
	      echo ("You must be logged in to use this page");
        echo '<a href="login.html">Log In</a>';
        echo '<a href="signUp.html">Sign Up</a>';
	      exit();
    }
    $fridge = json_decode($firebase->readIngredient($uid), true);
    $ingredient = "";
    $counter = 0;
    foreach($fridge as $foods => $content){
      echo '<div class="items"><form id="food">';
      echo '<div id="item_list"><h3 id="food_name" class="col-sm-9 col-xs-9">' . $foods . "</h3><br>";
      echo "<button class='removeBtn btn btn-danger col-sm-3 col-xs-3' id='".$foods."'>Remove</button>";
      echo "Expires in " . $content['expirationDays'] . " days<br>";
      echo "Quantity: " . $content['quantity'] . "<br>";
      echo "</div>";
      echo "</form></div>";
     if($counter == 0){
        $ingredient = $foods;
      } else{
        $ingredient = $ingredient . "|" . $foods;
      }
      $counter++;
    }
    echo" <button class='add'>add</button>";
    $ingredients = explode("|", $ingredient);
    echo '<form id="recipes" action="spoon.php" method="post"><div style="text-align:center;">';
    echo '<input type="submit" class="btn btn-success generate" value="Generate Recipes"><br><br>';

    $ingredient_counter = 0;
    foreach($ingredients as $ingredient){
      echo '<input type="hidden" id="textBox'.$ingredient_counter.'" name="ingredient'.$ingredient_counter.'" value="'.$ingredient.'"/>';
      $ingredient_counter++;
    }
    echo '</div></form>';

    ?>

            <form id="food" class="food_input" action="grease.php" method="post">
                <div id="food_box">
                    <span class="input_title">Food: </span><br><input type="text" id="foodName" name="food" value=""><br>
                    <span class="input_title">Expiration: </span><br> <input type="text" id="exp" name="expiration" value=""><br>
                    <span class="input_title">Quantity: </span><br><input type="text" id="qty" name="quantity" value=""><br><br>
                    <input type="submit" id="submitFood" class="btn btn-primary" value="Submit">
                </div>
            </form>
    </main>
    <script>
        function myFunction(x) {
            x.classList.toggle("change");
        }

    </script>
    <script>
        $(document).on('click', '.add', function() {
            if ($(".prepended").length < 1) {
                $('<input type="checkbox" class ="prepended">').prependTo(".items");
            }
        });
        $(document).on('click', '#remove', function() {
            $(".prepended").remove();
        });

    </script>
</body>

</html>
