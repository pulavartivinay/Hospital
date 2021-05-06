<!DOCTYPE html>
<html>
    <body>
        <h1>Hospital</h1>
        <?php
            
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
            function addAppointment() {
                echo '<form method="post" action="add_appointment.php">
                		ID: <input type="text" name="id"><br>
                        Patient_Id: <input type="text" name="patient_id"><br>
                        patient_name: <input type="text" name="patient_name"><br>
                        date_and_time: <input type="text" name="date_and_time"><br>
                        reason: <input type="text" name="reason"><br>
                        <input type="submit" value="commit">
                      </form>';
            }
            function editAppointment() {
                echo '<form method="post" action="edit_appointment.php">
                	 ID: <input type="text" name="id"><br>
                        Patient_Id: <input type="text" name="patient_id"><br>
                        patient_name: <input type="text" name="patient_name"><br>
                        date_and_time: <input type="text" name="date_and_time"><br>
                        reason: <input type="text" name="reason"><br>
                        <input type="submit" value="commit">
                      </form>';
            }
            function deleteAppointment() {
                echo '<form method="post" action="delete__appointment.php">
                		ID: <input type="text" name="id"><br>
                        
                        <input type="submit" value="commit">
                      </form>';
            }
            function showAppointment() {
                try {
                    $username = "root";
                    $password = "aMRm$2018";
                    $database = "hosp";
                    $table = "Appointment";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    echo "<h2>Appointments</h2><ol>";
                    $query = "SELECT * FROM Appointment";
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
                          $field1name = $row["ID"];
                          $field2name = $row["patient_ID"];
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
