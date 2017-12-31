<?php 
	class PdfsDAO {
        public static function getPdfById($id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_pdfs WHERE pdf_id = ?");
            $statement->bindParam(1, $id);
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetch();
            
			return $row;
        }

		public static function uploadPdf($url, $name, $language) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("INSERT INTO c_pdfs (url, name, language) VALUES (?, ?, ?)");
            $statement->bindParam(1, $url);
            $statement->bindParam(2, $name);
            $statement->bindParam(3, $language);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
		}

        public static function deletePdf($url, $id) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("DELETE FROM c_pdfs WHERE pdf_id = ?");
            $statement->bindParam(1, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                unlink($url);
                return null;
            }
		}

        public static function editPdf($id, $url, $name) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_pdfs SET name = ?, url = ? WHERE pdf_id = ?");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $url);
            $statement->bindParam(3, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function editPdfName($id, $name) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("UPDATE c_pdfs SET name = ? WHERE pdf_id = ?");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $id);

            if (!$statement->execute()) {
                return $st->errorInfo();
            } else {
                return null;
            }
        }

        public static function getPdfs() {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_pdfs");
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
		}

        public static function getPdfsWithParam($lang) {
            $connection = Connection::getConnection();
            
            $statement = $connection->prepare("SELECT * FROM c_pdfs WHERE language = ?");
            
            $statement->bindParam(1, $lang);

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            $row = $statement->fetchall();
            
			return $row;
		}
	}






