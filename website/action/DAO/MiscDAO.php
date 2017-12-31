<?php 
	class MiscDAO {

		public static function get($label) {
            $connection = Connection::getConnection();
           
            $statement = $connection->prepare("SELECT * FROM c_misc WHERE label = ?");
            $statement->bindParam(1, $label);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC); // hastable
            $statement->execute();
            
            
            $row = $statement->fetch();

			return $row;
		}

        public static function update($label, $arg1, $arg2, $arg3, $arg4, $arg5) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_misc SET arg1 = ?, arg2 = ?, arg3 = ?, arg4 = ?, arg5 = ? WHERE label = ?");
            $statement->bindParam(1, $arg1);
            $statement->bindParam(2, $arg2);
            $statement->bindParam(3, $arg3);
            $statement->bindParam(4, $arg4);
            $statement->bindParam(5, $arg5);
            $statement->bindParam(6, $label);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}
	}









