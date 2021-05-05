<?php
    echo '<body style="background-color:#383A59; color:white">';
    if(array_key_exists('addBilling', $_POST)) {
        addBilling();
    }
    else if(array_key_exists('editBilling', $_POST)) {
        editBilling();
    }
    else if(array_key_exists('deleteBilling', $_POST)) {
        deleteBilling();
    }
    else if(array_key_exists('showBilling', $_POST)) {
        showBilling();
    }
    else if(array_key_exists('searchBilling', $_POST)) {
        searchBilling();
    }
    else if(array_key_exists('service', $_POST)) {
        service();
    }
    function addBilling() {
    	echo '<h2 style="margin-top:5%;margin-left:40%;">Add Billing Details</h2>
        <form method="post" action="add_billing.php">
        	<div style="margin-top:1%;margin-left:40%;font-size:25px;">
        		ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id"><br><br><br>
                Type:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="type"><br><br><br>
                Patient_ID:  &nbsp;<input type="text" name="patient_id"><br><br><br>
                Amount: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="amount"><br><br><br>
                Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="date"><br><br><br>
                Contact:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="contact_number"><br><br><br>
                <input type="submit" value="commit">
                </div>
              </form>';
    }
    function editBilling() {
        echo '<h2 style="margin-top:5%;margin-left:40%;">Edit Billing Details</h2>
        <form method="post" action="edit_billing.php">
        	<div style="margin-top:1%;margin-left:40%;font-size:25px;">
        		ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id"><br><br><br>
                Type:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="type"><br><br><br>
                Patient_ID:  &nbsp;<input type="text" name="patient_id"><br><br><br>
                Amount: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="amount"><br><br><br>
                Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="date"><br><br><br>
                Contact:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="contact_number"><br><br><br>
                <input type="submit" value="commit">
                </div>
              </form>';
    }
    function deleteBilling() {
        echo '<form method="post" action="delete_billing.php">
        		BILLING ID: <input type="text" name="id"><br>
                
                <input type="submit" value="commit">
              </form>';
    }
    function showBilling() {
        try {
            $username = "root";
            $password = "";
            $database = "hospital";
            $table = "billing";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            echo "<h2>BILLING</h2><ol>";
            $query = "SELECT * FROM billing";
            $result = $mysqli->query($query);
            echo '<table border="1" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Monospace">ID</font> </td> 
                    <td> <font face="Monospace">Type</font> </td> 
                    <td> <font face="Monospace">Patient_ID</font> </td>
                    <td> <font face="Monospace">Amount</font> </td> 
                    <td> <font face="Monospace">Date</font> </td>
                    <td> <font face="Monospace">Contact Number</font> </td>
                </tr>';
            while ($row = $result->fetch_assoc()) {
                  $field1name = $row["id"];
                  $field2name = $row["type"];
                  $field3name = $row["patient_id"];
                  $field4name = $row["amount"];
                  $field5name = $row["date"];
                  $field6name = $row["contact_number"];
                  echo '<tr> 
                            <td> <font face="Monospace">'.$field1name.'</td> 
                            <td> <font face="Monospace">'.$field2name.'</td> 
                            <td> <font face="Monospace">'.$field3name.'</td> 
                            <td> <font face="Monospace">'.$field4name.'</td> 
                            <td> <font face="Monospace">'.$field5name.'</td>
                            <td> <font face="Monospace">'.$field6name.'</td> 
                        </tr>';
            }
            $result->free();
            echo "</ol>";
          } catch (mysqli_sql_exception $e) {
              print "Error!: " . $e->getMessage() . "<br/>";
              die();
          }
    }
    function searchBilling() {
        try {
            $username = "root";
            $password = "";
            $database = "hospital";
            $table = "billing";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            $SEARCHBILLING=$_POST["searchBilling"];
            echo "<h2>Results for contact number: $SEARCHBILLING</h2><ol>";
            $query = "SELECT * FROM billing where contact_number LIKE '%".$SEARCHBILLING."%'";
            $result = $mysqli->query($query);
            echo '<table border="1" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Monospace">ID</font> </td> 
                    <td> <font face="Monospace">Payment mode</font> </td> 
                    <td> <font face="Monospace">Patient_ID</font> </td>
                    <td> <font face="Monospace">amount</font> </td> 
                    <td> <font face="Monospace">date</font> </td>
                    <td> <font face="Monospace">Contact Number</font> </td>
                </tr>';
            while ($row = $result->fetch_assoc()) {
                  $field1name = $row["id"];
                  $field2name = $row["type"];
                  $field3name = $row["patient_id"];
                  $field4name = $row["amount"];
                  $field5name = $row["date"];
                  $field6name = $row["contact_number"];
                  echo '<tr> 
                            <td> <font face="Monospace">'.$field1name.'</td> 
                            <td> <font face="Monospace">'.$field2name.'</td> 
                            <td> <font face="Monospace">'.$field3name.'</td> 
                            <td> <font face="Monospace">'.$field4name.'</td> 
                            <td> <font face="Monospace">'.$field5name.'</td> 
                            <td> <font face="Monospace">'.$field6name.'</td> 
                        </tr>';
            }
            $result->free();
            echo "</ol>";
          } catch (mysqli_sql_exception $e) {
              print "Error!: " . $e->getMessage() . "<br/>";
              die();
          }
    }
    function service() {
        try {
            $username = "root";
            $password = "";
            $database = "hospital";
            $table = "billing";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            $SEARCHSERVICE=$_POST["service"];
            echo "<h2>Results for payment mode: $SEARCHSERVICE</h2><ol>";
            $query = "call patients_taken_payment('$SEARCHSERVICE')";
            $result = $mysqli->query($query);
            echo '<table border="1" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Monospace">Patient ID</font> </td> 
                </tr>';
            while ($row = $result->fetch_assoc()) {
                  $field1name = $row["patient_ID"];
                  echo '<tr> 
                            <td> <font face="Monospace">'.$field1name.'</td>
                        </tr>';
            }
            $result->free();
            echo "</ol>";
          } catch (mysqli_sql_exception $e) {
              print "Error!: " . $e->getMessage() . "<br/>";
              die();
          }
    }
?>
