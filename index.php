<?php
require_once ('View/deleateview.php');
require_once ('Controller/deleateController.php');
require_once ('Controller/recentController.php');
require_once ('Controller/uploadController.php');

require_once('Model/DAL.php');
require_once ('Model/FIleModel.php');
require_once ('Model/RecentDAL.php');
require_once ('Model/deleateDAL.php');

require_once('View/Navigationview.php');
require_once ('View/UploadView.php');
require_once ('View/recentView.php');


// error_reporting(E_ALL);
ini_set('display_errors', 'off');




$deleateview = new deleateView();
$FileModel = new FileModel();
$DAL = new DAL($FileModel);
$RecentDAL = new RecentDAL();
$NavigationView = new NavigationView();
$UploadView = new uploadedView($NavigationView);
$uploadControll = new uploadControll($FileModel, $UploadView, $DAL, $RecentDAL);
$recentView = new RecentView();
$recentController = new RecentController($recentView, $RecentDAL);
$deleateDAL = new deleateDAL();
$deleateController = new deleateController($deleateDAL, $deleateview);





?>
