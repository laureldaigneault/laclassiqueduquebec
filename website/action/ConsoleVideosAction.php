<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/VideosDAO.php");

	class ConsoleVideosAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}

		protected function executeAction() {

			$this->imageUploadError = null;
			$this->imageUploadSuccess = null;

			// image was uploaded
			if(isset($_POST["submit_image"]) && isset($_POST["nameOfFile"]) && isset($_POST["languageFile"])) {

				$target_dir = UPLOAD_FOLDER;
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				// Check if file already exists
				if (file_exists($target_file)) {
					$this->imageUploadError = "Sorry, file already exists.";
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > MAX_VIDEO_SIZE) {
					$this->imageUploadError = "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "mp4") {
					$this->imageUploadError = "Sorry, only MP4 videos are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$this->imageUploadError = $this->imageUploadError . "</br> The file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					$image_error = VideosDAO::uploadVideo($target_file, $_POST['nameOfFile'], $_POST['languageFile'], 0);
					if (!is_null($image_error)) {
						$this->imageUploadError = $image_error;
					}
					else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							$this->imageUploadSuccess = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
						} else {
							$this->imageUploadError = "Sorry, there was an error uploading your file.";
						}
					}
				}
			}
			
			// image was edited
			if(isset($_POST["image_edit"]) && isset($_POST["nameOfFileUpdate"]) && isset($_POST['idOfImageUpdate'])) {
				if($_FILES["fileToUploadUpdate"]['size']==0){ //no files selected
					//we just want to upload the name
					$image_error = VideosDAO::editVideoName($_POST['idOfImageUpdate'], $_POST['nameOfFileUpdate']);
					if (!is_null($image_error)) {
						$this->imageUploadError = $image_error;
					} else {
						$this->imageUploadSuccess = "The name was successfully changed to " . $_POST['nameOfFileUpdate'];
					}
				} else {
					$target_dir = UPLOAD_FOLDER;
					$target_file = $target_dir . basename($_FILES["fileToUploadUpdate"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

					// Check if file already exists
					if (file_exists($target_file)) {
						$this->imageUploadError = "Sorry, file already exists.";
						$uploadOk = 0;
					}
					// Check file size
					if ($_FILES["fileToUploadUpdate"]["size"] > MAX_VIDEO_SIZE) {
						$this->imageUploadError = "Sorry, your file is too large.";
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "mp4") {
						$this->imageUploadError = "Sorry, only MP4 videos are allowed.";
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->imageUploadError = $this->imageUploadError . "</br> The file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
						$old_image = VideosDAO::getVideoById($_POST['idOfImageUpdate']);
						$image_error = VideosDAO::editVideo($_POST['idOfImageUpdate'], $target_file, $_POST['nameOfFileUpdate']);
						if (!is_null($image_error)) {
							$this->imageUploadError = $image_error;
						}
						else {
							if (move_uploaded_file($_FILES["fileToUploadUpdate"]["tmp_name"], $target_file)) {
								unlink($old_image['url']);
								$this->imageUploadSuccess = "The file located at " . $old_image['url'] . " has been replaced by " . basename( $_FILES["fileToUploadUpdate"]["name"]);

							} else {
								$this->imageUploadError = "Sorry, there was an error uploading your file.";
							}
						}
					}
				}
				
			}

			$this->videos = VideosDAO::getVideos(0); //not logos

        }
	}
	
?>