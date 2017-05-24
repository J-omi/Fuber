<?php

class Firebase {

	const DEFAULT_URL = 'https://fuber-a49d6.firebaseio.com/';
	const DEFAULT_TOKEN = 's5nMpD0RjWNMXZRioZMoliwUncCxWdwiq1jj0PHm';
	const DEFAULT_PATH = '/users';

	/*
	Constrcutor for class Firebase
	*/
	function __construct(){
		require __DIR__ . '/vendor/autoload.php';
		$this->connection = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
	}

	public function createUser($user, $fridge_id){

		// --- storing an array ---
		$entry = array(
    		"fridge_id" => $fridge_id
		);

		// --- storing a string ---
		$this->connection->set(self::DEFAULT_PATH . '/'.$user.'/', $entry);
	}

	public function getUser($user){

		// --- reading the stored string ---
		$name = $this->connection->get(self::DEFAULT_PATH . '/'.$user);
		return $name;
	}

	/*
	function createIngredient will take 4 parameters,
	$fridgeId for unique fridge id, $food for name of food, $expiration for expiration of food in days, and $quantity for quantity of food
	*/
	public function createIngredient($fridgeId, $food, $expiration, $quantity){
		$entry = array("expirationDays" => $expiration,
									 "quantity" => $quantity);
		$this->connection->set('/fridges/'.$fridgeId.'/'.$food.'/', $entry);
	}

	public function readIngredient($fridgeId){
		$fridge = $this->connection->get('/fridges/' . $fridgeId);
		return $fridge;
	}
}
?>
