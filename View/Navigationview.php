<?php

class NavigationView {
private $DAL;
private $Succes = 'Succes';
private $response;
	public function __construct(DAL $DAL){

		$this->DAL = $DAL;

	}

	public function renderHeader()
	{
		echo'<head>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
		<meta charset="UTF-8"/>
		</head>
	<a href="index.php">Hem</a>   <a href="?deleate"> Radera bilder </a> <br />';
	}

	public function renderUploadForm(){

		$this->response .=  '

		<form enctype="multipart/form-data" action="?Upload" method="POST">
	    <!-- MAX_FILE_SIZE must precede the file input field -->
	    <input type="hidden" name="MAX_FILE_SIZE" value=" 700000000" />
	    <!-- Name of input element determines name in $_FILES array -->
	    Send this file: <input name="userfile" type="file" />
	    <input type="submit" value="Skicka upp filen på servern" />
		</form>
		<br />
		<p>Endast PNG, JPEG och GIF är tillåtna</p>';

		echo $this->response;
	}



}
