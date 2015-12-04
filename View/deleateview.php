<?php


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

      echo "<li><a href='?".$name[0]."'><img class='deleatePicList' src='data/".$name[1]."' width='100'  /></a></li>";

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
