<?php

class RecentController {
	private $RecentView;
	private $DAL;

	public function __construct(RecentView $RecentView, DAL $DAL){

		$this->RecentView = $RecentView;
		$this->DAL = $DAL;
		$this->renderRecent();
		//$this->DoesUserWantToUpload();
	}



	public function renderRecent(){
		$recentImages = $this->DAL->getrecentImages();
		$this->RecentView->renderRecent($recentImages);
	}



}
