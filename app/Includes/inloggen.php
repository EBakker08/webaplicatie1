
<?php

session_start();
    
include_once 'includes/database.php';

if (isset($_POST['inloggen'])) {
    $email = trim($_POST['email']);
    $wachtwoord = $_POST['wachtwoord'];

    if (!$gebruiker) {
        $fout_email = "Onbekent e-mailadres.";
    } else if ($gebruiker['ww'] !== $wachtwoord) {
        $fout_ww = "Verkeerd wachtwoord.";
    } else {
        $_SESSION['gebruiker_id'] = $gebruiker['id'];
        $_SESSION['email'] = $gebruiker['mail'];
        $_SESSION['isAdmin'] = $gebruiker['isAdmin'];

        if ($gebruiker['isAdmin'] == 1) {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
    }
}

// //  Define SQL statement
// $sql = "SELECT * FROM users";

// //  Prepare SQL statement
// $statement = $pdo->prepare($sql);

// //  Exacute SQL statement
// $statement->execute();

// $gerechten = $statement->fetchAll();

// echo "<pre>";
// print_r($gerechten);
// echo "</pre>";

?>



<!-- ======= INLOG KAART ======= -->
<div class="inlog-wrapper">
    <div class="inlog-card">

    <!-- Logo -->
    <div class="inlog-logo">ST</div>

    <h1 class="inlog-title">Welkom</h1>
    <p class="inlog-sub">Log in op uw STRAAT account</p>

    <!-- Inlogformulier -->
    <form class="inlog-form" action="inlog.php" method="post">

        <div class="form-group">
            <label for="email">Mailadres</label>
            <input type="email" name="email" placeholder="jouw@email.nl" required <?php?>/>
        </div>

        <div class="form-group">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" name="wachtwoord" placeholder="••••••••" required />
        </div>

        <button type="submit" class="inlog-btn">Inloggen</button>

    </form>

    </div>
</div>

<?php

    // if (isset{$_POST['send']}) {
    //     $naam = $_POST["naam"]
    //     echo "hallo " . $naam;
    // }
        
?>
