<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $OTID=$_POST["id"];
            $SURGERYID=$_POST["surgery_id"];
            $PATIENTID=$_POST["patient_id"];
            $AVAILABILITY=$_POST["availability"];
            $ROOMNUMBER=$_POST["room_number"];
            try {
                $username = "root";
                $password = "Saivipul@1729";
                $database = "hospital";
                $table = "operation_theatre";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "update operation_theatre set id = '$OTID', surgery_id = '$SURGERYID', patient_id = '$PATIENTID', availability = '$AVAILABILITY', room_number = '$ROOMNUMBER' where id = '$OTID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully edited<br>";
                    echo "$OTID<br>";
                    echo "$SURGERYID<br>";
                    echo "$PATIENTID<br>";
                    echo "$AVAILABILITY<br>";
                    echo "$ROOMNUMBER<br>";
                    echo '<form method="post" action="operation_theatre.html">
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
