<?php

//TODO Vi behöver en lista som listar bidler namn och en möjlighet att ta bort dom
/**
 *
 */
class deleateView
{

  function __construct()
  {
    echo'<head>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
		<meta charset="UTF-8"/>
		</head>';
  }
  public function printOutAllPicturesFormDB($arrayWithTheNameOfThePictures)
  {
    //var_dump("h3ej");
    echo "Klicka på en bild för att ta bort den";
    echo "<ul>";
    foreach ($arrayWithTheNameOfThePictures as $name) {
      //TODO Lös detta för detta e kass
      echo "<li><a href='?".$name[0]."'><img class='deleatePicList' src='data/".$name[1]."' width='100'  /></a></li>";
      // if(isset($_GET[$name[0]])){
  		// 	$this->deleateImage($name[0]);
      //
  		// }
    }
    echo "</ul>";
  }

  public function renderSuccessfulDeleateMessage()
  {
    var_dump("piss");
    echo "Bilden togs bort";
  }

  public function DoesUserWantToSeeTheDeleatePage()
  {
    if(isset($_GET['deleate'])){
      return true;
		}
    return false;
  }
}
