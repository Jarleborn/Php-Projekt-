<?php

class FileModel {

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
			if (!isset($UserInputedFIle['userfile']['error']) || is_array($UserInputedFIle['userfile']['error'])) {
		        switch ($UserInputedFIle['userfile']['error']) {
			        
			        case UPLOAD_ERR_OK:
			            break;
			        case UPLOAD_ERR_NO_FILE:
			            throw new RuntimeException('No file sent.');
			        case UPLOAD_ERR_INI_SIZE:
			        case UPLOAD_ERR_FORM_SIZE:
			            throw new RuntimeException('Exceeded filesize limit.');
			        default:
			            throw new RuntimeException('Unknown errors.');
		    	}

		    	
		    }
		    if ($UserInputedFIle['userfile']['size'] > 29) {
	       			echo RuntimeException('Exceeded filesize limit.');
   			}

	   		if(!in_array($UserInputedFIle['userfile']['type'], $acceptable) && (!empty($UserInputedFIle["userfile"]["type"]))) {
    				$errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    				echo $errors[0];
			}
	    }
	    catch(RuntimeException $ex){

	    	return $ex;
	    }		
	}
}

