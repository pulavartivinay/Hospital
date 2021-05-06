<!DOCTYPE html>
<html>
    <body>

        <h1>Hospital</h1>
        
        <?php
            echo '<body style="background-color:#383A59; color:white">';
            if(array_key_exists('addPatient', $_POST)) {
                addPatient();
            }
            else if(array_key_exists('showPatient', $_POST)) {
                showPatient();
            }
            else if(array_key_exists('editPatient', $_POST)) {
                editPatient();
            }
            else if(array_key_exists('deletePatient', $_POST)) {
                deletePatient();
            }
            else if(array_key_exists('searchPatient', $_POST)) {
                searchPatient();
            }
            function addPatient() {
                echo '<form method="post" action="add_nurse.php">
                		ID: <input type="text" name="id"><br>
                        Name: <input type="text" name="name"><br>
                        Experience: <input type="text" name="experience"><br>
                        
                        date_joined: <input type="text" name="date_joined"><br>
                        contact: <input type="text" name="contact"><br>
                        working_hrs: <input type="text" name="working_hrs"><br>
                        salary: <input type="text" name="salary"><br>
                        <input type="submit" value="commit">
                      </form>';
            }
            function editPatient() {
                echo '<form method="post" action="edit_nurse.php">
                        ID: <input type="text" name="id"><br>
                        Name: <input type="text" name="name"><br>
                        Experience: <input type="text" name="experience"><br>
                        
                        date_joined: <input type="text" name="date_joined"><br>
                        contact: <input type="text" name="contact"><br>
                        working_hrs: <input type="text" name="working_hrs"><br>
                        salary: <input type="text" name="salary"><br>
                        <input type="submit" value="commit">
                      </form>';
            }
            function deletePatient() {
                echo '<form method="post" action="delete_nurse.php">
                		ID: <input type="text" name="id"><br>
                        <input type="submit" value="commit">
                      </form>';
            }
            function showPatient() {
                try {
                    $username = "root";
                    $password = "guru";
                    $database = "hospital";
                    $table = "emergency_patient";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    echo "<h2>NURSE</h2><ol>";
                    $query = "SELECT * FROM nurse";
                    $result = $mysqli->query($query);
                    echo '<table border="1" cellspacing="2" cellpadding="2"> 
                        <tr> 
                            <td> <font face="Monospace">ID</font> </td> 
                            <td> <font face="Monospace">Name</font> </td> 
                            <td> <font face="Monospace">Experience</font> </td> 
                            
                            <td> <font face="Monospace">Date Joined</font> </td>
                            <td> <font face="Monospace">Contact</font> </td>
                            <td> <font face="Monospace">Working Hours</font> </td>
                            <td> <font face="Monospace">Salary</font> </td>
                        </tr>';
                    while ($row = $result->fetch_assoc()) {
                          $field1name = $row["id"];
                          $field2name = $row["name"];
                          $field3name = $row["experience"];
                          
                          $field5name = $row["date_joined"];
                          $field6name = $row["contact_number"];
                          $field7name = $row["working_hours"];
                          $field8name = $row["salary"];
                          echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                          
                                    <td> <font face="Monospace">'.$field5name.'</td> 
                                    <td> <font face="Monospace">'.$field6name.'</td> 
                                    <td> <font face="Monospace">'.$field7name.'</td> 
                                    <td> <font face="Monospace">'.$field8name.'</td> 
                                </tr>';
                    }
                    $result->free();
                    echo "</ol>";
                  } catch (mysqli_sql_exception $e) {
                      print "Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }
            }
            function searchPatient(){
                try {
                    $username = "root";
                    $password = "guru";
                    $database = "hospital";
                    $table = "patient";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    $SEARCHPATIENT=$_POST["searchPatient"];
                    echo "<h2>Results</h2><ol>";
                    $query = "SELECT * FROM nurse where CONCAT(`id`, `name`, `experience`, `contact_number`, `salary`, 'working_hours', 'date_joined') LIKE '%".$SEARCHPATIENT."%'";
                    $result = $mysqli->query($query);
                    echo '<table border="1" cellspacing="2" cellpadding="2"> 
                        <tr> 
                            <td> <font face="Monospace">ID</font> </td> 
                            <td> <font face="Monospace">Name</font> </td> 
                            <td> <font face="Monospace">Experience</font> </td> 
                            
                            <td> <font face="Monospace">Date Joined</font> </td>
                            <td> <font face="Monospace">Contact</font> </td>
                            <td> <font face="Monospace">Working Hours</font> </td>
                            <td> <font face="Monospace">Salary</font> </td>
                        </tr>';
                    while ($row = $result->fetch_assoc()) {
                          $field1name = $row["id"];
                          $field2name = $row["name"];
                          $field3name = $row["experience"];
                          
                          $field5name = $row["date_joined"];
                          $field6name = $row["contact_number"];
                          $field7name = $row["working_hours"];
                          $field8name = $row["salary"];
                          echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                          
                                    <td> <font face="Monospace">'.$field5name.'</td> 
                                    <td> <font face="Monospace">'.$field6name.'</td> 
                                    <td> <font face="Monospace">'.$field7name.'</td> 
                                    <td> <font face="Monospace">'.$field8name.'</td> 
                                </tr>';
                    }
                    $result->free();
                    echo "</ol>";
                    } catch (mysqli_sql_exception $e) {
                        print "Error!: " . $e->getMessage() . "<br/>";
                        die();
                    }
            }

        ?>
    </body>
</html>