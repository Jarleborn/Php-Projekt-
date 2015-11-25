<?php
echo "<a href='?login'> Admin login </a> ";
require_once('View/Navigationview.php');
require_once('Model/DAL.php');
require_once('Model/FIleModel.php');
require_once ('Controller/uploadController.php');
require_once ('View/UploadView.php');
require_once ('View/recentView.php');
require_once ('Controller/recentController.php');
require_once ('Model/RecentDAL.php');
require_once ('Model/deleateDAL.php');
require_once ('View/deleateview.php');

require_once('View/loginview.php');
require_once('Model/logInModel.php');
require_once('Controller/logInController.php');
require_once('Model/session.php');
require_once('Model/loginDAL.php');

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

$my_file = @file ('View/loginview.php') or
    die ("Failed opening file: error was '$php_errormsg'");

$deleateview = new deleateView();
$loginDAL = new loginDAL();

$FileModel = new FileModel();
$DAL = new DAL($FileModel);
$RecentDAL = new RecentDAL();
$NavigationView = new NavigationView($DAL);
$NavigationView->renderHeader();
$UploadView = new uploadedView();
$uploadControll = new uploadControll($FileModel, $UploadView, $DAL, $RecentDAL);
$recentView = new RecentView();
$recentController = new RecentController($recentView, $RecentDAL);
$deleateDAL = new deleateDAL();

$s = new Session();

$lm = new LogInModel($loginDAL, $s);
$v = new LoginView($lm, $s);
$lc = new LogInControll($v, $lm, $deleateview, $deleateDAL);


ob_start();




$lc->doesAdminWantToLogin();
$lc->LoginChecker();
$deleateDAL->getAllFilesInDB();
$NavigationView->renderUploadForm();

?>
