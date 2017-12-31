<?php 
	class UserDAO {

		public static function authenticate($username, $password) {
            $connection = Connection::getConnection();
            
            $password = sha1($password);

            
            $statement = $connection->prepare("SELECT * FROM c_users WHERE username = ? AND password = ?");
            $statement->bindParam(1, $username);
            $statement->bindParam(2, $password);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC); // hastable
            $statement->execute();
            
            
            $row = $statement->fetch();

			return $row;
		}
	}

















