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
			include( "database.php" );
			$deleteid = $_GET[ 'deleteid' ];
			//delete faculty Query
			$sql = "DELETE FROM `facutlytable` WHERE FID = $deleteid";

			if ( mysqli_query( $connect, $sql ) ) {
				echo "

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Faculty Details has been deleted.
					</div>";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Faculty Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
			//close the connection
			mysqli_close( $connect );
		}
		?>
	</div>


	<div class="row">
		<div class="col-md-8">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<?php
			include( "database.php" );
			$sql = "select * from  facutlytable";
			$result = mysqli_query( $connect, $sql );
			echo "<h3 class='page-header' >Facutly Details</h3>";
			echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Father Name</th>
					<th>Addrs</th>
					<th>Gender</th>
					<th>Joining Date</th>
					<th>City</th>
					<th>Phone Number</th>
					<th>Password</th>
					<th>Edit</th>
					<th>Delete</th>
				<tr>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $row['FID'];?>
				</td>
				<td>
					<?PHP echo $row['FName'];?>
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
					<?PHP echo $row['JDate'];?>
				</td>
				<td>
					<?PHP echo $row['City'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				<td>
					<?PHP echo $row['Pass'];?>
				</td>
				<td><a href="updatefaculty.php?fid=<?php echo $row['FID']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="FacultyDetails.php?deleteid=<?php echo $row['FID']; ?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a>
				</td>
			</tr>
			<?php } ?>
			</table>
			<a href="addnewfaculty"><button type="button" value="Add New Faculty" class="btn btn-info btn-sm">Add New Faculty</button></a>

		</div>
	</div>

	<?php include('allfoot.php'); ?>