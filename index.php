<?php

require_once('View/Navigationview.php');
require_once('Model/DAL');

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$DAL = new DAL();
$NavigationView = new NavigationView($DAL);
?>


<p>HOJ</p>