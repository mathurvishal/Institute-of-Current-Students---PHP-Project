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
			$new3 = $_GET[ 'eno' ];
			//below query will print the existing record of student
			$sql = "select * from  studenttable where Eno=$new3";
			$result = mysqli_query( $connect, $sql );

			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<form action="" method="POST" name="update">
				<div class="form-group">
					Register ID : <input type="text" name="sregid" value="<?php echo $row['SRegID']; ?>" readonly>
				</div>
				<div class="form-group">
					Enrolment number : <input type="text" name="eno" value="<?php echo $row['Eno']; ?>" readonly>
				</div>
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
					Addres : <input type="text" name="addrs" value="<?PHP echo $row['Addrs'];?>"><br>
				</div>
				<div class="form-group">
					Gender : <input type="text" name="gender" value="<?PHP echo $row['Gender'];?>"><br>
				</div>
				<div class="form-group">
					Course : <input type="text" name="course" value="<?PHP echo $row['Course'];?>"><br>
				</div>
				<div class="form-group">
					D.O.B. : <input type="text" name="DOB" value="<?PHP echo $row['DOB'];?>" readonly><br>
				</div>
				<div class="form-group">
					Phone Number : <input type="text" name="phno" value="<?PHP echo $row['PhNo'];?>" maxlength="10"><br>
				</div>
				<div class="form-group">
					Email : <input type="text" name="email" value="<?PHP echo $row['Eid'];?>" readonly><br>
				</div>
				<div class="form-group">
					Password : <input type="text" name="pass" value="<?PHP echo $row['Pass'];?>"><br>
				</div><br>
				<div class="form-group">

					<input type="submit" value="Update!" name="update" class="btn btn-primary">
				</div>
			</form>
			<?php
			}
			?>

			<?php

			if ( isset( $_POST[ 'update' ] ) ) {
				$tempsregid = $_POST[ 'sregid' ];
				$tempeno = $_POST[ 'eno' ];
				$tempfname = $_POST[ 'fname' ];
				$templname = $_POST[ 'lname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'gender' ];
				$tempcourse = $_POST[ 'course' ];
				$tempphno = $_POST[ 'phno' ];
				$tempeid = $_POST[ 'email' ];
				$temppass = $_POST[ 'pass' ];
				//below query will update the existing record of student
				$sql = "UPDATE `studenttable` SET SRegID='$tempsregid', Eno='$tempeno', FName='$tempfname', LName='$templname', FaName='$tempfaname', Gender='$tempgender', Course='$tempcourse', Addrs='$tempaddrs', PhNo=$tempphno, Eid='$tempeid', Pass='$temppass'  WHERE Eno=$new3";


				if ( mysqli_query( $connect, $sql ) ) {
					echo "

<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Student Details has been updated.
</div>

";
				} else {
					//below statement will print error if SQL query fail.
					echo "<br><Strong>Student Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				//for close connection
				mysqli_close( $connect );

			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>