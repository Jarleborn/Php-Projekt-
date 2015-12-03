<?php

class FileModel {
	private $response = [];
	public function validateTheFIle($UserInputedFIle){
		// $acceptable = array(
	  //       'image/jpeg',
	  //       'image/jpg',
	  //       'image/gif',
	  //       'image/png'
    // 	);

		$acceptable = array(
							'image/gif',
							'image/jpeg',
							'image/png' ,
							'application/x-shockwave-flash',
							'image/psd',
							'image/bmp',
							'image/tiff',
							'image/tiff',
							'image/jp2' ,
							'image/iff' ,
							'image/vnd.wap.wbmp',
							'image/xbm',
							'image/vnd.microsoft.icon'
			);

    	try{

								$finfo = new finfo(FILEINFO_MIME);
                $type = $finfo->file($UserInputedFIle['userfile']['tmp_name']);//change the field_name
                $mime = substr($type, 0, strpos($type, ';'));
                //return $mime;

								// var_dump($mime);
								// var_dump($acceptable);
			if(!in_array($mime, $acceptable)) {
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
