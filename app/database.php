
<?php

//  Connectie naar database
$host = 'db';
$db = 'mydatabase';
$user = 'user';
$password = 'password';
$charset = 'utf8mb4';

//  pdo opties
$opties = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

//  dsn
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
//  Create the connection
    $pdo = new PDO($dsn, $user, $password, $opties);
//  Succes melding
    echo "Database connectie gelukt <br/>";
} catch (PDOException $e) {
//  Foutmelding
    echo $e->getMessage();
//  Stop (die)
    die("Sorry. database probleem");
}

// //  Define SQL statement
// $sql = "SELECT * FROM studenten WHERE leeftijd > 16";

// //  Prepare SQL statement
// $statement = $pdo->prepare($sql);

// //  Exacute SQL statement
// $statement->execute();

// $studenten = $statement->fetchAll();

// echo "<pre>";
// print_r($studenten);
// echo "</pre>";

?>
