<?php session_start();  // Start session ?>

<?php

include_once 'includes/database.php'; // Include connectie naar database

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
  <title>Admin | STRAAT</title>
  <link rel="icon" href="img/logo.png" type="image/png" alt="STRAAT logo">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- ======= HEADER ======= -->
  <header class="hero" role="banner">
    <div class="hero-bg"></div>

    <div class="hero-actions">
      <a href="http://localhost:8000/" class="hero-btn">Home</a>
      <a href="http://localhost:8000/index.php" class="hero-btn is-admin">⚙ Exit</a>

      <?php
      
      if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {  // Check of gebruiker als admin is ingelogd
        if (isset($_SESSION['gebruiker_id'])) { // Als er is ingelogd als admin, show 'uitloggen' button
            echo "<a href='http://localhost:8000/uitloggen.php' class='hero-btn'>Uitloggen</a>";
        } else {  // Als er niet is ingelogd, show 'inloggen' button
            echo "<a href='http://localhost:8000/inlog.php' class='hero-btn'>Inloggen</a>";
        }
      } else {  // Anders als er is ingelogd als user...
        if (isset($_SESSION['gebruiker_id'])) { // show 'uitloggen' button
            echo "<a href='http://localhost:8000/uitloggen.php' class='hero-btn'>Uitloggen</a>";
        } else {  // Als er niet is ingelogd, show 'inloggen' button
            echo "<a href='http://localhost:8000/inlog.php' class='hero-btn'>Inloggen</a>";
        }
      }
      
      ?>
    </div>

    <div class="logo">
      <div class="logo-mark">ST</div>
      <div class="logo-name">STRAAT</div>
      <div class="logo-tagline">Streetfood — Arnhem</div>
    </div>
  </header>

  <!-- ======= ADMIN PAGINA ======= -->
  <div class="admin-page">

    <div class="admin-page-header">
      <div class="admin-page-logo">ST</div>
      <div>
        <h1 class="admin-page-title">Menu editor</h1>
        <p class="admin-page-sub">Voeg gerechten toe, pas gerechten aan of verwijder gerechten</p>
      </div>
    </div>

    <!-- De drie radio-inputs MOETEN boven de tab-bar en panels staan
         zodat de CSS sibling-selector (~) ze kan bereiken -->
    <input class="tab-radio" type="radio" name="admin-tab" id="tab-toevoegen" checked>
    <input class="tab-radio" type="radio" name="admin-tab" id="tab-aanpassen">
    <input class="tab-radio" type="radio" name="admin-tab" id="tab-verwijderen">

    <div class="tab-bar">
      <label for="tab-toevoegen">Toevoegen</label>
      <label for="tab-aanpassen">Aanpassen</label>
      <label for="tab-verwijderen">Verwijderen</label>
    </div>


    <?php
    
    include_once 'includes/adminFunctions.php'; // Include naar admin functions voor toevoegen, aanpassen en verwijderen

    ?>

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
