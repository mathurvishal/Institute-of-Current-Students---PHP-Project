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
		<div class="col-md-5">
			<!--Student will select the exam-->
			<h3> Welcome <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			<label for="Exam"><h4>Select Exam:</h4></label>
			<div><a href="takeexam2?id=<?php echo " PHP "; ?>"><input type="submit" value="PHP Exam" name="PHP" class="btn btn-primary" style="padding: 14px 30px; font-size: 30px;"></a>

				<a href="takeexam2?id=<?php echo " .NET "; ?>"><input type="submit" value=".NET" name="dotnet" class="btn btn-primary" style="padding: 14px 30px; font-size: 30px;" ></a>
			</div>
		</div>
	</div>
<?php include('allfoot.php'); ?>