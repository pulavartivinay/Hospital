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
        echo '<form method="post" action="add_operation_theatre.php">
                ID: <input type="text" name="id"><br>
                Surgery ID: <input type="text" name="surgery_id"><br>
                Patient ID: <input type="text" name="patient_id"><br>
                Availability: <input type="text" name="availability"><br>
                Room Number: <input type="text" name="room_number"><br>
                <input type="submit" value="commit">
                </form>';
    }
    function showOperationTheatre() {
        include 'show_operation_theatre.php';
    }
    function editOperationTheatre() {
        echo '<form method="post" action="edit_operation_theatre.php">
                ID: <input type="text" name="id"><br>
                Surgery ID: <input type="text" name="surgery_id"><br>
                Patient ID: <input type="text" name="patient_id"><br>
                Availability: <input type="text" name="availability"><br>
                Room Number: <input type="text" name="room_number"><br>
                <input type="submit" value="commit">
                </form>';
    }
    function deleteOperationTheatre() {
        echo '<form method="post" action="delete_operation_theatre.php">
                ID: <input type="text" name="id"><br>
                <input type="submit" value="commit">
                </form>';
    }
    function filterOperationTheatre() {
        echo '<form method="post" action="filter_operation_theatre.php">
                Search Key: <input type="text" name="searchkey"><br>
                <input type="submit" value="commit">
                </form>';
    }
?>