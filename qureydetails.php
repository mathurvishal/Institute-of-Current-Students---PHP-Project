<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin.php' );
}
$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION["fname"];
?>
<?php include('fhead.php');  ?>
<div class="container">
	<div class="row">
		<?php
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {
			include( "database.php" );
			$deleteid = $_GET[ 'deleteid' ];
			$sql = "DELETE FROM `query` WHERE Qid = '$deleteid'";

			if ( mysqli_query( $connect, $sql ) ) {
				echo "
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Query Details has been deleted.
					</div>";
			} else {
				echo "<br><Strong>Query Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
			mysqli_close( $connect );
		}
		?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
			<?php
			include( "database.php" );
			$sql = "select * from  query";
			$result = mysqli_query( $connect, $sql );
			//below table will display all query posted by student or guest to faculty
			echo "<h3 class='page-header' >Query Details</h3>";
			echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>Query id</th>
					<th>Email id</th>
					<th>Query</th>
					<th>Answer</th>
					<th>Edit</th>
					<th>Delete</th>
				<tr>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<tr>
				<td>
					<?PHP echo $row['Qid'];?>
				</td>
				<td>
					<?PHP echo $row['Eid'];?>
				</td>
				<td>
					<?PHP echo $row['Query'];?>
				</td>
				<td>
					<?PHP echo $row['Ans'];?>
				</td>
				<td><a href="updatequery.php?gid=<?php echo $row['Qid']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="qureydetails.php?deleteid=<?php echo $row['Qid']; ?>"><input type="button" Value="Delete" name="" class="btn btn-info btn-sm"></a>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
	</div>
	<?php include('allfoot.php');  ?>