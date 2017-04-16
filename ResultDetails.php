<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>
<div class="container">
	<div class="row">
		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {
			$deleteid = $_GET[ 'deleteid' ];
			//below query will delete result details form result table
			$sql = "DELETE FROM `result` WHERE RsID = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Result details deleted.
</div>
";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Result Details Deletion Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}

		mysqli_close( $connect );
		?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

			<?php 

include('database.php');
$sql="SELECT * FROM result";
$rs=mysqli_query($connect,$sql);
echo "<h2 class='page-header'>Result Details</h2>";
echo "<table class='table table-striped' style='width:100%'>
<tr>
<th>Result ID</th>
<th>Enrolment Number</th>
<th>Course</th>
<th>Marks</th>
<th>Edit</th>
<th>Delete</th>		
</tr>";
while($row=mysqli_fetch_array($rs))
{
?>
			<tr>
				<td>
					<?PHP echo $row['RsID'];?>
				</td>
				<td>
					<?PHP echo $row['Eno'];?>
				</td>
				<td>
					<?PHP echo $row['Course'];?>
				</td>
				<td>
					<?PHP echo $row['Marks'];?>
				</td>
				<td><a href="UpdateResultDetails.php?editid=<?php echo $row['RsID']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="ResultDetails.php?deleteid=<?php echo $row['RsID']; ?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a>
				</td>
			</tr>

			<?php
			}
			?>



			</table>
		</div>

	</div>

	<?php include('allfoot.php');  ?>