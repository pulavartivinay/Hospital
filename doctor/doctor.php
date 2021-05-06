<!DOCTYPE html>
<html>
    <head>
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <title>Hospital</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
	    <link rel="stylesheet" href="nice.css">

	    
    </head>
    <body>
        <h1>Hospital</h1>
        <?php
            echo '<body style="background-color:#383A59; color:white">';
            if(array_key_exists('addDoctor', $_POST)) {
                addDoctor();
            }
            else if(array_key_exists('showDoctor', $_POST)) {
                showDoctor();
                }
            else if(array_key_exists('editDoctor', $_POST)) {
                editDoctor();
            }
            else if(array_key_exists('deleteDoctor', $_POST)) {
                deleteDoctor();
            }
            else if(array_key_exists('PatientList', $_POST)) {
                PatientList();
            }
            else if(array_key_exists('SurgeryList', $_POST)) {
                SurgeryList();
            }
            else if(array_key_exists('searchDoctor', $_POST)) {
                searchDoctor();
            }
            function addDoctor() {
                 echo'<form method="post" class="main-form" action="add_doctor.php">
                       <fieldset align="center">
                       <legend>ADD DOCTOR</legend>
			<div class="form-group">
				    <label for="id">ID</label>
				    <input type="text" name="id" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="experience">Experience</label>
			    <input type="text" name="experience" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="designation">Designation</label>
			    <input type="text" name="designation" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="date_time">Date Joined</label>
			    <input type="text" name="date_joined" class="form-control" required>
			</div>
			
			<div class="form-group">
			    <label for="contact_number">Contact_number</label>
			    <input type="text" name="contact_number" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="working_hours">Working hours</label>
			    <input type="text" name="working_hours" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="salary">Salary</label>
			    <input type="text" name="salary" class="form-control" required>
			</div>
			<div class="form-check">
			    <input type="checkbox" id="accept-terms" class="form-check-input" required>
			    <label for="accept-terms" class="form-check-label">Accept Terms &amp; Conditions</label>
			</div>
			<button type="submit" class="btn btn-outline-success">Submit</button>
    		</form>';
                      
                      
            }
            function editDoctor() {
                echo'<form method="post" class="main-form" action="edit_doctor.php">
                       <fieldset align="center">
                       <legend>EDIT DOCTOR</legend>
			<div class="form-group">
				    <label for="id">ID</label>
				    <input type="text" name="id" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="experience">Experience</label>
			    <input type="text" name="experience" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="designation">Designation</label>
			    <input type="text" name="designation" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="date_time">Date Joined</label>
			    <input type="text" name="date_joined" class="form-control" required>
			</div>
			
			<div class="form-group">
			    <label for="contact_number">Contact_number</label>
			    <input type="text" name="contact_number" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="working_hours">Working hours</label>
			    <input type="text" name="working_hours" class="form-control" required>
			</div>
			<div class="form-group">
			    <label for="salary">Salary</label>
			    <input type="text" name="salary" class="form-control" required>
			</div>
			<div class="form-check">
			    <input type="checkbox" id="accept-terms" class="form-check-input" required>
			    <label for="accept-terms" class="form-check-label">Accept Terms &amp; Conditions</label>
			</div>
			<button type="submit" class="btn btn-outline-success">Submit</button>
    		</form>';
            }
            function deleteDoctor() {
                echo '<form method="post" class="main-form" action="delete_doctor.php">
                		<fieldset align="center">
                      	        <legend>DELETE DOCTOR</legend>
                		<div class="form-group">
				    <label for="id">ID</label>
				    <input type="text" name="id" class="form-control" required>
				    <button type="submit" class="btn btn-outline-success">Submit</button>
			</div>
                      </form>';
            }
            function showDoctor() {
                try {
                    include '../globals.php';
                    $database = "hospital";
                    $table = "doctor";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    
                    $query = "SELECT * FROM doctor";
                    $result = $mysqli->query($query);
                    echo '<table border="1" cellspacing="2" cellpadding="2">
                        <tr> 
                            <td> <font face="Monospace">ID</font> </td> 
                            <td> <font face="Monospace">NAME</font> </td> 
                            <td> <font face="Monospace">EXPERIENCE</font> </td> 
                            <td> <font face="Monospace">DESIGNATION</font> </td> 
                            <td> <font face="Monospace">DATE JOINED</font> </td> 
                            <td> <font face="Monospace">CONTACT NUMBER</font> </td>
                            <td> <font face="Monospace">WORKING HOURS</font> </td> 
                            <td> <font face="Monospace">SALARY</font> </td>
                        </tr>';
                     
                    while ($row = $result->fetch_assoc()) {
                          $field1name = $row["id"];
                          $field2name = $row["name"];
                          $field3name = $row["experience"];
                          $field4name = $row["designation"];
                          $field5name = $row["date_joined"];
                          $field6name = $row["contact_number"];
                          $field7name = $row["working_hours"];
                          $field8name = $row["salary"];
                          echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                                    <td> <font face="Monospace">'.$field4name.'</td> 
                                    <td> <font face="Monospace">'.$field5name.'</td> 
                                    <td> <font face="Monospace">'.$field6name.'</td> 
                                    <td> <font face="Monospace">'.$field7name.'</td> 
                                    <td> <font face="Monospace">'.$field8name.'</td> 
                                </tr>';
                      
                    }
                    
                    $result->free();
                    echo "</ol>";
                    echo '<form method="post" action="doctor.html">
                        <input type="submit" value="go back">
                      </form>';
                  } catch (mysqli_sql_exception $e) {
                      print "Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }
            }
            function PatientList() {
                echo '<form method="post" class="main-form" action="Patient_list.php">
                		<fieldset align="center">
                      	        <legend>PATIENT LIST</legend>
                		<div class="form-group">
				    <label for="id">Doctor ID</label>
				    <input type="text" name="id" class="form-control" required>
				    <button type="submit" class="btn btn-outline-success">Submit</button>
			</div>
                      </form>';
            }
            function SurgeryList() {
               echo '<form method="post" class="main-form" action="Surgeries_list.php">
                		<fieldset align="center">
                      	        <legend>PATIENT LIST</legend>
                		<div class="form-group">
				    <label for="id">Doctor ID</label>
				    <input type="text" name="id" class="form-control" required>
				    <button type="submit" class="btn btn-outline-success">Submit</button>
			</div>
                      </form>';
            }
            function searchDoctor() {
               try {
			    include '../globals.php';
			    $database = "hospital";
			    $table = "doctor";
			    $mysqli = new mysqli("localhost", $username, $password, $database);
			    $SEARCHDoctor=$_POST["searchDoctor"];
			    echo "<h2>Results</h2><ol>";
			    $query = "SELECT * FROM doctor where CONCAT(id, name, experience, designation, date_joined,contact_number,working_hours,salary) LIKE '%".$SEARCHDoctor."%'";
			    $result = $mysqli->query($query);
			   echo '<table border="1" cellspacing="2" cellpadding="2">
                        <tr> 
                            <td> <font face="Monospace">ID</font> </td> 
                            <td> <font face="Monospace">NAME</font> </td> 
                            <td> <font face="Monospace">EXPERIENCE</font> </td> 
                            <td> <font face="Monospace">DESIGNATION</font> </td> 
                            <td> <font face="Monospace">DATE JOINED</font> </td> 
                            <td> <font face="Monospace">CONTACT NUMBER</font> </td>
                            <td> <font face="Monospace">WORKING HOURS</font> </td> 
                            <td> <font face="Monospace">SALARY</font> </td>
                        </tr>';
                     
                    while ($row = $result->fetch_assoc()) {
                          $field1name = $row["id"];
                          $field2name = $row["name"];
                          $field3name = $row["experience"];
                          $field4name = $row["designation"];
                          $field5name = $row["date_joined"];
                          $field6name = $row["contact_number"];
                          $field7name = $row["working_hours"];
                          $field8name = $row["salary"];
                          echo '<tr> 
                                    <td> <font face="Monospace">'.$field1name.'</td> 
                                    <td> <font face="Monospace">'.$field2name.'</td> 
                                    <td> <font face="Monospace">'.$field3name.'</td> 
                                    <td> <font face="Monospace">'.$field4name.'</td> 
                                    <td> <font face="Monospace">'.$field5name.'</td> 
                                    <td> <font face="Monospace">'.$field6name.'</td> 
                                    <td> <font face="Monospace">'.$field7name.'</td> 
                                    <td> <font face="Monospace">'.$field8name.'</td> 
                                </tr>';
                      
                    }
                    
                    $result->free();
                    echo "</ol>";
                    echo '<form method="post" action="doctor.html">
                        <input type="submit" value="go back">
                      </form>';
                  } catch (mysqli_sql_exception $e) {
                      print "Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }
            } 
        ?>
    </body>
</html>

