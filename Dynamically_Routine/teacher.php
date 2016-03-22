<?php
	if(isset($_POST['submit_teacher']))
	{
		$link = mysql_connect('localhost', 'root', ''); 
		$select = mysql_select_db("routinemanagement", $link);

		$shortName = $_POST['shortName'];
		$fullName = $_POST['fullName'];

		$query = "insert into teacher values('".$shortName."', '".$fullName."');";
		$result = mysql_query($query);

		if($result)
			echo "successfully inserted";

		else
			echo "Not inserted";
	}
?>