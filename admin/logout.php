<?php
session_start();
unset($_SESSION['loggedIN']);
unset($_SESSION['userID']);

session_destroy();

header("Location: index.php");
exit;
?>