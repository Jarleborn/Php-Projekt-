<?php

class RecentView {

	public function renderRecent($recent){
		echo " <hr />  <p>Nyligen uppladdade bilder</p>";
		foreach ($recent as $pics ) {
		echo  '<a class="recImage" href="http://hampusjarleborn.se/php_proj/data/'.$pics.'"><img src="http://hampusjarleborn.se/php_proj/data/'.$pics.'" /></a> ';
		}
		echo "<br /> <hr />";
	}

	public function showDatabseError($exeception)
	{
	     echo $exeception;
	}



}
