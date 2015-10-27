<?php

class NavigationView {
private $DAL;
private $Succes = 'Succes';
private $response;
	public function __construct(DAL $DAL){

		$this->DAL = $DAL;
		//$this->DoesUserWantToUpload();
	}



	public function renderUploadForm(){

		$this->response .=  '<head>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
		<meta charset="UTF-8"/></head><form enctype="multipart/form-data" action="?Upload" method="POST">
	    <!-- MAX_FILE_SIZE must precede the file input field -->
	    <input type="hidden" name="MAX_FILE_SIZE" value=" 700000000" />
	    <!-- Name of input element determines name in $_FILES array -->
	    Send this file: <input name="userfile" type="file" />
	    <input type="submit" value="Skicka upp filen på servern" />
		</form>
		<br />
		<p>Endast PNG, JPEG, GIF och PDF är tillåtna</p>';

		echo $this->response;
	}



}
