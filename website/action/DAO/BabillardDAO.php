<?php 
	class BabillardDAO {
        public static function createBabillard($type, $image_fr, $image_en, $arg1_fr, $arg2_fr, $arg3_fr, $arg1_en, $arg2_en, $arg3_en) {
            $connection = Connection::getConnection();
            
            $rank = BabillardDAO::getNbOfBabs() + 1;

            $statement = $connection->prepare("INSERT INTO c_babillard (type, image_fr, image_en, arg1_fr, arg2_fr, arg3_fr, arg1_en, arg2_en, arg3_en, rank) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $type);
            $statement->bindParam(2, $image_fr);
            $statement->bindParam(3, $image_en);
            $statement->bindParam(4, $arg1_fr);
            $statement->bindParam(5, $arg2_fr);
            $statement->bindParam(6, $arg3_fr);
            $statement->bindParam(7, $arg1_en);
            $statement->bindParam(8, $arg2_en);
            $statement->bindParam(9, $arg3_en);
            $statement->bindParam(10, $rank);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function deleteBabillard($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_babillard WHERE babillard_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}
        public static function getNbOfBabs() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT COUNT(*) FROM c_babillard");

            $statement->execute();
            
            $val = $statement->fetch();
            return $val[0];
        }

        public static function getAllBabillards() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT c_babillard.babillard_id,
                                                      c_babillard.rank, 
                                                      c_babillard.type, 
                                                      c_babillard.visible, 
                                                      c_babillard.image_fr, 
                                                      c_babillard.image_en, 
                                                      c_babillard.arg1_fr, 
                                                      c_babillard.arg2_fr, 
                                                      c_babillard.arg3_fr, 
                                                      c_babillard.arg1_en, 
                                                      c_babillard.arg2_en, 
                                                      c_babillard.arg3_en, 

                                                      images_table_fr_cover.url AS url_image_fr_cover,
                                                      images_table_en_cover.url AS url_image_en_cover,
                                                      images_table_fr_cover.name AS name_image_fr_cover,
                                                      images_table_en_cover.name AS name_image_en_cover,

                                                      images_table_fr.url AS url_image_fr, 
                                                      images_table_en.url AS url_image_en,

                                                      pdfs_table_fr.url AS url_pdf_fr,
                                                      pdfs_table_en.url AS url_pdf_en

                                               FROM c_babillard 

                                                    LEFT JOIN c_images images_table_fr_cover 
                                                            ON c_babillard.image_fr=images_table_fr_cover.image_id 
                                                    LEFT JOIN c_images images_table_en_cover 
                                                            ON c_babillard.image_en=images_table_en_cover.image_id

                                                    LEFT JOIN c_images images_table_fr 
                                                            ON c_babillard.type = 'img' AND c_babillard.arg2_fr=images_table_fr.image_id 
                                                    LEFT JOIN c_images images_table_en 
                                                            ON c_babillard.type = 'img' AND c_babillard.arg2_en=images_table_en.image_id
                                                            
                                                    LEFT JOIN c_pdfs pdfs_table_fr 
                                                            ON c_babillard.type = 'pdf' AND c_babillard.arg1_fr=pdfs_table_fr.pdf_id 
                                                    LEFT JOIN c_pdfs pdfs_table_en 
                                                            ON c_babillard.type = 'pdf' AND c_babillard.arg1_en=pdfs_table_en.pdf_id

                                              ORDER BY c_babillard.rank ASC");

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
        }

        public static function updateBabillardVisibility($id, $visible) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_babillard SET visible = ? WHERE babillard_id = ?");
            $statement->bindParam(1, $visible);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function updateBabillardRank($id, $rank) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_babillard SET rank = ? WHERE babillard_id = ?");
            $statement->bindParam(1, $rank);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }
    }