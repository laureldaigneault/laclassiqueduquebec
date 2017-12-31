<?php 
	class OtherDAO {

		public static function get($elem) {
            $connection = Connection::getConnection();
           
            $statement = $connection->prepare("SELECT * FROM c_other WHERE label = ?");
            $statement->bindParam(1, $elem);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC); // hastable
            $statement->execute();
            
            
            $row = $statement->fetch();

			return $row;
		}

        public static function getLogo($label) { //or image
            $connection = Connection::getConnection();
           
            $statement = $connection->prepare("SELECT c_other.other_id,
                                                      c_other.label,
                                                      c_other.value_fr,
                                                      c_other.value_en,
                                                      images_table_fr.url AS url_image_fr, 
                                                      images_table_en.url AS url_image_en
                                               FROM c_other 
                                               LEFT JOIN c_images images_table_fr
                                                    ON c_other.value_fr=images_table_fr.image_id
                                               LEFT JOIN c_images images_table_en
                                                    ON c_other.value_en=images_table_en.image_id
                                               WHERE c_other.label = ?");
            
            $statement->bindParam(1, $label);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetch();
            
			return $row;
		}

        public static function getVideo($label) {
            $connection = Connection::getConnection();
           
            $statement = $connection->prepare("SELECT c_other.other_id,
                                                      c_other.label,
                                                      c_other.value_fr,
                                                      c_other.value_en,
                                                      videos_table_fr.url AS url_video_fr, 
                                                      videos_table_en.url AS url_video_en
                                               FROM c_other 
                                               LEFT JOIN c_videos videos_table_fr
                                                    ON c_other.value_fr=videos_table_fr.video_id
                                               LEFT JOIN c_videos videos_table_en
                                                    ON c_other.value_en=videos_table_en.video_id
                                               WHERE c_other.label = ?");
            
            $statement->bindParam(1, $label);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetch();
            
			return $row;
		}

        public static function update($elem, $value_fr, $value_en) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_other SET value_fr = ?, value_en = ? WHERE label = ?");
            $statement->bindParam(1, $value_fr);
            $statement->bindParam(2, $value_en);
            $statement->bindParam(3, $elem);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}
	}









