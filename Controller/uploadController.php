<?php

class uploadControll{

	private $FileModel;
	private $uploadView;

	function __construct(FileModel $FileModel, uploadedView $uploadView, DAL $DAL) {
		$this->FileModel =  $FileModel; 
		$this->uploadView = $uploadView;
		$this->DAL = $DAL;

		$this->DoesUserWantToUpload();
	}

	public function UploadImage()
	{
		//if($this->DoesUserWantToUpload()){
		$response =$this->FileModel->validateTheFIle( $this->DAL->GetFileToUpload());
		//var_dump($response);
				if($response[0]){
					if($this->DAL->uploadfile($response[1])){
						$this->uploadView->renderSuccessResponse($response[1]);
						$this->DAL->saveImageLink($response[1]);
					}
					else{
						$this->uploadView->renderFailResponse($response[1]);	
					}
					
				}
				else{
					$this->uploadView->renderFailResponse($response[1]);	
				}
				
		//}
	}

	public function DoesUserWantToUpload(){
		if(isset($_GET['Upload'])){
			$this->UploadImage();
		}
		return false;
	}

	
}