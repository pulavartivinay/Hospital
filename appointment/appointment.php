<!DOCTYPE html>
<html>
    <head>
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <title>Hospital</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
	    <link rel="stylesheet" href="nice.css">

	    
    </head>
    <body>
        <h1>Hospital</h1>
        <?php
            echo '<body style="background-color:#383A59; color:white">';
            if(array_key_exists('addAppointment', $_POST)) {
                addAppointment();
            }
            else if(array_key_exists('showAppointment', $_POST)) {
                showAppointment();
                }
            else if(array_key_exists('editAppointment', $_POST)) {
                editAppointment();
            }
            else if(array_key_exists('deleteAppointment', $_POST)) {
                deleteAppointment();
            }
            else if(array_key_exists('searchAppointment', $_POST)) {
                searchAppointment();
            }
            function addAppointment() {
               /* echo '<form method="post" action="add_appointment.php">
                		ID: <input type="text" name="id"><br>
                        Patient_Id: <input type="text" name="patient_id"><br>
                        patient_name: <input type="text" name="patient_name"><br>
                        date_and_time: <input type="text" name="date_and_time"><br>
                        reason: <input type="text" name="reason"><br>
                        <input type="submit" value="commit">
                      </form>';*/
                      echo '<h2 style="margin-top:5%;margin-left:40%;">Add  Details</h2>
        		<form method="post" action="add_appointment.php">
        		<div style="margin-top:1%;margin-left:40%;font-size:25px;">
        		ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id"><br><br><br>
               	 Patient_Id:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="patient_id"><br><br><br>
                	patient_name:  &nbsp;<input type="text" name="patient_name"><br><br><br>
                	date_and_time:   &nbsp;&nbsp;<input type="text" name="date_and_time"><br><br><br>
                	reason:   &nbsp;&nbsp;&nbsp;<input type="text" name="reason"><br><br><br>
                	<button type="submit" class="btn btn-outline-success">Submit</button>
                	</div>
              		</form>';    
            }
            function editAppointment() {
                echo '<h2 style="margin-top:5%;margin-left:40%;">Edit  Details</h2>
        		<form method="post" action="edit_appointment.php">
        		<div style="margin-top:1%;margin-left:40%;font-size:25px;">
        		ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id"><br><br><br>
               	 Patient_Id:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="patient_id"><br><br><br>
                	patient_name:  &nbsp;<input type="text" name="patient_name"><br><br><br>
                	date_and_time:   &nbsp;&nbsp;<input type="text" name="date_and_time"><br><br><br>
                	reason:   &nbsp;&nbsp;&nbsp;<input type="text" name="reason"><br><br><br>
                	<button type="submit" class="btn btn-outline-success">Submit</button>
                	</div>
              		</form>';  
            }
            function deleteAppointment() {
                echo '<form method="post" action="delete_appointment.php">
                		ID: <input type="text" name="id"><br>
                        
                        <input type="submit" value="commit">
                      </form>';
            }
            function showAppointment() {
                try {
                    include '../globals.php';
                    $database = "hospital";
                    $table = "appointment";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    echo "<h2>Appointments</h2><ol>";
                    $query = "SELECT * FROM appointment";
                    $result = $mysqli->query($query);
                    echo '<table border="1" cellspacing="2" cellpadding="2"> 
                        <tr> 
                            <td> <font face="Monospace">ID</font> </td> 
                            <td> <font face="Monospace">Patient_ID</font> </td> 
                            <td> <font face="Monospace">Patient_Name</font> </td> 
                            
                            <td> <font face="Monospace">Date_and_Time</font> </td> 
                            <td> <font face="Monospace">reason</font> </td>
                        </tr>';
                     
                    while ($row = $result->fetch_assoc()) {
                          $field1name = $row["id"];
                          $field2name = $row["patient_id"];
                          $field3name = $row["patient_name"];
                          
                          $field5name = $row["date_and_time"];
                          $field6name = $row["reason"];
                          echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                                    
                                    <td> <font face="Monospace">'.$field5name.'</td> 
                                    <td> <font face="Monospace">'.$field6name.'</td>  
                                </tr>';
                    }
                    
                    $result->free();
                    echo "</ol>";
                    echo '<form method="post" action="appointment.html">
                        <input type="submit" value="go back">
                      </form>';
                  } catch (mysqli_sql_exception $e) {
                      print "Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }
            }
            function searchAppointment() {
               try {
			    include '../globals.php';
			    $database = "hospital";
			    $table = "appointment";
			    $mysqli = new mysqli("localhost", $username, $password, $database);
			    $SEARCHAppointment=$_POST["searchAppointment"];
			    echo "<h2>Results</h2><ol>";
			    $query = "SELECT * FROM appointment where CONCAT(id,patient_id, patient_name, date_and_time, reason) LIKE '%".$SEARCHAppointment."%'";
			    $result = $mysqli->query($query);
			   echo '<table border="1" cellspacing="2" cellpadding="2"> 
                        <tr> 
                            <td> <font face="Monospace">ID</font> </td> 
                            <td> <font face="Monospace">Patient_ID</font> </td> 
                            <td> <font face="Monospace">Patient_Name</font> </td> 
                            
                            <td> <font face="Monospace">Date_and_Time</font> </td> 
                            <td> <font face="Monospace">reason</font> </td>
                        </tr>';
                     
                    while ($row = $result->fetch_assoc()) {
                          $field1name = $row["id"];
                          $field2name = $row["patient_id"];
                          $field3name = $row["patient_name"];
                          
                          $field5name = $row["date_and_time"];
                          $field6name = $row["reason"];
                          echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                                    
                                    <td> <font face="Monospace">'.$field5name.'</td> 
                                    <td> <font face="Monospace">'.$field6name.'</td>  
                                </tr>';
                    }
                    
                    $result->free();
                    echo "</ol>";
                    echo '<form method="post" action="appointment.html">
                        <input type="submit" value="go back">
                      </form>';
                  } catch (mysqli_sql_exception $e) {
                      print "Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }
            } 
            
        ?>
    </body>
</html>
