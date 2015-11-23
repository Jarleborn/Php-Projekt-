<?php

/**
 *
 */
class deleateDAL
{
    //TODO Här tar vi bort från databasen
    function __construct() {
      $this->mysqli = new mysqli("localhost", "root", "GrovSnus2", "images");
      if (mysqli_connect_errno()) {
          printf("Connect failed: %s\n", mysqli_connect_error());
          exit();
        }
    }


    public function getAllFilesInDB()
  {
    $stmt = $this->mysqli->prepare("SELECT * FROM  `links` ");
    if($stmt === false){
      throw new Exception("A database error");
    }
    $stmt->execute();
    $stmt->bind_result($id, $ImageLink);
    while($stmt->fetch()){
      $this->ImageLinks[] = $id;
      $this->ImageLinks[] = $ImageLink;
      $this->LinkwithBothIDandLink[] = $this->ImageLinks;
      unset($this->ImageLinks);
    }

    if(isset($_GET['Upload'])){
			$this->UploadImage();
		}

    // echo "<pre>";
    // print_r($this->LinkwithBothIDandLink);
    // echo "</pre>";


$this->printOutAllPicturesFormDB($this->LinkwithBothIDandLink);
    return $this->LinkwithBothIDandLink;

  }

  public function deleateImage($ID)
  {
    var_dump($ID);
      $stmt = $this->mysqli->prepare("DELETE FROM `images`.`links` WHERE `links`.`id` = $ID");
      var_dump($stmt);
      if($stmt === false){
        throw new Exception("A database error");
      }
      $stmt->execute();
      header('Location: index.php');
      echo "bilden togs bort";

  }

}
