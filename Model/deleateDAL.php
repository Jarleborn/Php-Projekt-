<?php

/**
 *
 */
class deleateDAL
{
    //TODO Här tar vi bort från databasen
    function __construct() {
      //Här nedan ska det egentlgien stå ett lösenord det vill jag dock inte ha på github
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

    return $this->LinkwithBothIDandLink;

  }


  public function deleateImage($ID)
  {

      $stmt = $this->mysqli->prepare("DELETE FROM `images`.`links` WHERE `links`.`id` = $ID");

      if($stmt === false){
        throw new Exception("A database error");
      }
      $stmt->execute();
      print 'alert("Bilden togs bort")';
      header('Location: index.php?deleate');


  }

}
