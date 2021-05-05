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
    <title>Edit Surgery</title>
</head>
<body style="background-color:#383A59; color:white">
    <div class="container">
    <?php
        $SURGERYID=$_POST["id"];
        $PATIENTID=$_POST["patient_id"];
        $PATIENTNAME=$_POST["patient_name"];
        $TIMEOFSURGERY=$_POST["time_of_surgery"];
        try {
            $username = "root";
            $password = "Saivipul@1729";
            $database = "hospital";
            $table = "surgery";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            $query = "update surgery set id = '$SURGERYID', patient_id = '$PATIENTID', patient_name = '$PATIENTNAME', time_of_surgery = '$TIMEOFSURGERY' where id = '$SURGERYID'";
            $result = $mysqli->query($query);
            if ($result == 1){
                echo "successfully edited<br>";
                echo "$SURGERYID<br>";
                echo "$PATIENTID<br>";
                echo "$PATIENTNAME<br>";
                echo "$TIMEOFSURGERY<br>";
                echo '<form method="post" action="surgery.html">
                        <input class="btn btn-danger" type="submit" value="Back">
                      </form>';
            } else {
                echo "FAILED TO UPDATE DATA<br>";
            }
            
        } catch (mysqli_sql_exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    ?>
    </div>
</body>
</html>