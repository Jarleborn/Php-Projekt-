<?php

class uploadedView{

	private $Navigationview;
	public function __construct($Navigationview){

		$this->Navigationview = $Navigationview;

		$this->Navigationview->renderHeader();
		$this->Navigationview->renderUploadForm();
		// echo'<head>
		// <link rel="stylesheet" type="text/css" href="Style/style.css">
		// <meta charset="UTF-8"/>
		// </head>';
	}

	public function renderFailResponse($failResponse){

		echo $failResponse;

	}

	public function renderSuccessResponse($Name)
	{
		echo 'Bilden laddades upp utan problem! <br /><br /><br />
		<img src="http://hampusjarleborn.se/php_proj/data/'.$Name.'" />
		<br /><br />
		 Använd denna länken för delning
		<a href="http://hampusjarleborn.se/php_proj/data/'.$Name.'">
			http://hampusjarleborn.se/php_proj/data/'.$Name.'
		</a>';



	}
	public function GetFileToUpload()
	{
		return $_FILES;
	}

	public function UploadTheFIlesFromTheView($newFileName)
	{
		$_FILES['userfile']['name'] = $newFileName;
		$uploaddir = 'data/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

		$FileWithDir = array();
		array_push($FileWithDir,$_FILES['userfile']['tmp_name'] );
		array_push($FileWithDir, $uploadfile);
		// $stringToReturn = $_FILES['userfile']['tmp_name'], $uploadfile;
		return $FileWithDir;
	}

	public function DoesUserWantToUpload(){
		if(isset($_GET['Upload'])){
			return true;
		}
		return false;
	}
}
