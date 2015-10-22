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
		    elseif ($UserInputedFIle['userfile']['size'] > 299999999999) {
	       			throw new RuntimeException('Exceeded filesize limit.');
   			}
   			else{
   				//return true, $UserInputedFIle['userfile']['name'];
   				$this->response[0] = true;
   				
   				$UserInputedFIle['userfile']['name'] = $this->changeName( $UserInputedFIle['userfile']['name'], pathinfo($UserInputedFIle["userfile"]["name"],PATHINFO_EXTENSION) );
   				//var_dump($UserInputedFIle['userfile']['name']);
	    		$this->response[1] = $UserInputedFIle['userfile']['name'];

	    		//var_dump($this->response);
	    		return $this->response;
	    		//return $this->returnResponse($this->response);
   			}

	   		
	    }
	    catch(RuntimeException $ex){
	    	$this->response[0] = false;
	    	$this->response[1] = $ex->getMessage();
	    	return $this->response;
	    	//return $this->returnResponse($this->response);
	    }		
	}

	public function changeName($fileName,$type)
	{
		//var_dump($type);
		//var_dump(basename($fileName, $type));
		$randomNumerName =  rand(0, PHP_INT_MAX);
		$fileName = $randomNumerName.".".$type;
		//var_dump($fileName);

		return $fileName;
		}
	// public function returnResponse($res)
	// {
	// 	if ($res[0]) {
	// 		return $res[1];
	// 	}
	// 	return $res[1];
	// }
}

