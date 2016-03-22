<!DOCTYPE HTML>
<html>
    <head>
        <title>Show Routine</title>
    </head>

    <body>
        <?php
            if(isset($_POST['show_individualRoutine']))
            echo "<table>";
                echo "<tr><td style='text-align:center; float-left:500px;'><b>Class Routine</b>(effective from 24/03/2015)</td></tr>";
                echo "<tr><td style='text-align:center;width:1200px'><h4>Department of Computer Science & Engineering,MBSTU.</h4></td></tr>";
            echo "</table>";
            {
                $link = mysql_connect('localhost', 'root', ''); 
                $select = mysql_select_db("routinemanagement",$link);
                $teacher = $_POST['teacher'];
                $day = array("Saturday","Sunday", "Monday", "Tuesday", "Wednesday", "Thursday");
                $semester = array("1st year 1st semester", "1st year 2nd semester","2nd year 2nd semester","3rd year 2nd semester","4th year 2nd semester");
                $time = array("8-8.50", "9-9.50", "10-10.50", "11-11.50", "12-12.50", "1-1.50", "2-2.50", "3-3.50", "4-4.50", "5-5.50");

                echo "<table border='10'>";
                    echo "<tr>";
                        echo "<td style='width:100px; height:40px;'>Day/Time</td>";
                        echo "<td style='width:100px; height:40px;'>Semester</td>";
                        for($i=0;$i<10;$i++)
                            echo "<td style='width:100px; height:40px;'>$time[$i]</td>";
                    echo "</tr>";

                    for($i = 0; $i < 5; $i++)
                    {
                        $f = 0;
                        echo "<tr>";
                            echo "<td rowspan='6'>$day[$i]</td>";
                                for($j = 0; $j < 5; $j++)
                                {
                                    echo "<tr>";
                                    echo "<td>$semester[$j]</td>";
                                        
                                    $query = "select time, sub, tName from r where day = '".$day[$i]."' and semester = '".$semester[$j]."' and tName='".$_POST['teacher']."';"; 
                                    $result = mysql_query($query, $link);
                                    
                                    for($k = 0; $k < 10; $k++)
                                    {
                                        if($k == 5 && $f == 0)
                                        {
                                            echo "<td rowspan='5' style='height:40px;'>BREAK</td>";
                                            $f = 1;
                                        }
                                        
                                        else
                                        {
                                            $flag = 0;
                                            $result = mysql_query($query, $link);
                                            
                                            while($query_data = mysql_fetch_row($result))
                                            {
                                                if(strcmp(trim($query_data[0],' '), $time[$k])==0)
                                                {
                                                    $flag = 1;
                                                    //echo "<td style='width:100px; height:40px;'>$query_data[1]</td>";
                                                    break;
                                                }
                                            }
                                            
                                            if($k != 5)
                                            {
                                            if($flag == 0)
                                                echo "<td colspan = '1' style='height:40px;'>...</td>";
                                                
                                            else
                                            {
                                                $s = trim($query_data[1],' ');
                                                $lastIndex = strlen($s)-1;
                                                
                                                if($s[$lastIndex] % 2 == 0)
                                                {
                                                    echo "<td colspan='2' style='height:40px;'>$query_data[1]($query_data[2]) LAB</td>";
                                                    $k++;
                                                }
                                                    
                                                else
                                                    echo "<td colspan='1' style='height:40px;'>$query_data[1]($query_data[2])</td>";
                                            }
                                            }
                                        }
                                    }
                                    echo "</tr>";
                                }
                        
                        echo "</tr>";
                        
                        echo "<tr><td colspan='12' style='height:40px'></td></tr>";

                    }
                echo "</table>";
            }
            
             echo "<table  border='10'>";
                echo "<tr>";
                    echo "<td style='width:150px'> Course Code & Course Title</td>";
                    echo "<td style='width:160px'></td>";
                    echo "<td style='width:160px'></td>";
                    echo "<td style='width:160px'></td>";
                    echo "<td style='width:160px'></td>";
                    echo "<td style='width:160px'> Course Teacher's name </td>";
                    echo "<td></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td> 1st year 1st semester</td>";
                    echo "<td> 1st year 2nd semester</td>";
                    echo "<td> 2nd year 2nd semester</td>";
                    echo "<td> 3rd year 2nd semester</td>";
                    echo "<td> 4th year 2nd semester</td>";
                    echo "<td> Teacher's Name</td>";
                    echo "<td> This field for Dept.Chairman Sir</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>cse-1101 computer fundamental</td>";
                    echo "<td>cse-1102 1st 2nd</td>";
                    echo "<td>2nd 2nd semester</td>";
                    echo "<td>3rd 2nd  semester</td>";
                    echo "<td>4th 2nd  semester</td>";
                    echo "<td>MMR</td>";
                    echo "<td></td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>cse-1102 computer fundamental Lab</td>";
                    echo "<td>cse-1102 1st 2nd</td>";
                    echo "<td>2nd 2nd semester</td>";
                    echo "<td>3rd 2nd semester</td>";
                    echo "<td>4th 2n semesterd</td>";
                    echo "<td>MR</td>";
                    echo "<td></td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>cse-1103 Electrical circuit analysis</td>";
                    echo "<td>cse-1102 1st 2nd</td>";
                    echo "<td>2nd 2nd semester</td>";
                    echo "<td>3rd 2nd semester</td>";
                    echo "<td>4th 2nd semester</td>";
                    echo "<td>MHT</td>";
                    echo "<td></td>";
                echo "<tr>";
                
                echo "<tr>";
                    echo "<td>cse-1104 Electrical circuit analysis Lab</td>";
                    echo "<td>cse-1102 1st 2nd</td>";
                    echo "<td>2nd 2nd semester</td>";
                    echo "<td>3rd 2nd semester</td>";
                    echo "<td>4th 2nd semester</td>";
                    echo "<td>MA</td>";
                    echo "<td>Dr.Md. Motiur Rahman Sir </td>";
                echo "</tr>";
             
             echo "</table>";
        ?>
    </body>
</html>
