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
                $query = "INSERT INTO operation_theatre (id, surgery_id, patient_id, availability, room_number) VALUES ('$OTID', $SURGERYID', '$PATIENTID', '$AVAILABILITY', '$ROOMNUMBER')";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully added<br>";
                    echo "$OTID<br>"; 
                    echo "$SURGERYID<br>";
                    echo "$PATIENTID<br>";
                    echo "$AVAILABILITY<br>";
                    echo "$ROOMNUMBER<br>";
                    echo '<form method="post" action="operation_theatre.html">
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
    </body>
</html> 



