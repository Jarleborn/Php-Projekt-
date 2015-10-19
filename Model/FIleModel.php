<?php

class FileModel {
	private $response = [];
	public function validateTheFIle($UserInputedFIle){
		$acceptable = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );
		//var_dump($UserInputedFIle);
		//var_dump($UserInputedFIle['userfile']['name']);
    	try{

    		//var_dump($UserInputedFIle['userfile']);
			if(!in_array($UserInputedFIle['userfile']['type'], $acceptable) && (!empty($UserInputedFIle["userfile"]["type"]))) {
    				throw new RuntimeException('Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.');
    				//echo $errors[0];
			}
		    elseif ($UserInputedFIle['userfile']['size'] > 299999999) {
	       			throw new RuntimeException('Exceeded filesize limit.');
   			}
   			elseif(!isset($UserInputedFIle['userfile']['error']) || is_array($UserInputedFIle['userfile']['error'])){
   				//return true, $UserInputedFIle['userfile']['name'];
   				$this->response[0] = true;
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
}

