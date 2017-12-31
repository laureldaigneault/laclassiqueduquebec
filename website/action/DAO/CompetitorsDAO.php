<?php 
	class CompetitorsDAO {
        public static function createCompetitor($name_fr, $name_en, $pdf_fr, $pdf_en, $section) {
            $connection = Connection::getConnection();
            
            $rank = CompetitorsDAO::getNbOfCompetitors($section) + 1;

            $statement = $connection->prepare("INSERT INTO c_competitors (section, name_fr, name_en, pdf_fr, pdf_en, rank) VALUES (?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $section);
            $statement->bindParam(2, $name_fr);
            $statement->bindParam(3, $name_en);
            $statement->bindParam(4, $pdf_fr);
            $statement->bindParam(5, $pdf_en);
            $statement->bindParam(6, $rank);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function deleteCompetitor($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_competitors WHERE competitor_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}
        public static function getNbOfCompetitors($section) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT COUNT(*) FROM c_competitors WHERE section = ?");
            $statement->bindParam(1, $section);

            $statement->execute();
            
            $val = $statement->fetch();
            return $val[0];
        }

        public static function getAllCompetitors($section) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT c_competitors.competitor_id,
                                                      c_competitors.rank, 
                                                      c_competitors.section, 
                                                      c_competitors.visible, 
                                                      c_competitors.name_fr, 
                                                      c_competitors.name_en, 
                                                      c_competitors.pdf_fr, 
                                                      c_competitors.pdf_en, 
                                                      pdfs_table_fr.url AS url_pdf_fr,
                                                      pdfs_table_en.url AS url_pdf_en
                                               FROM c_competitors 
                                                    LEFT JOIN c_pdfs pdfs_table_fr 
                                                            ON c_competitors.pdf_fr=pdfs_table_fr.pdf_id 
                                                    LEFT JOIN c_pdfs pdfs_table_en 
                                                            ON c_competitors.pdf_en=pdfs_table_en.pdf_id
                                              WHERE c_competitors.section = ?
                                              ORDER BY c_competitors.rank ASC");

            $statement->bindParam(1, $section);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
        }

        public static function updateCompetitorVisibility($id, $visible) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_competitors SET visible = ? WHERE competitor_id = ?");
            $statement->bindParam(1, $visible);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function updateCompetitorRank($id, $rank) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_competitors SET rank = ? WHERE competitor_id = ?");
            $statement->bindParam(1, $rank);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }
    }