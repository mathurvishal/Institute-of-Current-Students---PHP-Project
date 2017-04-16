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
			<h4 class="page-header">Edit Registration Details</h4>
			
			<?php
			include( "database.php" );
			$new1 = $_GET[ 'regid' ];
			//below query will print existing record of regestration detalis
			$sql = "select * from  registrationtable where RegID=$new1";
			$result = mysqli_query( $connect, $sql );
			
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<form action="" method="POST" name="update">
			
				<div class="form-group">
					First Name : <input type="text" name="fname" value="<?php echo $row['FName']; ?>">
				</div>
				<div class="form-group">
					Last Name : <input type="text" name="lname" value="<?php echo $row['LName']; ?>"><br>
				</div>
				<div class="form-group">
					Father Name : <input type="text" name="faname" value="<?PHP echo $row['FaName'];?>"><br>
				</div>
				<div class="form-group">
					D.O.B. : <input type="text" name="DOB" value="<?PHP echo $row['DOB'];?>" placeholder="YYYY-MM-DD"><br>
				</div>
				<div class="form-group">
					Addres : <input type="text" name="addrs" value="<?PHP echo $row['Addrs'];?>"><br>
				</div>
				<div class="form-group">
					Gender : <input type="text" name="g" value="<?PHP echo $row['Gender'];?>"><br>
				</div>
				<div class="form-group">
					Phone Number : <input type="tel" name="phno" value="<?PHP echo $row['PhNo'];?>" maxlength="10"><br>
				</div>
				<div class="form-group">
					Email : <input type="text" name="email" value="<?PHP echo $row['Eid'];?>" readonly><br>
				</div>
				<div class="form-group">
					Password : <input type="text" name="pass" value="<?PHP echo $row['Pass'];?>"><br>
				</div><br>
				<div class="form-group">
					<input type="submit" value="Update!" name="update" class="btn btn-primary">

			</form>
			<?php
			}
			?>

			<?php
			if ( isset( $_POST[ 'update' ] ) ) {
				$tempfname = $_POST[ 'fname' ];
				$templname = $_POST[ 'lname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'g' ];
				$tempphno = $_POST[ 'phno' ];
				$temppass = $_POST[ 'pass' ];
				//below query will update the regestration details 
				$sql = "UPDATE `registrationtable` SET Fname='$tempfname', Lname='$templname', FaName='$tempfaname', Gender='$tempgender', Addrs='$tempaddrs', PhNo=$tempphno, Pass='$temppass' WHERE RegID=$new1";

				$ss = mysqli_query( $connect, $sql );

				echo "<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Details has been updated.
</div>
";

			}
			?>
			</div>
		</div>
		<?php include('allfoot.php'); ?>