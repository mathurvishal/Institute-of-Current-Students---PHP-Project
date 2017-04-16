<?php
session_start();
?>

<?php
$x = $_POST[ "fid" ];
$y = $_POST[ "pass" ];

include( "database.php" );
//searching login id and password entered in $x & $y
$sql = "select * from facutlytable where FID='" . $x . "' and Pass='" . $y . "'";

$result = mysqli_query( $connect, $sql );

if ( $result->num_rows > 0 )

//session create
{
	if ( $row = $result->fetch_assoc() ) {
		$_SESSION[ "fidx" ] = $row[ "FID" ];
		$_SESSION[ "fname" ] = $row[ "FName" ];

	}
	//redirecting to welcome faculty page
	header( 'Location:welcomefaculty.php' );
} else {
	//error message if SQL query fails
	echo "<h3><span style='color:red; '>Invalid Faculty ID & Password. Page Will redirect to Login Page after 3 seconds </span></h3>";
	header( "refresh:3;url=facultylogin.php" );
}
$connect->close();

?>