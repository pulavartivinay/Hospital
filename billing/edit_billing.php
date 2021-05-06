<?php
    $BILLINGID=$_POST["id"];
    $BILLINGTYPE=$_POST["type"];
    $BILLINGPATIENT_ID=$_POST["patient_id"];
    $BILLINGAMOUNT=$_POST["amount"];
    $BILLINGDATE=$_POST["date"];
    $BILLINGCONTACT=$_POST["contact_number"]; 
    try {
        include '../globals.php';
        $database = "hospital";
        $table = "billing";
        $mysqli = new mysqli("localhost", $username, $password, $database);
        $query = "UPDATE billing set id = '$BILLINGID', type = '$BILLINGTYPE', patient_id = '$BILLINGPATIENT_ID', amount = '$BILLINGAMOUNT', date = '$BILLINGDATE', contact_number='$BILLINGCONTACT' where id = '$BILLINGID'";
        $result = $mysqli->query($query);
        if ($result == 1){
            echo '<script>alert("Succesfully edited")</script>';
            echo "successfully edited<br>";
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
            echo '<script>alert("FAILED TO UPDATE DATA")</script>';
            echo "FAILED TO UPDATE DATA<br>";
        }
    } catch (mysqli_sql_exception $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?> 
