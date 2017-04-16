<?php
session_start();
?>
<?php
$_SESSION["umail"]=="";
session_unset('umail');

header('Location:index.php');
?>