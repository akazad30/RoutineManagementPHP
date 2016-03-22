<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Insert Form</title>

		<script type= "text/javascript">
			var semester_arr = new Array("1st year 1st semester", "1st year 2nd semester","2nd year 2nd semester","3rd year 2nd semester","4th year 2nd semester");
			var s_a = new Array();
			s_a[0] ="";
			s_a[1] ="cse-1101 | cse-1102 | cse-1103 | cse-1104 | cse-1105 | cse-1106 | cse-1107 | cse-1109";
			s_a[2] ="cse-1201 | cse-1202 | cse-1203 | cse-1204 | cse-1205 | cse-1207 | cse-1209 | cse-1211";
			s_a[3] = "cse-2201 | cse-2202 | cse-2203 | cse-2204 | cse-2205 | cse-2206 | cse-2207 | cse-2208 | cse-2209 | cse-2210 | cse-2211 |  cse-2214 |  cse-2216";
			s_a[4] = "cse-3201 | cse-3202 | cse-3203 | cse-3204 | cse-3205 | cse-3206 | cse-3208 | cse-3209 | cse-3210 | cse-3211";
			s_a[5] = "cse-4201 | cse-4202 | cse-4203 | cse-4204 | cse-4205 | cse-4206 | cse-4207 | cse-5000";

			function semester(semester_id){ 
				// given the id of the <select> tag as function argument, it inserts <option> tags
				var option_str = document.getElementById(semester_id);
				option_str.length=0;
				option_str.options[0] = new Option('Select Semester','');
				option_str.selectedIndex = 0;
				for (var i=0; i<semester_arr.length; i++) {
					option_str.options[option_str.length] = new Option(semester_arr[i],semester_arr[i]);
				}
			}

			function subject(subject_id, subject_index){
				var option_str = document.getElementById(subject_id);
				option_str.length=0;
				option_str.options[0] = new Option('Select subject','');
				option_str.selectedIndex = 0;
				var sub = s_a[subject_index].split("|");
				for (var i=0; i<sub.length; i++) {
					option_str.options[option_str.length] = new Option(sub[i],sub[i]);
				}
			}
		</script>
	</head>

	<body>
		<?php
            echo "<h3>Please insert data into the field...</h3>";
            
			if(isset($_POST['submit']))
			{
				$day = trim($_POST['day']);
				$semester = trim($_POST ['semester']);
				$teacher = trim($_POST['teacher']);
				$sub = trim($_POST['subject_id']);
				$time = trim($_POST['time']);
				$flag = 0;
				
				//echo $day.' '.$semester.' '. $teacher.' '.$sub.' '.$time;
				
				$link = mysql_connect('localhost', 'root', ''); 
			    $select = mysql_select_db("routinemanagement",$link);
                
                $result = mysql_query("select credit from subject where code = '".$sub."';");
                $query_data = mysql_fetch_row($result);
                $credit = $query_data[0];
                //echo $credit;
                
                $result= mysql_query("Select count(sub) from routine where sub = '".$sub."';");
                $query_data = mysql_fetch_row($result);
                $cnt = $query_data[0];
                //echo $cnt;
                
                
                if($cnt >= $credit)
                {
                    echo "Exceed Credit. You can not insert.";
                } 

                else
                {
                
				$result = mysql_query("SELECT * FROM r", $link);
                while($query_data = mysql_fetch_row($result)){
					if($day != $query_data[0]){
						$flag = 0;
					}
						
					else 
						if($time  != $query_data[4]){
							$flag = 0;
						}
						
						else
							if($semester != $query_data[1] && $teacher != $query_data[2]){
								$flag = 0;
							}
								
							else{
								$flag = 1;
								break;
							}
				   }

				   if($flag==0) {
						$insert = mysql_query("INSERT INTO r values('$day','$semester','$teacher','$sub','$time')");
						echo 'Valid data inserted successfully into database';
				   }
				   
				   else
						echo "Invalid Data....Already exist a class<br>";
                        
			            }
                   }  
		?>
			
		<form method="POST" action="">

			Day: <select name="day">
					<option value="select day">select day</option>
                      <option value="Saturday">Saturday</option>  
					  <option value="Sunday">Sunday</option>
					  <option value="Monday">Monday</option>
					  <option value="Tuesday">Tuesday</option>
					  <option value="Wednesday">Wednesday</option>        
				 </select> 
				 
			Semester: <select onchange="subject('subject_id',this.selectedIndex);" id="semester" name ="semester" ></select>
				
			Subject: <select onchange="('',this.selectedIndex);" name ="subject_id" id ="subject_id"></select>
				
			Teacher: <select name="teacher">
						<option value="select teacher">select Teacher</option>
						<option value="MMR">MMR</option>
						<option value="MR">MR</option>
						<option value="MHT">MHT</option>
						<option value="MA">MA</option>
						<option value="MB">MB</option>
                        <option value="DH">DH</option>
                        <option value="MHR">MHR</option>
                        <option value="DAR">DAR</option>
                        <option value="DPK">DPK</option>
                        <option value="SKS">SKS</option>
                        <option value="MM">MM</option>
                        <option value="AS">AS</option> 
                        <option value="OR">OR</option>       
					</select> 
				 
			Time:   <select name="time">
						<option value="select time">select time</option>
                        <option value="8-8.50">8-8.50</option> 
						<option value="9-9.50">9-9.50</option>
						<option value="10-10.50">10-10.50</option>
						<option value="11-11.50">11-11.50</option>  
						<option value="12-12.50">12-12.50</option>
						<option value="1-1.50">1-1.50</option>  
						<option value="2-2.50">2-2.50</option>   
						<option value="3-3.50">3-3.50</option>
                        <option value="4-4.50">4-4.50</option> 
                        <option value="5-5.50">5-5.50</option>       
					</select>  
			  
			<input type="submit" value="Insert" name="submit"/>
		</form>
		
		<form method="POST" action="showRoutine.php">
			<input type="submit" value="Show Routine" name ="show_routine" />
        </form>
         <br /> <br />
        <form method="post" action="individual.php">
            <input type="submit" value="Individual_Routine" name="Individual_Routine" /> 
        </form>
		
		<script language="javascript">semester("semester");</script>	
	</body>
</html>