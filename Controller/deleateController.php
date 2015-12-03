<?php

//TODO Här ska vi fixa så att vi kan ta bort

/**
 *
 */
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
    //var_dump($url["query"]);

    if(isset($url["query"])){
      //$this->view->renderSuccessfulDeleateMessage();
        $this->DAL->deleateImage($url["query"]);

    }
  }
}
