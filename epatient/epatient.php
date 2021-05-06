<!DOCTYPE html>
<html>


    <body>



        <h1>Hospital</h1>
        <!-- <form method="post">
            <input type="submit" name="addPatient"
                    class="button" value="add emergency patient" />
            <input type="submit" name="showPatient"
                    class="button" value="show emergency patient" />
            <input type="submit" name="editPatient"
                    class="button" value="edit emergency patient" />
            <input type="submit" name="deletePatient"
                    class="button" value="delete emergency patient" />
        </form> -->
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
            else if(array_key_exists('searchTreatment', $_POST)) {
                // echo "hi";
                searchTreatment();
            }
            function addPatient() {
                echo '<h2 style="margin-top:5%;margin-left:40%;">Add Emergency Patient Details</h2>
                <form method="post" action="add_e_patient.php">
                    <div style="margin-top:1%;margin-left:40%;font-size:25px;">
                        ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id" required><br><br><br>
                        Name:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" required><br><br><br>
                        Address:  &nbsp;<input type="text" name="address"><br><br><br>
                        Contact:   &nbsp;&nbsp;<input type="text" name="contact_number"><br><br><br>
                        Gender:   &nbsp;&nbsp;&nbsp;<input type="text" name="gender"><br><br><br>
                        <input type="submit" value="commit">
                    </div>
                </form>';
            }
            function editPatient() {
                echo '<h2 style="margin-top:5%;margin-left:40%;">Edit Emergency Patient Details</h2>
                    <form method="post" action="edit_e_patient.php">
                        <div style="margin-top:1%;margin-left:40%;font-size:25px;">
                            ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id" required><br><br><br>
                            Name:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" required><br><br><br>
                            Address:  &nbsp;<input type="text" name="address"><br><br><br>
                            Contact:   &nbsp;&nbsp;<input type="text" name="contact_number"><br><br><br>
                            Gender:   &nbsp;&nbsp;&nbsp;<input type="text" name="gender"><br><br><br>
                            <input type="submit" value="commit">
                        </div>
                    </form>';
            }
            function deletePatient() {
                echo '<form method="post" action="delete_e_patient.php">
                		ID: <input type="text" name="id" required><br>
                        <input type="submit" value="commit" >
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
            function searchPatient(){
                try {
                    $username = "root";
                    $password = "guru";
                    $database = "hospital";
                    $table = "patient";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    $SEARCHPATIENT=$_POST["searchPatient"];
                    echo "<h2>Results</h2><ol>";
                    $query = "SELECT * FROM emergency_patient where CONCAT(`id`, `name`, `address`, `contact_number`, `gender`) LIKE '%".$SEARCHPATIENT."%'";
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
            function searchTreatment(){
                try {
                    // echo "hi";
                    $username = "root";
                    $password = "guru";
                    $database = "hospital";
                    $table = "patient";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    $SEARCHID=$_POST["searchTreatment"];
                    echo "<h2>Results</h2><ol>";
                    $query = "call get_treatment_details('$SEARCHID')";
                    $result = $mysqli->query($query);
                    echo '<table border="1" cellspacing="2" cellpadding="2"> 
                        <tr> 
                            <td> <font face="Monospace">Epatient ID</font> </td> 
                            <td> <font face="Monospace">Epatient Name</font> </td> 
                            <td> <font face="Monospace">Doctor ID</font> </td> 
                            <td> <font face="Monospace">Doctor Name</font> </td>
                            <td> <font face="Monospace">Nurse ID</font> </td>
                            <td> <font face="Monospace">Nurse Name</font> </td>
                        </tr>';
                    while ($row = $result->fetch_assoc()) {
                            $field1name = $row["epatient_id"];
                            $field2name = $row["epatient_name"];
                            $field3name = $row["doctor_id"];
                            $field4name = $row["doctor_name"];
                            $field5name = $row["nurse_id"];
                            $field6name = $row["nurse_name"];
                            echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                                    <td> <font face="Monospace">'.$field4name.'</td> 
                                    <td> <font face="Monospace">'.$field5name.'</td> 
                                    <td> <font face="Monospace">'.$field6name.'</td> 
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