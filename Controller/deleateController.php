<?php

class deleateController
{
  private $DAL;
  private $view;
  function __construct($deleateDAL, $deleateView)
  {
    $this->DAL = $deleateDAL;
    $this->view = $deleateView;

    if($this->view->DoesUserWantToSeeTheDeleatePage()){
      $this->view->printOutAllPicturesFormDB($this->DAL->getAllFilesInDB());
		}

    $url = parse_url($_SERVER['REQUEST_URI']);

    if(isset($url["query"])){
        $this->DAL->deleateImage($url["query"]);
    }
  }
}
