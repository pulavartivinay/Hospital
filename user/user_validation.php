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
    <title>User Validation Result</title>
</head>
<body style="background-color:#383A59; color:white">
    <div class="container">
    <?php
    	ini_set('display_errors', 1);
        if(array_key_exists('login', $_POST)) {
            Login();
        }
        else if(array_key_exists('signup', $_POST)) {
            Signup();
        }
        function Login(){
            try {
                $username=$_POST["uname"];
                $password=$_POST["psw"];
                $database="hospital";
                $mysqli = new mysqli("localhost", $username, $password, $database);
                $var_str1 = var_export($username, true);
                $var_str2 = var_export($password, true);
                $var1 = "<?php\n\$username=$var_str1; \n\$password=$var_str2;\n?>";
                file_put_contents('../globals.php', $var1);
                header('Location: ../home.html');
            } catch (mysqli_sql_exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        function Signup(){
            echo "hello";
        }
    ?>
    </div>
</body>
</html>
