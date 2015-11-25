<?php

class LogInControll{

	private $LogInModel;
	private $LoginView;
	private $deleateview;
	private $deleateDAL;

	public function __construct( LoginView $LoginView, LogInModel $LogInModel, deleateView $deleateview, deleateDAL $deleateDAL){
		$this->LogInModel = $LogInModel;
		$this->LoginView = $LoginView;
		$this->deleateview = $deleateview;
		$this->deleateDAL = $deleateDAL;



	}

	public function doesAdminWantToLogin()
	{
		if(isset($_GET['login'])){
			$this->LoginView->generateLoginFormHTML("Logga in");
		}
		else{
			return false;
		}
	}
	public function LoginChecker(){
		//session_start();
		$this->LogInModel->DoesSessionExsist();
		if($this->LogInModel->CheckIfLoggedIn() == false){
			if($this->LoginView->Checklogin() == true){

			    if($this->LogInModel->login($this->LoginView->GetUserName(), $this->LoginView->GetPassword())){
						$this->deleateview->printOutAllPicturesFormDB($this->deleateDAL->getAllFilesInDB());
					}
					else {
						$this->LoginView->renderNotLogedInMessage();
					}

			}
	   }
	   else{
	   		if($this->LogInModel->CheckIfLoggedIn() == true){
				if($this->LoginView->ChecklogOut() == true){
				$this->LogInModel->StopSession();

				}
	   		}
	   }
	}
}
