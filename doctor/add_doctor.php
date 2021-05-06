<html>
    <body>
        <?php
            $DOCTORID=$_POST["id"];
            $DOCTORNAME=$_POST["name"];
            $DOCTOREXPERIENCE=$_POST["experience"];
            $DOCTORDESIGNATION=$_POST["designation"];
            $DOCTORDATEJOINED=$_POST["date_joined"]; 
            $DOCTORCONTACTNUMBER=$_POST["contact_number"];
            $DOCTORWORKINGHOURS=$_POST["working_hours"];
            $DOCTORSALARY=$_POST["salary"]; 
            try {
                $username = "root";
                $password = "Saivipul@1729";
                $database = "hospital";
                $table = "doctor";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $query = "INSERT INTO doctor (id, name, experience, designation, date_joined,contact_number,working_hours,salary) VALUES ('$DOCTORID', '$DOCTORNAME', '$DOCTOREXPERIENCE', '$DOCTORDESIGNATION', '$DOCTORDATEJOINED','$DOCTORCONTACTNUMBER','$DOCTORWORKINGHOURS','$DOCTORSALARY')";
                
                $result = $mysqli->query($query);
                if ($result == 1){
                    echo '<script>alert("Successfully Added")</script>';
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
                    echo '<script>alert("FAILED TO ADD DATA")</script>';
                    echo "FAILED TO ADD DATA<br>";
                }
                
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
    </body>
</html> 
