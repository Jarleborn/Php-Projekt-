<?php

require_once('View/Navigationview.php');
require_once('Model/DAL');
require_once('Model/FIleModel.php');
//require_once('View/SuccessedUploadView.php');

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$FileModel = new FileModel();
$DAL = new DAL($FileModel);
$NavigationView = new NavigationView($DAL);

$NavigationView->renderUploadForm();
?>


<!-- //<p>HOJ</p> -->