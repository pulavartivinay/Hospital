<html>
    <body>
        <?php
	        
            $DOCTORID=$_POST["id"];
            try {
                $username = "root";
                $password = "aMRm$2018";
                $database = "hospital";
                $table = "doctor";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "delete from doctor where id = '$DOCTORID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo '<script>alert("Successfully Deleted")</script>';
                    echo "$DOCTORID<br>";
                    echo '<form method="post" action="doctor.html">
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
