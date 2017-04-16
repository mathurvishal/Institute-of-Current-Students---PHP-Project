<?php
session_start();

if($_SESSION["umail"]=="" || $_SESSION["umail"]==NULL)
{
header('Location:AdminLogin.php');
}

$userid = $_SESSION["umail"];
?>
<?php include('adminhead.php'); ?>
	
	<div class="container">
    <div class="row">
			<?php
					include("database.php");
					if(isset($_REQUEST['deleteid']))	{	
					include("database.php");
					$deleteid=$_GET['deleteid'];
					//deleting a particual guest SQL Query
					$sql="DELETE FROM `guest` WHERE GuEid = '$deleteid'";

					if (mysqli_query($connect, $sql)) {
					echo "

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Guest Details has been deleted.
					</div>";
					} else {
						//error message if SQL query fails
					echo "<br><Strong>Guest Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);
					}
						//close the connection
					mysqli_close($connect);
					}
			?>
		</div>
    
    
     <div class="row">
            <div class="col-md-8">
				<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
				<?php
				include("database.php");
     			$sql="select * from  guest";
				$result=mysqli_query($connect,$sql);
				echo "<h3 class='page-header' >Guest Details</h3>";
				echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>Guest Email id</th>
					<th>Guest Name</th>
					<th>Edit</th>
					<th>Delete</th>
				<tr>";
				while($row=mysqli_fetch_array($result))
				{	?>
					
					<tr>
						 <td><?PHP echo $row['GuEid'];?></td>
						 <td><?PHP echo $row['Gname'];?></td>
						 <td><a href="updateguest.php?gid=<?php echo $row['GuEid']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a></td> 
						 <td><a href="guestdetails.php?deleteid=<?php echo $row['GuEid']; ?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a></td> 
					 </tr> 
					
				<?php } ?>
				</table>     
            </div>
	</div>
<?php include('allfoot.php'); ?>