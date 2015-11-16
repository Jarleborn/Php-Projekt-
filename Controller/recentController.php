<?php

class RecentController {

	private $RecentView;
	private $RecentDAL;

	public function __construct(RecentView $RecentView, RecentDAL $RecentDAL){

		$this->RecentView = $RecentView;
		$this->RecentDAL = $RecentDAL;
		$this->renderRecent();
	}

	public function renderRecent(){
		$recentImages = $this->RecentDAL->getrecentImages();
		$this->RecentView->renderRecent($recentImages);
	}

}
