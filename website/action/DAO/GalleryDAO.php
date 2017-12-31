<?php 
	class GalleryDAO {
        public static function createGallery($image_id) {
            $connection = Connection::getConnection();
            
            $rank = GalleryDAO::getNbOfGallery() + 1;

            $statement = $connection->prepare("INSERT INTO c_gallery (image_id, rank) VALUES (?, ?)");
            $statement->bindParam(1, $image_id);
            $statement->bindParam(2, $rank);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function deleteGallery($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_gallery WHERE gallery_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}
        public static function getNbOfGallery() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT COUNT(*) FROM c_gallery");

            $statement->execute();
            
            $val = $statement->fetch();
            return $val[0];
        }

        public static function getAllGallery() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT c_gallery.gallery_id,
                                                      c_gallery.image_id,
                                                      c_gallery.rank, 
                                                      c_gallery.visible,  
                                                      images_table.url AS url_image,
                                                      images_table.name AS name_image
                                               FROM c_gallery 
                                                    LEFT JOIN c_images images_table 
                                                            ON c_gallery.image_id=images_table.image_id
                                              ORDER BY c_gallery.rank ASC");

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
        }

        public static function updateGalleryVisibility($id, $visible) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_gallery SET visible = ? WHERE gallery_id = ?");
            $statement->bindParam(1, $visible);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function updateGalleryRank($id, $rank) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_gallery SET rank = ? WHERE gallery_id = ?");
            $statement->bindParam(1, $rank);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }
    }