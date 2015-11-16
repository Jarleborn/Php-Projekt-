<?php

class uploadControll{

	private $FileModel;
	private $uploadView;
	private $RecentDAL;

	function __construct(FileModel $FileModel, uploadedView $uploadView, DAL $DAL, RecentDAL $RecentDAL) {
		$this->FileModel =  $FileModel;
		$this->uploadView = $uploadView;
		$this->DAL = $DAL;
		$this->RecentDAL = $RecentDAL;

		$this->DoesUserWantToUpload();
	}

	public function UploadImage()
	{

		$response = $this->FileModel->validateTheFIle( $this->uploadView->GetFileToUpload());
				if($response[0]){
					if($this->DAL->uploadfile($this->uploadView->UploadTheFIlesFromTheView($response[1]))                                                                                                                                                             ){

						$this->uploadView->renderSuccessResponse($response[1]);
						$this->RecentDAL->saveImageLink($response[1]);
					}
					else{
						$this->uploadView->renderFailResponse($response[1]);
					}

				}
				else{
					$this->uploadView->renderFailResponse($response[1]);
				}
	}

	public function DoesUserWantToUpload(){
		if(isset($_GET['Upload'])){
			$this->UploadImage();
		}
		return false;
	}


}
