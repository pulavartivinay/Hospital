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
    <title>Surgery</title>
</head>
<body style="background-color:#383A59; color:white">
    <?php
        if(array_key_exists('addSurgery', $_POST)) {
            addSurgery();
        }
        else if(array_key_exists('showSurgery', $_POST)) {
            showSurgery();
        }
        else if(array_key_exists('editSurgery', $_POST)) {
            editSurgery();
        }
        else if(array_key_exists('deleteSurgery', $_POST)) {
            deleteSurgery();
        }
        else if(array_key_exists('filterSurgery', $_POST)) {
            filterSurgery();
        }
        function addSurgery() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Fill out the details to insert</h3>';
            echo '<form method="post" action="add_surgery.php">
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="id" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="patient_id" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="patient_name" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Time Of Surgery</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="time_of_surgery" required>
                    </div>
                    </div>
                    <input class="btn btn-warning" type="submit" value="submit">
                </form>';
            echo '</div>';
        }
        function showSurgery() {
            include 'show_surgery.php';
        }
        function editSurgery() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Fill out the details to edit</h3>'; 
            echo '<form method="post" action="edit_surgery.php">
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="id" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="patient_id">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="patient_name">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Time Of Surgery</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="time_of_surgery">
                    </div>
                    </div>
                    <input class="btn btn-warning" type="submit" value="submit">
                </form>';
            echo '</div>';
        }
        function deleteSurgery() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Enter the ID to delete</h3>'; 
            echo '<form method="post" action="delete_surgery.php">
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="id" required>
                    </div>
                    </div>
                    <input class="btn btn-warning" type="submit" value="submit">
                </form>';
            echo '</div>';
        }
        function filterSurgery() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Enter keyword to search</h3>'; 
            echo '<form method="post" action="filter_surgery.php">
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Search Keyword</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="searchkey" required>
                    </div>
                    </div>
                    <input class="btn btn-warning" type="submit" value="submit">
                </form>';
            echo '</div>';
        }
    ?>
</body>
</html>