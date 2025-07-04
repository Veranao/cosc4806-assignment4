<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function test () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function authenticate($username, $password) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		$username = strtolower($username);
		$db = db_connect();
        $statement = $db->prepare("select * from users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        //echo $username;
		
		if (password_verify($password, $rows['password'])) {
      //echo $password;
			$_SESSION['auth'] = 1;
			$_SESSION['username'] = ucwords($username);
			unset($_SESSION['failedAuth']);
			header('Location: /home');
			die;
		} else {
			if(isset($_SESSION['failedAuth'])) {
				$_SESSION['failedAuth'] ++; //increment
			} else {
				$_SESSION['failedAuth'] = 1;
			}
			header('Location: /login');
			die;
		}
  }

  public function createUser($username, $password) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hashed);
    $statement->execute();
  }
  
  public function checkUserExists($username) {
    $user = $this->get_user($username);
    return $user != null;
  }

  public function get_user ($username) {
    $dbh = db_connect();
    $statement = $dbh->prepare("select * from users where username = :username");
    $statement->bindValue(':username', $username);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return reset($rows);
  }

  public function logLoginAttempt($username, $attempt) {
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO logs (username, attempt) VALUES (:username, ");
    $statement->bindValue(':username', $username);
    
  }
  
}
