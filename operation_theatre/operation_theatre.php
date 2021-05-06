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
    <title>Operation Theatre</title>
</head>
<body style="background-color:#383A59; color:white">
    <?php
        if(array_key_exists('addOperationTheatre', $_POST)) {
            addOperationTheatre();
        }
        else if(array_key_exists('showOperationTheatre', $_POST)) {
            showOperationTheatre();
        }
        else if(array_key_exists('editOperationTheatre', $_POST)) {
            editOperationTheatre();
        }
        else if(array_key_exists('deleteOperationTheatre', $_POST)) {
            deleteOperationTheatre();
        }
        else if(array_key_exists('filterOperationTheatre', $_POST)) {
            filterOperationTheatre();
        }
        function addOperationTheatre() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Fill out the details to insert</h3>';
            echo '<form method="post" action="add_operation_theatre.php">
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="id" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Surgery ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="surgery_id" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="patient_id" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Filled Status</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="availability" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Room Number</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="room_number" required>
                    </div>
                    </div>
                    <input class="btn btn-warning" type="submit" value="submit">
                </form>';
            echo '</div>';
        }
        function showOperationTheatre() {
            include 'show_operation_theatre.php';
        }
        function editOperationTheatre() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Fill out the details to edit</h3>'; 
            echo '<form method="post" action="edit_operation_theatre.php">
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="id" required>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Surgery ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="surgery_id">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="patient_id">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Filled Status</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="time_of_surgery">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Room Number</label>
                    <div class="col-sm-10">
                        <input type="text" id="colFormLabel" name="room_number">
                    </div>
                    </div>
                    <input class="btn btn-warning" type="submit" value="submit">
                </form>';
            echo '</div>';
        }
        function deleteOperationTheatre() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Enter the ID to delete</h3>'; 
            echo '<form method="post" action="delete_operation_theatre.php">
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
        function filterOperationTheatre() {
            echo '<div class="container">';
            echo '<h3 style="margin:2%0%2%0%">Enter keyword to search</h3>'; 
            echo '<form method="post" action="filter_operation_theatre.php">
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