<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('studenthead.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?> </a></h3>
			<?php 
include('database.php');
$eid=$_GET['eid']; //get data form another page

?>
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<form action="" method="POST" name="update">
							<fieldset>
								<legend>Query Details</legend>
								<table>
									<td>
										<h3>
											<tr><strong>Email ID :</strong> </tr>
											<tr>
												<strong>
													<?php echo $eid; ?>
												</strong>
											</tr>
										</h3>
									</td>
									<table>
									</table>
									<td>
										<tr><strong><h3>Query :</h3></strong> </tr><br <tr><textarea rows="10" cols="40" name="squeryx" class="form-control" required></textarea>
										</tr>
									</td>
								</table>
								<br>
								<input type="submit" value="Post Query!" name="addq" class="btn btn-primary">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<?php
			if ( isset( $_POST[ 'addq' ] ) ) {
				//fetch data from table 
				$tempsquery = $_POST[ 'squeryx' ];
				$tempseid = $eid;
				$sql = "INSERT INTO `query`(`Query`, `Eid`) VALUES ('$tempsquery','$tempseid')";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "<br>
<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Your Query Added Successfully. Reff. No: " . mysqli_insert_id( $connect ) . "
</div>";
				} else {
					//error message if SQL query fails
					echo "<br><Strong>Query Addeding Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				//close the connection
				mysqli_close( $connect );
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>