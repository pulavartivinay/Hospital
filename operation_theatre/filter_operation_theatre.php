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
    <title>Filtered Results</title>
</head>
<body style="background-color:#383A59; color:white">
    <div class="container">
    <?php
        $SEARCHKEY=$_POST["searchkey"];
        try {
            $username = "root";
            $password = "Saivipul@1729";
            $database = "hospital";
            $table = "operation_theatre";
            $mysqli = new mysqli("localhost", $username, $password, $database);
            echo "<h2>Rows Containing '$SEARCHKEY'</h2><ol>";
            $query = "SELECT * FROM operation_theatre WHERE CONCAT(id, surgery_id, patient_id, availability, room_number) LIKE '%".$SEARCHKEY."%'";
            $result = $mysqli->query($query);
            echo '<table class="table table-condensed table-responsive" style="color:white"> 
                    <thead class="thead-dark">
                    <tr> 
                        <th> ID </th> 
                        <th> Surgery ID </th>
                        <th> Patient ID </th> 
                        <th> Filled Status </th> 
                        <th> Room Number </th>
                    </tr>
                    </thead>';
            while ($row = $result->fetch_assoc()) {
                    $field1name = $row["id"];
                    $field2name = $row["surgery_id"];
                    $field3name = $row["patient_id"];
                    $field4name = $row["availability"];
                    $field5name = $row["room_number"];
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
        } catch (mysqli_sql_exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    ?>
    </div>
</body>
</html>