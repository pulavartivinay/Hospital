<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $OTID=$_POST["id"];
            try {
                $username = "root";
                $password = "Saivipul@1729";
                $database = "hospital";
                $table = "operation_theatre";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "delete from operation_theatre where id = '$OTID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo "successfully deleted<br>";
                    echo "$OTID<br>";
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