<?php
    $BILLINGID=$_POST["id"];
    $BILLINGTYPE=$_POST["type"];
    $BILLINGPATIENT_ID=$_POST["patient_id"];
    $BILLINGAMOUNT=$_POST["amount"];
    $BILLINGDATE=$_POST["date"];
    $BILLINGCONTACT=$_POST["contact_number"]; 
    try {
        $username = "root";
        $password = "";
        $database = "hospital";
        $table = "billing";
        $mysqli = new mysqli("localhost", $username, $password, $database);
        $query = "INSERT INTO billing (id, type, patient_id, amount, date, contact_number) VALUES ('$BILLINGID', '$BILLINGTYPE', '$BILLINGPATIENT_ID', '$BILLINGAMOUNT', '$BILLINGDATE',  '$BILLINGCONTACT')";
        $result = $mysqli->query($query);
        if ($result == 1){
            echo '<script>alert("Succesfully added")</script>';
            echo "successfully added<br>";
            echo "$BILLINGID<br>";
            echo "$BILLINGTYPE<br>";
            echo "$BILLINGPATIENT_ID<br>";
            echo "$BILLINGAMOUNT<br>";
            echo "$BILLINGDATE<br>";
            echo "$BILLINGCONTACT<br>";
            echo '<form method="post" action="billing.html">
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
