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
		<div class="col-md-12">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<?php
			include( "database.php" );
			$new2 = $_GET[ 'gid' ];
			$sql = "select * from  guest where GuEid='$new2'";
			$result = mysqli_query( $connect, $sql );
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<form action="" method="POST" name="update">
				<div class="form-group">
					Guest Email ID :
					<?php echo $row['GuEid']; ?>
				</div>
				<div class="form-group">
					Guest Name : <input type="text" name="gname" value="<?php echo $row['Gname']; ?>">
				</div>
				<div class="form-group">
					<input type="submit" value="Update!" name="update" class="btn btn-primary">
				</div>
			</form>
			<?php
			}
			?>
			<?php
			if ( isset( $_POST[ 'update' ] ) ) {
				$tempgname = $_POST[ 'gname' ];
				//below query will update the existing record of guest
				$sql = "UPDATE `guest` SET Gname='$tempgname' WHERE GuEid='$new2'";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "<br>
<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Guest updated has been deleted.
</div>";
				} else {
					// below statement will print error if SQL query fail.
					echo "<br><Strong>Guest Details Updating Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				//for close connection
				mysqli_close( $connect );
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>