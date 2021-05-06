<html>
    <body>
        <?php
	        
            $APPOINTMENT_ID=$_POST["id"];
            try {
                $username = "root";
                $password = "aMRm$2018";
                $database = "hosp";
                $table = "appointment";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "delete from Appointment where ID = '$APPOINTMENT_ID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully deleted<br>";
                    echo "$APPOINTMENT_ID<br>";
                    echo "$APPOINTMENT_PATIENT_ID<br>";
                    echo "$APPOINTMENT_PATIENT_NAME<br>";
                    
                    echo "$APPOINTMENT_DATE_TIME<br>";
                    echo "$APPOINTMENT_REASON<br>";
                    echo '<form method="post" action="appointment.html">
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
