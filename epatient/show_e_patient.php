<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Emergency Patient Results</title>
</head>
<body style="background-color:#383A59; color:white">
    <div class="container">
    <?php
        try {
            include '../globals.php';
            $database = "hospital";
            $table = "emergency_patient";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            echo '<h2 style="margin:2%0%2%0%">EMERGENCY PATIENT</h2><ol>';
            $query = "SELECT * FROM emergency_patient";
            $result = $mysqli->query($query);
            echo '<table class="table table-condensed table-responsive" style="color:white"> 
                <thead class=thead-dark>
                    <tr> 
                        <th> ID </th> 
                        <th> Name </th>
                        <th> Address </th> 
                        <th> Contact Number </th> 
                        <th> Gender </th>
                    </tr>
                </thead>';
            while ($row = $result->fetch_assoc()) {
                    $field1name = $row["id"];
	            $field2name = $row["name"];
	            $field3name = $row["address"];
	            $field4name = $row["contact_number"];
	            $field5name = $row["gender"];
                    echo '<tr> 
                            <td> '.$field1name.'</td> 
                            <td> '.$field2name.'</td> 
                            <td> '.$field3name.'</td> 
                            <td> '.$field4name.'</td> 
                            <td> '.$field5name.'</td> 
                        </tr>';
            }
            $result->free();
            echo "</ol>";
            echo '<form method="post" action="epatient.html">
                        <input type="submit" value="go back">
                      </form>';
        } catch (mysqli_sql_exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    ?>
    </div>
</body>
</html>
