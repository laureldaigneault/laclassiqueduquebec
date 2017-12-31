<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/OtherDAO.php");
	require_once("action/DAO/MiscDAO.php");
	require_once("action/DAO/ImagesDAO.php");
	require_once("action/DAO/PdfsDAO.php");
	require_once("action/DAO/VideosDAO.php");
	require_once("action/DAO/SponsorsDAO.php");

	class ConsoleManagerModifsAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MANAGER);
		}

		protected function executeAction() {
			$this->pdfUploadError = null;
			$this->pdfUploadSuccess = null;

			$this->modifsError = null;
			$this->modifsSuccess = null;

			$this->heatlist=MiscDAO::get("heatlist_link");
			$this->result=MiscDAO::get("result_link");

			if(isset($_POST["pdf_edit_fr"])) {
				if($_FILES["fileToUploadFr"]['size']==0){ //no files selected
					$this->pdfUploadError = "PLease select a file";
				} else {
					$target_dir = PDF_FOLDER;
					$target_file = $target_dir . basename($_FILES["fileToUploadFr"]["name"]);
					$uploadOk = 1;
					$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

					$check = filesize($_FILES["fileToUploadFr"]["tmp_name"]);
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
					if ($_FILES["fileToUploadFr"]["size"] > MAX_PDF_SIZE) {
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
						$old_pdf = PdfsDAO::getPdfById(999998);
						$pdf_error = PdfsDAO::editPdf(999998, $target_file, $old_pdf['name']);
						if (!is_null($pdf_error)) {
							$this->pdfUploadError = $pdf_error;
						}
						else {
							if (move_uploaded_file($_FILES["fileToUploadFr"]["tmp_name"], $target_file)) {
								unlink($old_pdf['url']);
								$this->pdfUploadSuccess = "The file located at " . $old_pdf['url'] . " has been replaced by " . basename( $_FILES["fileToUploadFr"]["name"]);

							} else {
								$this->pdfUploadError = "Sorry, there was an error uploading your file.";
							}
						}
					}
				}

			}
			if(isset($_POST["pdf_edit_en"])) {
				if($_FILES["fileToUploadEn"]['size']==0){ //no files selected
					$this->pdfUploadError = "PLease select a file";
				} else {
					$target_dir = PDF_FOLDER;
					$target_file = $target_dir . basename($_FILES["fileToUploadEn"]["name"]);
					$uploadOk = 1;
					$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

					$check = filesize($_FILES["fileToUploadEn"]["tmp_name"]);
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
					if ($_FILES["fileToUploadEn"]["size"] > MAX_PDF_SIZE) {
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
						$old_pdf = PdfsDAO::getPdfById(999999);
						$pdf_error = PdfsDAO::editPdf(999999, $target_file, $old_pdf['name']);
						if (!is_null($pdf_error)) {
							$this->pdfUploadError = $pdf_error;
						}
						else {
							if (move_uploaded_file($_FILES["fileToUploadEn"]["tmp_name"], $target_file)) {
								unlink($old_pdf['url']);
								$this->pdfUploadSuccess = "The file located at " . $old_pdf['url'] . " has been replaced by " . basename( $_FILES["fileToUploadEn"]["name"]);

							} else {
								$this->pdfUploadError = "Sorry, there was an error uploading your file.";
							}
						}
					}
				}

			}

			$this->scheduleActivePdfFr = PdfsDAO::getPdfById(999998);
			$this->scheduleActivePdfEn = PdfsDAO::getPdfById(999999);
		}
	}

?>
