<?php
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.


class DAL{
	private $FileModel;
	public $mysqli;
	private $recentImageLinks = array();

	public function __construct(FileModel $FileModel){

		$this->FileModel = $FileModel;

		$this->mysqli = new mysqli("localhost", "root", "GrovSnus2", "images");
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
			}
	}

	// public function GetFileToUpload()
	// {
	// 	return $_FILES;
	// }

	public function uploadfile($thefile){

		if(move_uploaded_file($thefile[0], $thefile[1])){
			return true;
		}
		return false;
	}


}
