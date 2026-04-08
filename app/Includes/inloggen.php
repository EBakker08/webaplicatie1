<?php

include_once 'includes/database.php';

// Voor database connection check
// //  Define SQL statement
// $sql = "SELECT * FROM users";

// //  Prepare SQL statement
// $statement = $pdo->prepare($sql);

// //  Exacute SQL statement
// $statement->execute();

// $users = $statement->fetchAll();

// echo "<pre>";
// print_r($users);
// echo "</pre>";



$fout_email = "";
$fout_ww = "";

if (isset($_POST['inloggen'])) {

    $email = trim($_POST['email']);
    $wachtwoord = $_POST['wachtwoord'];

    // Zoek gebruiker op e-mail
    $stmt = $pdo->prepare("SELECT * FROM users WHERE mail = :mail LIMIT 1");    // Bereid SQL statement voor
    $stmt->execute([':mail' => $email]);    // Voer SQL statement uit met de opgegeven e-mail
    $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);    // Haal de gebruiker op als er een match is

    // Controleer e-mail en wachtwoord
    if (!$gebruiker) {  // Als er email fout is, of niet in de database staat...
        $fout_email = "❗Onbekend e-mailadres.";    // Verander fout_email naar deze foutmelding
    } else if ($gebruiker['ww'] !== $wachtwoord) {  // Als de gebruiker goed is maar het wachtwoord is fout...
        $fout_ww = "❗Verkeerd wachtwoord.";    // Verander fout_ww naar deze foutmelding
    } else {    // Anders sla de gegevens op
        // Als inloggen gelukt is, sla de gegevens op in de session
        $_SESSION['gebruiker_id'] = $gebruiker['id'];
        $_SESSION['email']        = $gebruiker['mail'];
        $_SESSION['isAdmin']      = $gebruiker['isAdmin'];

        // Stuur door op basis van rol
        if ($gebruiker['isAdmin'] == 1) {   // Als de gebruiker een admin is, stuur de gebruiker door naar de admin page
            header("Location: http://localhost:8000/admin.php");
        } else {    //  Anders stuur de gebruiker door naar de home page
            header("Location: http://localhost:8000/index.php");
        }
        exit();
    }
}
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
                <input type="email" name="email" id="email" placeholder="jouw@email.nl" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required />
                <?php
                if ($fout_email) {  // Als de email niet gevonden is of fout is, laat de foutmelding zien
                    echo "<span class='delete-warning'>";
                    echo $fout_email;
                    echo "</span>";
                }
                ?>
            </div>

            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord123!" required />
                <?php
                if ($fout_ww) { // Als het wachtwoord niet gevonden is of fout is, laat de foutmelding zien
                    echo "<span class='delete-warning'>";
                    echo $fout_ww;
                    echo "</span>";
                }
                ?>
            </div>

            <input type="submit" name="inloggen" class="inlog-btn"></input>

        </form>

    </div>
</div>
