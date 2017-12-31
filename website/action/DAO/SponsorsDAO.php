<?php 
	class SponsorsDAO {
        public static function createSponsor($logo, $url) {
            $connection = Connection::getConnection();
            
            $rank = SponsorsDAO::getNbOfSponsors() + 1;

            $statement = $connection->prepare("INSERT INTO c_sponsors (logo, url, rank) VALUES (?, ?, ?)");
            $statement->bindParam(1, $logo);
            $statement->bindParam(2, $url);
            $statement->bindParam(3, $rank);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function deleteSponsor($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_sponsors WHERE sponsor_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}
        public static function getNbOfSponsors() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT COUNT(*) FROM c_sponsors");

            $statement->execute();
            
            $val = $statement->fetch();
            return $val[0];
        }

        public static function getAllSponsors() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT c_sponsors.sponsor_id,
                                                      c_sponsors.rank, 
                                                      c_sponsors.visible,
                                                      c_sponsors.logo,
                                                      c_sponsors.url,
                                                      images_table.name AS name_image,
                                                      images_table.url AS url_image
                                               FROM c_sponsors 
                                                    LEFT JOIN c_images images_table 
                                                            ON c_sponsors.logo = images_table.image_id 
                                              ORDER BY c_sponsors.rank ASC");

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
        }

        public static function updateSponsorVisibility($id, $visible) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_sponsors SET visible = ? WHERE sponsor_id = ?");
            $statement->bindParam(1, $visible);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function updateSponsorRank($id, $rank) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_sponsors SET rank = ? WHERE sponsor_id = ?");
            $statement->bindParam(1, $rank);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }
    }