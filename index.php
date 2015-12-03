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

// require_once ('View/loginNavigationView.php');
// require_once('View/loginview.php');
// require_once('Model/logInModel.php');
// require_once('Controller/logInController.php');
// require_once('Model/session.php');
// require_once('Model/loginDAL.php');
// require_once ('View/loginLayoutView.php');

// error_reporting(E_ALL);
ini_set('display_errors', 'on');



// $s = new Session();
$deleateview = new deleateView();
$FileModel = new FileModel();
$DAL = new DAL($FileModel);
$RecentDAL = new RecentDAL();
$NavigationView = new NavigationView($DAL);
$UploadView = new uploadedView($NavigationView);
$uploadControll = new uploadControll($FileModel, $UploadView, $DAL, $RecentDAL);
$recentView = new RecentView();
$recentController = new RecentController($recentView, $RecentDAL);
$deleateDAL = new deleateDAL();
$deleateController = new deleateController($deleateDAL, $deleateview);


// $loginDAL = new loginDAL();
//
// $lm = new LogInModel($loginDAL, $s);
// $v = new LoginView($lm, $s);

//
// $NavigationView->renderHeader();
// $NavigationView->renderUploadForm();
//
// $loginNavigationView = new LoginNavigationView($v, $lm, $s);
// $loginLayoutView = new LoginLayoutView($loginNavigationView);
// // $lc = new LogInControll($loginLayoutView, $lm, $v, $loginNavigationView);
// ob_start();

//session_destroy();


//if($lc->doesAdminWantToLogin()){
  // $v->generateLoginFormHTML("Logga in");
  // $lc->getResponseFromUser();
//   $lc->LoginChecker();
// //}
// $lm->DoesSessionExsist();
//$checker = $lm->UserWantsToLogInOrOut();
//$regChecekr = $rw->doesUserWantsToRegister();
//var_dump($regChecekr);
//$loginLayoutView->render($checker, $nw, $dtv, $regLink);



?>
