<html>
        <?php
            echo '<body style="background-color:#383A59; color:white">';
            $DOCTORID=$_POST["id"];
            $conn = mysqli_connect("localhost","root","aMRm$2018","hosp");
            if($conn->connect_error)
		{
			die("Failed connection:".$conn-> connect_error);

		} 
		$command = "SELECT patient_id,patient_name,time_of_surgery FROM doctor_perform_surgery where doctor_id = '$DOCTORID'";
		$ans = $conn->query($command);
    		if(mysqli_num_rows($ans) > 0)
    		{	
			echo '<table border="1" cellspacing="2" cellpadding="2">'; 
		    	echo "<tr>";
		        echo "<th><em>patient_id</em></th>";
		        echo "<th><em>patient_name</em></th>";
		        echo "<th><em>time_of_surgery</em></th>";
		    	echo "</tr>";
			while($table_row = mysqli_fetch_array($ans))
			{
		    	 echo "<tr>";
			echo "<td>" .$table_row['patient_Id']. "</td>";
			echo "<td>" .$table_row['patient_name']. "</td>";
			echo "<td>" .$table_row['time_of_surgery']. "</td>";
		    	echo "</tr>";
			}
        	      echo "</table>";
        }
   	  else
   	  {
        	echo "Empty Query";     
    	 }?>
        </table>
    </body>
</html> 

