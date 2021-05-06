<html>
        <?php
            echo '<body style="background-color:#383A59; color:white">';
            $DOCTORID=$_POST["id"];
			include '../globals.php';
            $conn = mysqli_connect("localhost",$username,$password,"hospital");
            if($conn->connect_error)
		{
			die("Failed connection:".$conn-> connect_error);

		} 
		$command = "SELECT patient_name,patient_id,reason FROM doctor_appointments where doctor_id = '$DOCTORID'";
		$ans = $conn->query($command);
    		if(mysqli_num_rows($ans) > 0)
    		{	
			echo '<table border="1" cellspacing="2" cellpadding="2">'; 
		    	echo "<tr>";
		        echo "<th><em>patient_name</em></th>";
		        echo "<th><em>patient_id</em></th>";
		        echo "<th><em>reason</em></th>";
		    	echo "</tr>";
			while($table_row = mysqli_fetch_array($ans))
			{
		    	 echo "<tr>";
			echo "<td>" .$table_row['patient_name']. "</td>";
			echo "<td>" .$table_row['patient_id']. "</td>";
			echo "<td>" .$table_row['reason']. "</td>";
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

