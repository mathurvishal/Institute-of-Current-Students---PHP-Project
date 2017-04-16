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
		<div class="col-md-12">

			<h3> Welcome <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			<?php
			$varid = $_GET[ 'id' ];
			include( 'database.php' );
			$sql = "select * from  studenttable where Eid='$userid'";
			$sql2 = "select * from  exam where Eid='$userid'";
			$result = mysqli_query( $connect, $sql );

			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<!--exam question with student detalis-->
			<fieldset>
				<legend>Exam Details</legend>
				<form action="" method="POST" name="update">
					<div class="col-md-4">
						<table>
							<tr>
								<td><strong>Enrolment number :</strong>
								</td>
								<td>
									<?php $eno=$row['Eno'];
						echo $eno; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Name :</strong>
								</td>
								<td>
									<?php $name=$row['FName']." ".$row['LName'];
									echo $name; ?>
								</td>
							</tr>
						</table>
					</div>

					<div class="col-md-4">
						<table>
							<tr>
								<td><strong>Course :</strong>
								</td>
								<td>
									<?PHP $cc=$row['Course'];
											echo $cc; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Applied For :</strong>
								</td>
								<td>
									<?PHP echo $varid;?><br>
								</td>
							</tr>
						</table>
					</div>
					<br>
					<br>
					<hr>
					<div class="col-md-12">
						<span style="color: red;"><h3>You can test your PHP skills with PHP Exam </h3></span>

						<br>
						<div>
							<h4> <strong>Q1. What does PHP stand for?</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q1" value="o1" checked> Private Home Page
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q1" value="o2" > Personal Hypertext Processor
					</label>
						





							<label class="radio-inline">
					<input type="radio" name="q1" value="o3" > PHP: Hypertext Preprocessor
					</label>
						





						</div>

						<br>
						<br>
						<div>
							<h4> <strong>Q2. How do you write "Hello World" in PHP</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q2" value="o1" checked > Document.Write("Hello World");
					</label>
						





							<label class="radio-inline">
					<input type="radio" name="q2" value="o2" > echo "Hello World";
					</label>
						

							<label class="radio-inline">
					<input type="radio" name="q2" value="o3" > "Hello World";
					</label>
						


						</div>

						<br>
						<br>
						<div>
							<h4> <strong>Q3. All variables in PHP start with which symbol?</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q3" value="o1" checked> ! 
					</label>
						



							<label class="radio-inline">
					<input type="radio" name="q3" value="o2" > &amp;
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q3" value="o3" > &#36;
					</label>
						

						</div>

						<br>
						<br>
						<div>
							<h4> <strong>Q4. What is the correct way to end a PHP statement?</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q4" value="o1" checked > .
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q4" value="o2" > New line
						
								<label class="radio-inline">
					<input type="radio" name="q4" value="o3" > ;
					</label>
						


						</div>
						<br>
						<br>
						<div>
							<h4> <strong>Q5. The PHP syntax is most similar to:</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q5" value="o1" checked> Perl and C
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q5" value="o2" > VBScript	
								<label class="radio-inline">
					<input type="radio" name="q5" value="o3" > JavaScript
					</label>
						

						</div>
						<br><br>
						<button type="submit" name="done" class="btn btn-primary">I am Done!</button>
					</div>
				</form>
			</fieldset>
			<?php
			}
			if ( isset( $_POST[ 'done' ] ) ) {
				$tempeid = $userid;
				$tempname = $name;
				$tempeno = $eno;
				$tempcourse = $cc;
				$tempq1 = $_POST[ 'q1' ];
				$tempq2 = $_POST[ 'q2' ];
				$tempq3 = $_POST[ 'q3' ];
				$tempq4 = $_POST[ 'q4' ];
				$tempq5 = $_POST[ 'q5' ];
				$sql = "INSERT INTO `exam`(Eno, Eid, Course, ExamName, Q1, Q2, Q3, Q4, Q5) VALUES ($tempeno,'$tempeid','$tempcourse','$varid','$tempq1','$tempq2','$tempq3','$tempq4','$tempq5')";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "<br>
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Exam Have Submited.
					</div>";
				} else {
					//error message if SQL query fails
					echo "<br><Strong>Exam Submitting Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				} //close the connection
				mysqli_close( $connect );
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>