<?php
        echo '<body style="background-color:#383A59; color:white">';
    $BILLINGID=$_POST["id"];
    try {
        $username = "root";
        $password = "";
        $database = "hospital";
        $table = "billing";
        $mysqli = new mysqli("localhost", $username, $password, $database);
        $query = "DELETE FROM billing where id = '$BILLINGID'";
        $result = $mysqli->query($query);
        if ($result == 1){
            echo '<script>alert("Succesfully deleted")</script>';
            echo "successfully deleted<br>";
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
            echo '<script>alert("FAILED TO DELETE DATA")</script>';
            echo "FAILED TO DELETE DATA<br>";
        }
    } catch (mysqli_sql_exception $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?> 
