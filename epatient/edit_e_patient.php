<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $PATIENTID=$_POST["id"];
            $PATIENTNAME=$_POST["name"];
            $PATIENTADDRESS=$_POST["address"];
            $PATIENTCONTACT=$_POST["contact_number"];
            $PATIENTGENDER=$_POST["gender"];
            try {
                include '../globals.php';
                $database = "hospital";
                $table = "emergency_patient";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "update emergency_patient set id = '$PATIENTID', name = '$PATIENTNAME', address = '$PATIENTADDRESS', contact_number = '$PATIENTCONTACT', gender = '$PATIENTGENDER' where id = '$PATIENTID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully edited<br>";
                    echo "$PATIENTID<br>";
                    echo "$PATIENTNAME<br>";
                    echo "$PATIENTADDRESS<br>";
                    echo "$PATIENTCONTACT<br>";
                    echo "$PATIENTGENDER<br>";
                    echo '<form method="post" action="epatient.html">
                        <input type="submit" value="go back">
                      </form>';
                } else {
                    echo "FAILED TO UPDATE DATA<br>";
                }
                
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 
