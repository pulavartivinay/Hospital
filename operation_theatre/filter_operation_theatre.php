<html>
    <body>
        <?php
	        echo '<body style="background-color:#383A59; color:white">';
            $SEARCHKEY=$_POST["searchkey"];
            try {
                $username = "root";
                $password = "Saivipul@1729";
                $database = "hospital";
                $table = "operation_theatre";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "SELECT * FROM operation_theatre WHERE CONCAT(id, surgery_id, patient_id, availability, room_number) LIKE '%".$SEARCHKEY."%'";
                $result = $mysqli->query($query);
                echo '<table border="1" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Monospace">ID</font> </td> 
                    <td> <font face="Monospace">Surgery ID</font> </td> 
                    <td> <font face="Monospace">Patient ID</font> </td> 
                    <td> <font face="Monospace">Availability</font> </td> 
                    <td> <font face="Monospace">Room Number</font> </td>
                </tr>';
                while ($row = $result->fetch_assoc()) {
                        $field1name = $row["id"];
                        $field2name = $row["surgery_id"];
                        $field3name = $row["patient_id"];
                        $field4name = $row["availability"];
                        $field5name = $row["room_number"];
                        echo '<tr> 
                                <td> <font face="Monospace">'.$field1name.'</td>
                                <td> <font face="Monospace">'.$field2name.'</td>
                                <td> <font face="Monospace">'.$field3name.'</td>
                                <td> <font face="Monospace">'.$field4name.'</td>
                                <td> <font face="Monospace">'.$field5name.'</td>
                            </tr>';
                }
                $result->free();
                echo "</ol>";
                
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 
