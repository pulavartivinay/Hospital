<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $PATIENTID=$_POST["id"];
            try {
                $username = "root";
                $password = "guru";
                $database = "hospital";
                $table = "patient";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "delete from patient where id = '$PATIENTID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo '<script>alert("Successfully Deleted")</script>';
                    echo "successfully deleted<br>";
                    echo "$PATIENTID<br>";
                    echo '<form method="post" action="patient.html">
                        <input type="submit" value="go back">
                      </form>';
                } else {
                    echo '<script>alert("FAILED TO DELETE DATA")</script>';
                    echo "FAILED TO UPDATE DATA<br>";
                }
                
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 
