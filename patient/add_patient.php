<?php
    echo '<body style="background-color:#383A59; color:white">';
    $PATIENTID=$_POST["id"];
    $PATIENTNAME=$_POST["name"];
    $PATIENTADDRESS=$_POST["address"];
    $PATIENTCONTACT=$_POST["contact_number"];
    $PATIENTGENDER=$_POST["gender"];
    try {
        $username = "root";
        $password = "";
        $database = "hospital";
        $table = "patient";
        $mysqli = new mysqli("localhost", $username, $password, $database);
        $query = "INSERT INTO patient (id, name, address, contact_number, gender) VALUES ('$PATIENTID', '$PATIENTNAME', '$PATIENTADDRESS', '$PATIENTCONTACT', '$PATIENTGENDER')";
        $result = $mysqli->query($query);
        if ($result == 1){
            echo "successfully added<br>";
            echo "$PATIENTID<br>";
            echo "$PATIENTNAME<br>";
            echo "$PATIENTADDRESS<br>";
            echo "$PATIENTCONTACT<br>";
            echo "$PATIENTGENDER<br>";
            echo '<form method="post" action="patient.html">
                <input type="submit" value="go back">
              </form>';
        } else {
            echo "FAILED TO ADD DATA<br>";
        }
        
    } catch (mysqli_sql_exception $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>
