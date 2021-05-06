<html>
    <body>
        <?php
	        
            $APPOINTMENT_ID=$_POST["id"];
            $APPOINTMENT_PATIENT_ID=$_POST["patient_id"];
            $APPOINTMENT_PATIENT_NAME=$_POST["patient_name"];
            
            $APPOINTMENT_DATE_TIME=$_POST["date_and_time"]; 
            $APPOINTMENT_REASON=$_POST["reason"];
            try {
                $username = "root";
                $password = "aMRm$2018";
                $database = "hosp";
                $table = "appointment";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "update Appointment set ID = '$APPOINTMENT_ID', patient_ID = '$APPOINTMENT_PATIENT_ID', patient_name = '$APPOINTMENT_PATIENT_NAME',  date_and_time = '$APPOINTMENT_DATE_TIME',reason='$APPOINTMENT_REASON' where id = '$APPOINTMENT_ID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully added<br>";
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
