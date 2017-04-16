<?php
session_start();
?>
<?php
$_SESSION["sidx"]=="";
session_unset('sidx');
header('Location:index');
?>