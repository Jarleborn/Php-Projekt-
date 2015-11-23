<?php

//TODO Vi behöver en lista som listar bidler namn och en möjlighet att ta bort dom
/**
 *
 */
class deleateView
{

  function __construct()
  {
    # code...
  }
  public function printOutAllPicturesFormDB($arrayWithTheNameOfThePictures)
  {
    //var_dump("h3ej");
    echo "<ul>";
    foreach ($arrayWithTheNameOfThePictures as $name) {
      //TODO Lös detta för detta e kass
      echo "<a href='?".$name[0]."'><img class='deleatePicList' src='data/".$name[1]."' width='100'  /></a>";
      if(isset($_GET[$name[0]])){
  			$this->deleateImage($name[0]);

  		}
    }
    echo "</ul>";
  }
}
