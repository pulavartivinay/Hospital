<html>
    <body>
        <?php
            echo '<body style="background-color:#383A59; color:white">';
            $DOCTORID=$_POST["id"];
            try {
                include '../globals.php';
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
