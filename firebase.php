<?php

class Firebase {

	const DEFAULT_URL = 'https://fuber-a49d6.firebaseio.com/';
	const DEFAULT_TOKEN = 's5nMpD0RjWNMXZRioZMoliwUncCxWdwiq1jj0PHm';
	const DEFAULT_PATH = '/users';

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

	public function getFridge($id){
		$fridge = $this->connection->get('/fridges/'.$id);
		return $fridge;
	}
}
