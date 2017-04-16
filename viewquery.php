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
$seid=$_GET['eid'];
//below query will print the existing record of query
$sql="SELECT * FROM query WHERE Eid='$seid'";
$rs=mysqli_query($connect,$sql);
echo "<h2 class='page-header'>Query View</h2>";
echo "<table class='table table-striped' style='width:100%'>
<tr>
<th>Query ID</th>
<th>Query</th>
<th>Ans</th>						
</tr>";
while($row=mysqli_fetch_array($rs))
{
?>
			<tr>
				<td>
					<?PHP echo $row['Qid'];?>
				</td>
				<td>
					<?PHP echo $row['Query'];?>
				</td>
				<td>
					<?PHP echo $row['Ans'];?>
				</td>
			</tr>
			<?php
			}
			?>
			</table>
			<a href="askquery.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-primary">Ask New Query</button></a>
		</div>
	</div>
	<?php include('allfoot.php'); ?>