<!DOCTYPE html>
<html>
    <body>
        <h1>Hospital</h1>
        <form method="post">
            <input type="submit" name="addPatient"
                    class="button" value="add emergency patient" />
            <input type="submit" name="showPatient"
                    class="button" value="show emergency patient" />
            <input type="submit" name="editPatient"
                    class="button" value="edit emergency patient" />
            <input type="submit" name="deletePatient"
                    class="button" value="delete emergency patient" />
        </form>
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
            function addPatient() {
                echo '<form method="post" action="add_e_patient.php">
                		ID: <input type="text" name="id"><br>
                        Name: <input type="text" name="name"><br>
                        Address: <input type="text" name="address"><br>
                        Contact: <input type="text" name="contact_number"><br>
                        Gender: <input type="text" name="gender"><br>
                        <input type="submit" value="commit">
                      </form>';
            }
            function editPatient() {
                echo '<form method="post" action="edit_e_patient.php">
                		ID: <input type="text" name="id"><br>
                        Name: <input type="text" name="name"><br>
                        Address: <input type="text" name="address"><br>
                        Contact: <input type="text" name="contact_number"><br>
                        Gender: <input type="text" name="gender"><br>
                        <input type="submit" value="commit">
                      </form>';
            }
            function deletePatient() {
                echo '<form method="post" action="delete_e_patient.php">
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
                    echo "<h2>EMERGENCY PATIENT</h2><ol>";
                    $query = "SELECT * FROM emergency_patient";
                    $result = $mysqli->query($query);
                    echo '<table border="1" cellspacing="2" cellpadding="2"> 
                        <tr> 
                            <td> <font face="Monospace">ID</font> </td> 
                            <td> <font face="Monospace">Name</font> </td> 
                            <td> <font face="Monospace">Address</font> </td> 
                            <td> <font face="Monospace">Contact Number</font> </td>
                            <td> <font face="Monospace">Gender</font> </td>
                        </tr>';
                    while ($row = $result->fetch_assoc()) {
                          $field1name = $row["id"];
                          $field2name = $row["name"];
                          $field3name = $row["address"];
                          $field4name = $row["contact_number"];
                          $field5name = $row["gender"];
                          echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                                    <td> <font face="Monospace">'.$field4name.'</td> 
                                    <td> <font face="Monospace">'.$field5name.'</td> 
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