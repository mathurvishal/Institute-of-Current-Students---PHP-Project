<?php
session_start();
?>
<?php
$_SESSION["fidx"]=="";
session_unset('fidx');
header('Location:index.php');
?>