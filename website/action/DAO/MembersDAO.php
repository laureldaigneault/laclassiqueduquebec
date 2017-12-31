<?php 
	class MembersDAO {

        public static function getAllMembers() { //or image
            $connection = Connection::getConnection();
           
            $statement = $connection->prepare("SELECT * FROM c_subscriber");
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
		}

    public static function deleteMember($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_subscriber WHERE subscriber_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
    }
	}









