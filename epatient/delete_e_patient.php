<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $PATIENTID=$_POST["id"];
            try {
                $username = "root";
                $password = "Saivipul@1729";
                $database = "hospital";
                $table = "emergency_patient";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "delete from emergency_patient where id = '$PATIENTID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully deleted<br>";
                    echo "$PATIENTID<br>";
                    echo "$PATIENTNAME<br>";
                    echo "$PATIENTADDRESS<br>";
                    echo "$PATIENTCONTACT<br>";
                    echo "$PATIENTGENDER<br>";
                    echo '<form method="post" action="epatient.html">
                        <input type="submit" value="go back">
                      </form>';
                } else {
                    echo "FAILED TO DELETE DATA<br>";
                }
                
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 

