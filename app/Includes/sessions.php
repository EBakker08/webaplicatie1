
<?php

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$_SESSION["naam"] = "Jan";
$_SESSION["age"] = 28;
$_SESSION["isLoggedIn"] = true;

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>
