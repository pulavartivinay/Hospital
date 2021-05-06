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
    else if(array_key_exists('service', $_POST)) {
        service();
    }
    function addPatient() {
        echo '<h2 style="margin-top:5%;margin-left:40%;">Add Patient Details</h2>
        <form method="post" action="add_patient.php">
        	<div style="margin-top:1%;margin-left:40%;font-size:25px;">
        		ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id"><br><br><br>
                Name:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name"><br><br><br>
                Address:  &nbsp;<input type="text" name="address"><br><br><br>
                Contact:   &nbsp;&nbsp;<input type="text" name="contact_number"><br><br><br>
                Gender:   &nbsp;&nbsp;&nbsp;<input type="text" name="gender"><br><br><br>
                <input type="submit" value="commit">
                </div>
              </form>';
    }
    function showPatient() {
        try {
            $username = "root";
            $password = "Saivipul@1729";
            $database = "hospital";
            $table = "patient";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            echo "<h2>PATIENT</h2><ol>";
            $query = "SELECT * FROM patient";
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
    function editPatient(){
        echo '<h2 style="margin-top:5%;margin-left:40%;">Edit Patient Details</h2>
        <form method="post" action="edit_patient.php">
        	<div style="margin-top:1%;margin-left:40%;font-size:25px;">
        		ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id"><br><br><br>
                Name:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name"><br><br><br>
                Address:  &nbsp;<input type="text" name="address"><br><br><br>
                Contact:   &nbsp;&nbsp;<input type="text" name="contact_number"><br><br><br>
                Gender:   &nbsp;&nbsp;&nbsp;<input type="text" name="gender"><br><br><br>
                <input type="submit" value="commit">
                </div>
              </form>';
    }
    function deletePatient(){
        echo '<form method="post" action="delete_patient.php">
        		ID: <input type="text" name="id"><br>
                <input type="submit" value="commit">
              </form>';
    }
    function searchPatient() {
        try {
            $username = "root";
            $password = "Saivipul@1729";
            $database = "hospital";
            $table = "patient";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            $SEARCHPATIENT=$_POST["searchPatient"];
            echo "<h2>Results</h2><ol>";
            $query = "SELECT * FROM patient where CONCAT(`name`, `address`, `contact_number`, `gender`) LIKE '%".$SEARCHPATIENT."%'";
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
    function service() {
        try {
            $username = "root";
            $password = "Saivipul@1729";
            $database = "hospital";
            $table = "patient";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            $SEARCHSERVICE=$_POST["service"];
            echo "<h2>Results for service $SEARCHSERVICE</h2><ol>";
            $query = "call patients_service_taken('$SEARCHSERVICE')";
            $result = $mysqli->query($query);
            echo '<table border="1" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Monospace">Patient ID</font> </td> 
                </tr>';
            while ($row = $result->fetch_assoc()) {
                  $field1name = $row["patient_ID"];
                  echo '<tr> 
                            <td> <font face="Monospace">'.$field1name.'</td>
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
