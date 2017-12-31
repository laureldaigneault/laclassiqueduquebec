<?php 
	class SubscribeDAO {

		public static function subscribe($email) {
            $connection = Connection::getConnection();
            try{
                $statement = $connection->prepare("INSERT INTO c_subscriber (email) VALUES (?)");
                $statement->bindParam(1, $email);
                
                $statement->setFetchMode(PDO::FETCH_ASSOC); // hastable
                $statement->execute();
            }
            catch(PDOException $exception){ 
               return $exception->getCode(); 
            }

            return null;
		}
	}

















