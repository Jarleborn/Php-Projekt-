<?php

  /**
   *
   */
  class RecentDAl
  {
    public $recentImageLinks = array();

    function __construct() {
      $this->mysqli = new mysqli("localhost", "root", "GrovSnus2", "images");
      if (mysqli_connect_errno()) {
          printf("Connect failed: %s\n", mysqli_connect_error());
          exit();
        }
    }


    public function getrecentImages()
	{

		$stmt = $this->mysqli->prepare("SELECT link FROM  `links` ORDER BY id DESC LIMIT 0 , 5");
		if($stmt === false){
			throw new Exception("A database error");
		}
		$stmt->execute();
		$stmt->bind_result($recentImageLink);
		while($stmt->fetch()){
			$this->recentImageLinks[] = $recentImageLink;
		}
    //var_dump($this->recentImageLinks);
		return $this->recentImageLinks;
	}
	public function saveImageLink($link)
	{
		try{
			$var = null;
			$stmt = $this->mysqli->prepare("INSERT INTO  `images`.`links` (`id`, `link`) VALUES (?, ?)");
			if ($stmt === FALSE) {
				throw new Exception("A database error");
			}
			$stmt->bind_param('is', $var, $link);
			if($stmt->execute()){
				return true;
			}
		}
		catch (Exception $e) {
    			return 'Caught exception: '.  $e->getMessage(). "\n";
			}
	}


  }
