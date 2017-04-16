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
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {
			$deleteid = $_GET[ 'deleteid' ];
			//below will delete a particular student
			$sql = "DELETE FROM `studenttable` WHERE Eno = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Student details deleted.
</div>
";
			} else {
				echo "<br><Strong>Student Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		mysqli_close( $connect );
		?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<?php
			include( "database.php" );
			$sql = "select * from  studenttable";
			$result = mysqli_query( $connect, $sql );
			echo "<h2 class='page-header'>Student Details</h2>";
			//below will print all student details to admin
			echo "<table class='table table-striped' style='width:100%'>
<tr>
<th>Student Reg ID</th>
<th>Enrolment Number</th>
<th>First Name</th>
<th>Last Name</th>
<th>Father Name</th>
<th>Address</th>
<th>Gender</th>
<th>Course</th>
<th>DOB</th>
<th>Phone Number</th>
<th>Email</th>
<th>Password</th>
<th>Edit</th>
<th>Delete</th>		
</tr>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $row['SRegID'];?>
				</td>
				<td>
					<?PHP echo $row['Eno'];?>
				</td>
				<td>
					<?PHP echo $row['FName'];?>
				</td>
				<td>
					<?PHP echo $row['LName'];?>
				</td>
				<td>
					<?PHP echo $row['FaName'];?>
				</td>
				<td>
					<?PHP echo $row['Addrs'];?>
				</td>
				<td>
					<?PHP echo $row['Gender'];?>
				</td>
				<td>
					<?PHP echo $row['Course'];?>
				</td>
				<td>
					<?PHP echo $row['DOB'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				<td>
					<?PHP echo $row['Eid'];?>
				</td>
				<td>
					<?PHP echo $row['Pass'];?>
				</td>
				<td><a href="updatestudent.php?eno=<?php echo $row['Eno']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="StudentDetails.php?deleteid=<?php echo $row['Eno']; ?>"><input type="submit" Value="Delete" name="delete" class="btn btn-info btn-sm"></a>
				</td>
			</tr>
			<?php } ?>
			</table>
			<a href="addnewstudent"><button type="button" value="AddNewStudent" class="btn btn-info btn-sm">Add New Student</button></a>
		</div>
	</div>
	<?php include('allfoot.php'); ?>