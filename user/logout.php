<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
</head>
<body style="background-color:#383A59; color:white">
    <h2>Logging out</h2>
    <?php
        file_put_contents("../globals.php", "");
        header('Location: ../user.html');
    ?>
</body>
</html>