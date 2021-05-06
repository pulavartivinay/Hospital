<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $DATA1=$_POST["id"];
            $DATA2=$_POST["name"];
            $DATA3=$_POST["experience"];
            $DATA4=$_POST["designation"];
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
                $query = "INSERT INTO nurse (id, name, experience, designation, date_joined, contact_number, working_hours, salary) VALUES ('$DATA1','$DATA2','$DATA3', '$DATA4','$DATA5','$DATA6','$DATA7','$DATA8')";
                
                

                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully added<br>";
                    echo "$DATA1<br>";
                    echo "$DATA2<br>";
                    echo "$DATA3<br>";
                    echo "$DATA4<br>";
                    echo "$DATA5<br>";
                    echo "$DATA6<br>";
                    echo "$DATA7<br>";
                    echo "$DATA8<br>";
                    echo '<form method="post" action="nurse.html">
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
