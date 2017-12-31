<?php 
	class MenusDAO {
        public static function createMenu($section, $type, $name_fr, $name_en, $value_fr, $value_en) {
            $connection = Connection::getConnection();
            
            $rank = MenusDAO::getNbOfMenus($section) + 1;

            $statement = $connection->prepare("INSERT INTO c_menus (type, name_fr, name_en, value_fr, value_en, section, rank) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $type);
            $statement->bindParam(2, $name_fr);
            $statement->bindParam(3, $name_en);
            $statement->bindParam(4, $value_fr);
            $statement->bindParam(5, $value_en);
            $statement->bindParam(6, $section);
            $statement->bindParam(7, $rank);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function deleteMenu($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_menus WHERE menu_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}
        public static function getNbOfMenus($section) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT COUNT(*) FROM c_menus WHERE section = ?");
            $statement->bindParam(1, $section);

            $statement->execute();
            
            $val = $statement->fetch();
            return $val[0];
        }

        public static function getAllMenus($section) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT c_menus.menu_id,
                                                      c_menus.rank, 
                                                      c_menus.section, 
                                                      c_menus.type, 
                                                      c_menus.visible, 
                                                      c_menus.name_fr, 
                                                      c_menus.name_en, 
                                                      c_menus.value_fr, 
                                                      c_menus.value_en, 
                                                      images_table_fr.url AS url_image_fr, 
                                                      images_table_en.url AS url_image_en,
                                                      pdfs_table_fr.url AS url_pdf_fr,
                                                      pdfs_table_en.url AS url_pdf_en
                                               FROM c_menus 
                                                    LEFT JOIN c_images images_table_fr 
                                                            ON c_menus.type = 'img' AND c_menus.value_fr=images_table_fr.image_id 
                                                    LEFT JOIN c_images images_table_en 
                                                            ON c_menus.type = 'img' AND c_menus.value_en=images_table_en.image_id
                                                            
                                                    LEFT JOIN c_pdfs pdfs_table_fr 
                                                            ON c_menus.type = 'pdf' AND c_menus.value_fr=pdfs_table_fr.pdf_id 
                                                    LEFT JOIN c_pdfs pdfs_table_en 
                                                            ON c_menus.type = 'pdf' AND c_menus.value_en=pdfs_table_en.pdf_id
                                              WHERE c_menus.section = ?
                                              ORDER BY c_menus.rank ASC");

            $statement->bindParam(1, $section);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
        }

        public static function updateMenuVisibility($id, $visible) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_menus SET visible = ? WHERE menu_id = ?");
            $statement->bindParam(1, $visible);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function updateMenuRank($id, $rank) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_menus SET rank = ? WHERE menu_id = ?");
            $statement->bindParam(1, $rank);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }
    }