<?php

class NavigationView {
private $DAL;
private $Succes = 'Succes';
	public function __construct(DAL $DAL){

		$this->DAL = $DAL;
		$this->DoesUserWantToUpload();
	}

	public function DoesUserWantToUpload(){
		if(isset($_GET['Upload'])){
			//var_dump($this->Succes);
			$this->DAL->uploadfile();
		}
	}

	public function renderUploadForm(){
		echo '<form enctype="multipart/form-data" action="?Upload" method="POST">
	    <!-- MAX_FILE_SIZE must precede the file input field -->
	    <input type="hidden" name="MAX_FILE_SIZE" value=" 7000000" />
	    <!-- Name of input element determines name in $_FILES array -->
	    Send this file: <input name="userfile" type="file" />
	    <input type="submit" value="Send File" />
		</form>';
	}

}
