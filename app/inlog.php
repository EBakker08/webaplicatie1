<?php 

session_start();  // Start session, zodat inlog gegevens worden onthouden

include_once 'includes/inloggen.php'; // Include inloggen.php waar alles voor inloggen in staat

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
  <!-- ======= FOOTER ======= -->
  <div class="hero-actions">
    <a href="http://localhost:8000/" class="hero-btn3">Home</a>
  </div>

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
