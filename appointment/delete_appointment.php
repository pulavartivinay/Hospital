<html>
    <body>
        <?php
	    echo '<body style="background-color:#383A59; color:white">';    
            $APPOINTMENT_ID=$_POST["id"];
            try {
                include '../globals.php';
                $database = "hospital";
                $table = "appointment";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "delete from appointment where ID = '$APPOINTMENT_ID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo '<script>alert("Successfully Deleted")</script>';
                    echo "successfully deleted<br>";
                    echo "$APPOINTMENT_ID<br>";
                    
                    echo '<form method="post" action="appointment.html">
                        <input type="submit" value="go back">
                      </form>';
                } else {
                    echo '<script>alert("Failed to Delete Data")</script>';
                    echo "FAILED TO Delete DATA<br>";
                }
                
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 
