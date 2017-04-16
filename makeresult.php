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
		<div class="col-md-8">

			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

			<?php
			include( 'database.php' );
			$make = $_GET[ 'makeid' ];
			//selecting data form result table form database
			$sql = "SELECT * FROM exam WHERE ExID=$make";
			$rs = mysqli_query( $connect, $sql );
			while ( $row = mysqli_fetch_array( $rs ) ) {
				?>
			<fieldset>
				<legend>Make Result</legend>
				<form action="" method="POST" name="makeresult">
					<table class="table table-hover">

						<tr>
							<td><strong>Enrolment number  </strong>
							</td>
							<td>
								<?php $eno=$row['Eno']; 
echo $eno; ?>
							</td>

						</tr>
						<tr>
							<td><strong>Exam Name:</strong> </td>
							<td>
								<?php $ename= $row['ExamName']; echo $ename; ?>
							</td>
						</tr>
						<tr>
							<td><strong>Marks</strong> </td>
							<td>
								<select class="form-control" name="marks" required>
									<option value="">---Select---</option>
									<option value="Pass">Pass</option>
									<option value="Fail">Fail</option>
									<option value="Under Progress">Under Progress</option>
								</select>

							</td>
						</tr>
						<td><button type="submit" name="make" class="btn btn-primary">Make</button>
						</td>
						<?php
						}
						?>
						<?php 

if(isset($_POST['make']))
{
$mark= $_POST['marks'];

$sql="INSERT INTO `result`(`Eno`, `Course`, `Marks`) VALUES ($eno,'$ename','$mark')";

if (mysqli_query($connect, $sql)) {
echo "
<br><br>
<div class='alert alert-success fade in'>
<a href='ResultDetails.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Result Updated.
</div>
";
} else {
	//error message if SQL query fails
echo "<br><Strong>Result Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);

//close the connection
mysqli_close($connect);
}
}
?>
					</table>
				</form>
			</fieldset>
		</div>
	</div>
	<?php include('allfoot.php');  ?>