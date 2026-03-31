
<?php

include_once 'includes/database.php';

// //  Define SQL statement
// $sql = "SELECT * FROM gerechten";

// //  Prepare SQL statement
// $statement = $pdo->prepare($sql);

// //  Exacute SQL statement
// $statement->execute();

// $gerechten = $statement->fetchAll();

// echo "<pre>";
// print_r($gerechten);
// echo "</pre>";

?>

<!DOCTYPE html>

<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inloggen | STRAAT</title>
  <link rel="icon" href="img/logo.png" type="image/png" alt="STRAAT logo">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- ======= HEADER ======= -->
  <header class="hero" role="banner">
    <div class="hero-bg"></div>

    <div class="hero-actions">
      <button class="hero-btn" href="index.php">Home</button>
    </div>

    <div class="logo">
      <div class="logo-mark">ST</div>
      <div class="logo-name">STRAAT</div>
      <div class="logo-tagline">Streetfood — Arnhem</div>
    </div>
  </header>

  <!-- ======= INLOG KAART ======= -->
  <div class="inlog-wrapper">
    <div class="inlog-card">

      <!-- Logo -->
      <div class="inlog-logo">ST</div>

      <h1 class="inlog-title">Welkom</h1>
      <p class="inlog-sub">Log in op uw STRAAT account</p>

      <!-- Inlogformulier -->
      <form class="inlog-form" action="login.php" method="POST">

        <div class="form-group">
          <label for="email">E-mailadres</label>
          <input type="email" id="email" name="email" placeholder="jouw@email.nl" autocomplete="email" required />
        </div>

        <div class="form-group">
          <label for="wachtwoord">Wachtwoord</label>
          <input type="password" id="wachtwoord" name="wachtwoord" placeholder="••••••••" autocomplete="current-password" required />
        </div>

        <button type="submit" class="inlog-btn">Inloggen</button>

      </form>

    </div>
  </div>

  <!-- ======= FOOTER ======= -->
  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <span class="footer-logo">ST</span>
        <span class="footer-name">STRAAT Streetfood</span>
      </div>
      <div class="footer-contact">
        <a href="mailto:straat-arnhem@straatstreetfood.nl">straat-arnhem@straatstreetfood.nl</a>
        <span class="footer-divider">·</span>
        <a href="tel:+31612345678">06 123 45 678</a>
      </div>
      <p class="footer-copy">&copy; 2026 STRAAT Streetfood. Alle rechten voorbehouden.</p>
    </div>
  </footer>

</body>
</html>
