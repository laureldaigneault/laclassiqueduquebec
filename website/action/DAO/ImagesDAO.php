<?php 
	class ImagesDAO {
        public static function getImageById($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_images WHERE image_id = ?");
            $statement->bindParam(1, $id);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetch();
            
			return $row;
        }

		public static function uploadImage($url, $name, $language, $logo) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("INSERT INTO c_images (url, name, language, logo) VALUES (?, ?, ?, ?)");
            $statement->bindParam(1, $url);
            $statement->bindParam(2, $name);
            $statement->bindParam(3, $language);
            $statement->bindParam(4, $logo);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}

        public static function deleteImage($url, $id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_images WHERE image_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                unlink($url);
                return null;
            }
		}

        public static function editImage($id, $url, $name) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_images SET name = ?, url = ? WHERE image_id = ?");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $url);
            $statement->bindParam(3, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function editImageName($id, $name) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_images SET name = ? WHERE image_id = ?");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function getImages($logo) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_images WHERE logo = ? ORDER BY c_images.name ASC");
            $statement->bindParam(1, $logo);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
		}

        public static function getImagesWithParam($lang, $is_logo) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_images WHERE language = ? AND logo = ? ORDER BY c_images.name ASC");
            
            $statement->bindParam(1, $lang);
            $statement->bindParam(2, $is_logo);

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
		}
	}






