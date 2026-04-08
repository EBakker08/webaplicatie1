<?php

session_start();    // Start session

session_unset();    // Clear alle opgeslagen dingen door de session

session_destroy();  // Destroy de session

session_start();    // Start een nieuwe session

session_regenerate_id(true);    // Regenerate session ID

header("Location: http://localhost:8000/inlog.php");    // Stuur gebruiker terug naar inlog pagina

exit(); // Stop de rest van het laden van de pagina

?>
