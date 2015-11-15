<?php

class FileModel {
	private $response = [];
	public function validateTheFIle($UserInputedFIle){
		$acceptable = array(
	        'image/jpeg',
	        'image/jpg',
	        'image/gif',
	        'image/png'
    	);

    	try{

			if(!in_array($UserInputedFIle['userfile']['type'], $acceptable) && (!empty($UserInputedFIle["userfile"]["type"]))) {
				throw new RuntimeException('Invalid file type. Only  JPG, GIF and PNG types are accepted.');
			}
		    elseif ($UserInputedFIle['userfile']['size'] > 1073741824) {
       			throw new RuntimeException('Exceeded filesize limit.');
   			}
				elseif ($UserInputedFIle['userfile']['size'] < 0.5) {
       			throw new RuntimeException('You have to choose a file');
   			}
   			else{
   				$this->response[0] = true;
   				$UserInputedFIle['userfile']['name'] = $this->changeName( $UserInputedFIle['userfile']['name'], pathinfo($UserInputedFIle["userfile"]["name"],PATHINFO_EXTENSION) );
	    		$this->response[1] = $UserInputedFIle['userfile']['name'];
	    		return $this->response;
   			}


	    }
	    catch(RuntimeException $ex){
	    	$this->response[0] = false;
	    	$this->response[1] = $ex->getMessage();
	    	return $this->response;
	    }
	}

	public function changeName($fileName,$type)
	{
		$randomNumerName =  rand(0, PHP_INT_MAX);
		$fileName = $randomNumerName.".".$type;
		return $fileName;
		}
}
