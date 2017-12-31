<?php 
	class VideosDAO {
        public static function getVideoById($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_videos WHERE video_id = ?");
            $statement->bindParam(1, $id);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetch();
            
			return $row;
        }

		public static function uploadVideo($url, $name, $language) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("INSERT INTO c_videos (url, name, language) VALUES (?, ?, ?)");
            $statement->bindParam(1, $url);
            $statement->bindParam(2, $name);
            $statement->bindParam(3, $language);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}

        public static function deleteVideo($url, $id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_videos WHERE video_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                unlink($url);
                return null;
            }
		}

        public static function editVideo($id, $url, $name) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_videos SET name = ?, url = ? WHERE video_id = ?");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $url);
            $statement->bindParam(3, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function editVideoName($id, $name) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_videos SET name = ? WHERE video_id = ?");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function getVideos() {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_videos");
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
		}

        public static function getVideosWithParam($lang) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_videos WHERE language = ?");
            
            $statement->bindParam(1, $lang);

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
		}
	}






