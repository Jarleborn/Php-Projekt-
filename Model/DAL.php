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
			else{
				//echo "conected";
			}
	}
	public function GetFileToUpload()
	{
		return $_FILES;
	}
	public function uploadfile($newFileName){
		//var_dump($newFileName);
		$_FILES['userfile']['name'] = $newFileName;
		$uploaddir = 'data/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
		
		//var_dump($_FILES);
		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
			return true;
		}
		return false;	
	}

	public function getrecentImages()
	{
		//SELECT * FROM  `links` LIMIT 0 , 5

		$stmt = $this->mysqli->prepare("SELECT link FROM  `links` ORDER BY id DESC LIMIT 0 , 5");
		if($stmt === false){
			throw new Exception("A database error");
		}

		$stmt->execute();

		$stmt->bind_result($recentImageLink);
		
		while($stmt->fetch()){
			$this->recentImageLinks[] = $recentImageLink;
		}
		//var_dump($this->userList);
		return $this->recentImageLinks;

		# code...
	}

	public function saveImageLink($link)
	{
		try{
			$var = null;
			//INSERT INTO `images`.`links` (`id`, `link`) VALUES (NULL, 'http://hampusjarleborn.se/php_proj/data/1730623511048749056.jpg');
			$stmt = $this->mysqli->prepare("INSERT INTO  `images`.`links` (`id`, `link`) VALUES (?, ?)");
			//var_dump($stmt);
			if ($stmt === FALSE) {
				throw new Exception("A database error");
			}
			
			$stmt->bind_param('is', $var, $link);
			//var_dump($stmt->execute());
			if($stmt->execute()){
				return true;
			}

		}
		catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
	}
}
