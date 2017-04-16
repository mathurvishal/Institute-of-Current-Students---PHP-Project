<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}

$userid = $_SESSION[ "umail" ];
?>
<?php include('adminhead.php'); ?>

<div class="container">

	<div class="row">
		<?php
		include( "database.php" );
		if ( isset( $_POST[ 'addnews' ] ) ) {
			$tempfname = $_POST[ 'fname' ];
			$templname = $_POST[ 'lname' ];
			$tempfaname = $_POST[ 'faname' ];
			$tempdob = $_POST[ 'DOB' ];
			$tempaddrs = $_POST[ 'addrs' ];
			$tempgender = $_POST[ 'gender' ];
			$tempcourse = $_POST[ 'course' ];
			$tempphno = $_POST[ 'phno' ];
			$tempeid = $_POST[ 'email' ];
			$temppass = $_POST[ 'pass' ];
			//adding new student into database SQL Query
			$sql = "Insert into studenttable (FName, LName, FaName, DOB, Addrs, Gender, Course, PhNo , Eid, Pass) values ('$tempfname', '$templname', '$tempfaname', '$tempdob', '$tempaddrs' , '$tempgender', '$tempcourse' , $tempphno, '$tempeid' , '$temppass')";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "<center><div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
				<h3 style='margin-top: 10px; margin-bottom: 10px;'>Admission Confirm.! Enrolment Number is : <span style='color:black'><strong>" . mysqli_insert_id( $connect ) . "</strong></span></h4></div></center>
				";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Admission Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
			//close the connection
			mysqli_close( $connect );
		}
		?>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<h4 class="page-header">Add New Student Details</h4>
			<form action="" method="POST" name="updateform">
				<div class="form-group">
					<label for="First Name">First Name : </label>
					<input type="text" class="form-control" id="fname" name="fname" required>
				</div>

				<div class="form-group">
					<label for="Last Name">Last Name : </label>
					<input type="text" class="form-control" id="lname" name="lname" required>
				</div>

				<div class="form-group">
					<label for="Father Name">Father Name : </label>
					<input type="text" class="form-control" id="faname" name="faname" required>
				</div>

				<div class="form-group">
					<label for="DOB">D.O.B. : </label>
					<input type="text" class="form-control" id="dob" name="DOB" placeholder="YYYY-MM-DD" required>
				</div>

				<div class="form-group">
					<label for="Address">Address : </label>
					<input type="text" class="form-control" name="addrs" id="addrs" required>
				</div>

				<div class="form-group">
					<label for="Gender">Gender : &nbsp;</label>
					<input type="radio" name="gender" value="Male" id="Gender_0" checked> Male
					<input type="radio" name="gender" value="Female" id="Gender_1"> Female
				</div>

				<div class="form-group">
					<label for="Course">Course : </label>
					<input type="text" class="form-control" id="course" name="course" placeholder="Assign Course" required>
				</div>

				<div class="form-group">
					<label for="Phone Number">Phone Number : </label>
					<input type="tel" class="form-control" id="phno" name="phno" maxlength="10" required>
				</div>

				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" name="email" placeholder="John@example.com" id="email" required>
				</div>

				<div class="form-group">
					<label for="Password">Password : </label>
					<input type="password" class="form-control" id="pass" name="pass" placeholder="Type Strong Password" required>
				</div>

				<div class="form-group">
					<input type="submit" value="Admission Confirm!" name="addnews" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
	<?php include('allfoot.php'); ?>