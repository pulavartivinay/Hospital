<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $DATA1=$_POST["id"];
            $DATA2=$_POST["name"];
            $DATA3=$_POST["experience"];
            
            $DATA5=$_POST["date_joined"];
            $DATA6=$_POST["contact"];
            $DATA7=$_POST["working_hrs"];
            $DATA8=$_POST["salary"];
            try {
                $username = "root";
                $password = "guru";
                $database = "hospital";
                $table = "emergency_patient";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "update nurse set id = '$DATA1', name = '$DATA2', experience = '$DATA3', date_joined = '$DATA5', contact_number = '$DATA6', working_hours = '$DATA7', salary = '$DATA8' where id = '$DATA1'";
                $result = $mysqli->query($query);

                if ($result == 1){
                    echo "successfully edited<br>";
                    echo "$DATA1<br>";
                    echo "$DATA2<br>";
                    echo "$DATA3<br>";
                    
                    echo "$DATA5<br>";
                    echo "$DATA6<br>";
                    echo "$DATA7<br>";
                    echo "$DATA8<br>";
                    echo '<form method="post" action="nurse.html">
                        <input type="submit" value="go back">
                      </form>';
                } else {
                    echo "FAILED TO EDIT DATA<br>";
                }

            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 