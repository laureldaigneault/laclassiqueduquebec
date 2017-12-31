<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/PdfsDAO.php");

	class ConsolePdfsAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}

		protected function executeAction() {

			$this->pdfUploadError = null;
			$this->pdfUploadSuccess = null;

			if(isset($_POST["submit_pdf"]) && isset($_POST["nameOfFile"]) && isset($_POST["languageFile"])) {

				$target_dir = PDF_FOLDER;
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

				$check = filesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
				} else {
					$this->pdfUploadError =  "File is not a pdf.";
					$uploadOk = 0;
				}

				// Check if file already exists
				if (file_exists($target_file)) {
					$this->pdfUploadError = "Sorry, file already exists.";
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > MAX_PDF_SIZE) {
					$this->pdfUploadError = "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($fileType != "pdf") {
					$this->pdfUploadError = "Sorry, only PDF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$this->pdfUploadError = $this->pdfUploadError . "</br> The file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					$pdf_error = PdfsDAO::uploadPdf($target_file, $_POST['nameOfFile'], $_POST['languageFile']);
					if (!is_null($pdf_error)) {
						$this->pdfUploadError = $pdf_error;
					}
					else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							$this->pdfUploadSuccess = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
						} else {
							$this->pdfUploadError = "Sorry, there was an error uploading your file.";
						}
					}
				}
			}
			
			if(isset($_POST["pdf_edit"]) && isset($_POST["nameOfFileUpdate"]) && isset($_POST['idOfPdfUpdate'])) {
				if($_FILES["fileToUploadUpdate"]['size']==0){ //no files selected
					//we just want to upload the name
					$pdf_error = PdfsDAO::editPdfName($_POST['idOfPdfUpdate'], $_POST['nameOfFileUpdate']);
					if (!is_null($pdf_error)) {
						$this->pdfUploadError = $pdf_error;
					} else {
						$this->pdfUploadSuccess = "The name was successfully changed to " . $_POST['nameOfFileUpdate'];
					}
				} else {
					$target_dir = PDF_FOLDER;
					$target_file = $target_dir . basename($_FILES["fileToUploadUpdate"]["name"]);
					$uploadOk = 1;
					$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

					$check = filesize($_FILES["fileToUploadUpdate"]["tmp_name"]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						$this->pdfUploadError =  "File is not a pdf.";
						$uploadOk = 0;
					}

					// Check if file already exists
					if (file_exists($target_file)) {
						$this->pdfUploadError = "Sorry, file already exists.";
						$uploadOk = 0;
					}
					// Check file size
					if ($_FILES["fileToUploadUpdate"]["size"] > MAX_PDF_SIZE) {
						$this->pdfUploadError = "Sorry, your file is too large.";
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($fileType != "pdf") {
						$this->pdfUploadError = "Sorry, only PDF files are allowed.";
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->pdfUploadError = $this->pdfUploadError . "</br> The file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
						$old_pdf = PdfsDAO::getPdfById($_POST['idOfPdfUpdate']);
						$pdf_error = PdfsDAO::editPdf($_POST['idOfPdfUpdate'], $target_file, $_POST['nameOfFileUpdate']);
						if (!is_null($pdf_error)) {
							$this->pdfUploadError = $pdf_error;
						}
						else {
							if (move_uploaded_file($_FILES["fileToUploadUpdate"]["tmp_name"], $target_file)) {
								unlink($old_pdf['url']);
								$this->pdfUploadSuccess = "The file located at " . $old_pdf['url'] . " has been replaced by " . basename( $_FILES["fileToUploadUpdate"]["name"]);

							} else {
								$this->pdfUploadError = "Sorry, there was an error uploading your file.";
							}
						}
					}
				}
				
			}

			$this->pdfs = PdfsDAO::getPdfs(); //not logos

        }
	}
	
?>