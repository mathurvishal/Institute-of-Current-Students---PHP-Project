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
include('database.php');
$editid=$_GET['gid'];
$sql="select * from query where Qid=$editid";
$result=mysqli_query($connect,$sql);

while($row=mysqli_fetch_array($result))
{ 
?>
			<form action="" method="POST" name="update">
				<fieldset>
					<legend>Query Details</legend>
					<div class="form-group">
						Qurey ID :
						<?php echo $row['Qid']; ?>
					</div>
					<div class="form-group">
						Email ID :
						<?php echo $row['Eid']; ?>
					</div>
					<div class="form-group">
						Query : <br>
						<textarea rows="5" cols="40" name="queryx">
							<?php echo $row['Query']; ?> </textarea><br>
					</div>
					<div class="form-group">
						Answer : <br>
						<textarea rows="5" cols="40" name="ansx">
							<?PHP echo $row['Ans'];?>
						</textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Update!" name="update" class="btn btn-primary">
					</div>

					<?php
					}
					?>
				</fieldset>
			</form>
			<?php
			if ( isset( $_POST[ 'update' ] ) ) {
				$tempquery = $_POST[ 'queryx' ];
				$tempans = $_POST[ 'ansx' ];
				//below query will update the existing record of query
				$sql = "UPDATE `query` SET Query='$tempquery', Ans='$tempans' WHERE Qid='$editid'";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "<br>
<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong>Query Details has been updated.
</div>";
				} else {
					//below statement will print error if SQL query fail.
					echo "<br><Strong>Query Details Updating Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				//for close connection
				mysqli_close( $connect );
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php');  ?>