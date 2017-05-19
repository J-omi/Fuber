<html>
<head>
  <?php
class Spoonacular
{
    var $mashable_key;
    # Constructor for SDK class Spoonacular
    function __construct($mashable_key)
    {
        $this->mashable_key = $mashable_key;
        require_once("vendor/autoload.php");
    }
    /*
    Accepts an array of ingredients and will then output
    recipes based of the given ingredients.
    */
    public function getRecipeByIngredients($ingredients)
    {
        $ingredientList = "";
        $delimeter      = '%2C';
        $counter        = 0;
        $len            = count($ingredients);
        foreach ($ingredients as $list) {
            if ($counter == $len - 1) {
                $ingredientList = $ingredientList . $list;
                break;
            }
            $ingredientList = $ingredientList . $list . $delimeter;
            $counter++;
        }
        $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/findByIngredients?fillIngredients=false&ingredients='.$ingredientList.'&limitLicense=false&number=10&ranking=1",
        array("X-Mashape-Key" => $this->mashable_key, "Accept" => "application/json"));
        return $response->body;
    }
    /*
    Go kill Mojo-Jojo
    */
    public function easterEgg($power){
      $counter = 0;
      foreach($power as $ingredient){
        if(strcasecmp($ingredient, 'sugar') == 0){
          $counter++;
        } else if(strcasecmp($ingredient, 'spice') == 0){
          $counter++;
        } else if(strcasecmp($ingredient, 'everything nice') == 0){
          $counter++;
        } else if(strcasecmp($ingredient, 'chemical x') == 0){
          $counter++;
        }
      }
      if($counter == 4){
        header("Location: powerpuff.html");
        exit();
      }
    }

    public function getIngredientImage(){
      /*$response = Unirest\Request::post("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/parseIngredients",
      array("X-Mashape-Key" => $this->mashable_key, "Content-Type" => "application/x-www-form-urlencoded", "Accept" => "application/json"),
      array("ingredientList" => '"'.$name.'"',"servings" => 1));
      return $response->body;
      */
      $response = Unirest\Request::post("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/parseIngredients",
  array(
    "X-Mashape-Key" => "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg",
    "Content-Type" => "application/x-www-form-urlencoded",
    "Accept" => "application/json"
  ),
  array(
    "ingredientList" => "apple",
    "servings" => 1
  )
);
return $response->body;
    }
    /*
    Accepts a unique recipe ID then returns the steps of the recipe.
    */
    public function getRecipeSteps($id)
    {
        $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/" . $id . "/analyzedInstructions?stepBreakdown=true",
        array("X-Mashape-Key" => $this->mashable_key, "Accept" => "application/json"));
        return $response->body;
    }
    /*
    Accepts a unique recipe ID then returns an array of the recipe.
    The array contains various information of the recipe.
    */
    public function getRecipeInfo($id){
      $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/" . $id . "/information?includeNutrition=false",
      array("X-Mashape-Key" => $this->mashable_key, "Accept" => "application/json"));
      return $response->body;
    }
    /* Not currently in use
    public function visualizeIngredients(){
     $response = Unirest\Request::post("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/visualizeIngredients",
      array("X-Mashape-Key" => $this->mashable_key, "Accept" => "text/html", "Content-Type" => "application/x-www-form-urlencoded"),
      array(
    "defaultCss" => true,
    "ingredientList" => "beef",
    "measure" => "metric",
    "servings" => 2,
    "showBacklink" => true,
    "view" => "grid"
  )
);
      return $response->body;
    }
}
*/
}
?>
</head>
</html>
