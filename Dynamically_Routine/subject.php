<?php
	if(isset($_POST['submit_subject']))
	{
		$link = mysql_connect('localhost', 'root', ''); 
		$select = mysql_select_db("routinemanagement", $link);
		
		$code = $_POST['courseCode'];
		$title = $_POST['courseTitle'];
		$credit = $_POST['courseCredit'];

		$query = "insert into subject values('".$code."', '".$title."','".$credit."');";
		$result = mysql_query($query);

		if($result)
			echo "successfully inserted";

		else
			echo "Not inserted";
	}
?>