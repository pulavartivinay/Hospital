<html>
    <body>
        <?php
	    echo '<body style="background-color:#383A59; color:white">';    
            $DOCTORID=$_POST["id"];
            $DOCTORNAME=$_POST["name"];
            $DOCTOREXPERIENCE=$_POST["experience"];
            $DOCTORDESIGNATION=$_POST["designation"];
            $DOCTORDATEJOINED=$_POST["date_joined"]; 
            $DOCTORCONTACTNUMBER=$_POST["contact_number"];
            $DOCTORWORKINGHOURS=$_POST["working_hours"];
            $DOCTORSALARY=$_POST["salary"];
            try {
                include '../globals.php';
                $database = "hospital";
                $table = "doctor";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "update doctor set id = '$DOCTORID', name = '$DOCTORNAME', experience = '$DOCTOREXPERIENCE', designation = '$DOCTORDESIGNATION', date_joined = '$DOCTORDATEJOINED',contact_number='$DOCTORCONTACTNUMBER',working_hours = '$DOCTORWORKINGHOURS',salary='$DOCTORSALARY' where id = '$DOCTORID'";
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo '<script>alert("Successfully Edited")</script>';
                    echo "$DOCTORID<br>";
                    echo "$DOCTORNAME<br>";
                    echo "$DOCTOREXPERIENCE<br>";
                    echo "$DOCTORDESIGNATION<br>";
                    echo "$DOCTORDATEJOINED<br>";
                    echo "$DOCTORCONTACTNUMBER<br>";
                    echo "$DOCTORWORKINGHOURS<br>";
                    echo "$DOCTORSALARY<br>";
                    echo '<form method="post" action="doctor.html">
                        <input type="submit" value="go back">
                      </form>';
                } else {
                     echo '<script>alert("FAILED TO update DATA")</script>';
                }
                
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 
