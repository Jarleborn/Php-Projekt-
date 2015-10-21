<?php 

class uploadedView{

	public function __construct(){

	}

	public function renderFailResponse($failResponse){

		echo $failResponse;

	}

	public function renderSuccessResponse($Name)
	{
		echo 'Bilden laddades upp utan problem! <br /><br /><br /> 
		<img src="http://hampusjarleborn.se/php_proj/data/'.$Name.'" />
		<br /><br />
		 Använd denna länken för delning 
		<a href="http://hampusjarleborn.se/php_proj/data/'.$Name.'">
			http://hampusjarleborn.se/php_proj/data/'.$Name.'
		</a>';
		
		
		
	}
}