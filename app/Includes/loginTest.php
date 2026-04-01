<?php

include_once 'includes/database.php';

//  Define SQL statement
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

    $email     = trim($_POST['email']);
    $wachtwoord = $_POST['wachtwoord'];

    // ── Zoek gebruiker op e-mail ─────────────────────────────────────
    $stmt = $pdo->prepare("SELECT * FROM users WHERE mail = :mail LIMIT 1");
    $stmt->execute([':mail' => $email]);
    $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

    // ── Controleer e-mail en wachtwoord ──────────────────────────────
    if (!$gebruiker) {
        $fout_email = "Onbekend e-mailadres.";
    } elseif ($gebruiker['ww'] !== $wachtwoord) {
        $fout_ww = "Verkeerd wachtwoord.";
    } else {
        // ── Inloggen gelukt: sla sessie op ──────────────────────────
        $_SESSION['gebruiker_id'] = $gebruiker['id'];
        $_SESSION['email']        = $gebruiker['mail'];
        $_SESSION['isAdmin']      = $gebruiker['isAdmin'];

        // ── Stuur door op basis van rol ──────────────────────────────
        if ($gebruiker['isAdmin'] == 1) {
            header("Location: http://localhost:8000/admin.php");
        } else {
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
                if ($fout_email) {
                    echo "<span class='fout-melding'>";
                    echo $fout_email;
                    echo "</span>";
                }
                ?>
            </div>

            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord" id="wachtwoord" placeholder="••••••••" required />
                <?php
                if ($fout_ww) {
                    echo "<span class='fout-melding'>";
                    echo $fout_ww;
                    echo "</span>";
                }
                ?>
            </div>

            <input type="submit" name="inloggen" class="inlog-btn"></input>

        </form>

    </div>
</div>
