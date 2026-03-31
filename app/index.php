
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
  <title>Home | STRAAT</title>
  <link rel="icon" href="img/logo.png" type="image/png" alt="STRAAT logo">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header class="hero" role="banner">

    <!-- Decoratieve achtergrondlaag met kleurverlopen -->
    <div class="hero-bg"></div>

    <div class="hero-actions">
      <a href="http://localhost:8000/admin.php" class="hero-btn">⚙ Admin</a>  <!-- Verander straks naar in if statement. -->
      <a href="http://localhost:8000/inlog.php" class="hero-btn">Inloggen</a>  <!-- Verander straks naar in if statement. -->
    </div>

    <!-- Gecentreerd logo: oranje blokje + naam + tagline -->
    <div class="logo">
      <div class="logo-mark">ST</div>
      <div class="logo-name">STRAAT</div>
      <div class="logo-tagline">Streetfood — Arnhem</div>
    </div>

  </header>

  <nav class="nav-strip" role="navigation" aria-label="Menu navigatie">

    <div class="search-wrap">
      
      <?php
      
      include_once 'includes/searchbar.php';

      ?>

    </div>

  </nav>

  <?php

  if (!empty($zoekopdracht)) {
    echo "<style>.menu-section { display: none; }</style>";
    echo "<div class='search-results'>";
    if (empty($menuItems)) {
      echo "<p>Geen resultaten voor " . htmlspecialchars($zoekopdracht) . "</p>";
    } else {
      echo "<div class='product-grid'>";
      foreach ($menuItems as $item) {
        echo "<div class='product-grid'>";
        echo  "<article class='product-card'>";
        echo     "<div class='product-image'>";
        echo       "<div class='product-image-inner'>";
        echo           "<img src='img/" . $item['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
        echo       "</div>";
        echo     "</div>";
        echo     "<div class='product-body'>";
        echo       "<h3 class='product-name'>" . $item['titel'] . "</h3>";
        echo       "<p class='product-desc'>" . $item['beschrijving'] . "</p>";
        echo       "<div class='product-footer'>";
        echo         "<span class='product-price'>€ " . $item['prijs'] . "</span>";
        echo       "</div>";
        echo     "</div>";
        echo  "</article>";
        echo "</div>";
      }
      echo "</div>";
    }
    echo "</div>";
  }

  ?>

  <main class="layout">

    <section class="menu-section" aria-label="Menu">

      <!-- ── BURGERS ─────────────────────────────────────────── -->
      <div class="category-block">

        <?php
        
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten WHERE type = 'burgers'";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $burgers = $statement->fetchAll();

        if ($burgers == []) {

        } else {
          echo "<h2 class='category-title'>Burgers</h2>";
        }

        ?>

        <div class="product-grid">

        <?php

        foreach($burgers as $burger) {
          echo "<article class='product-card'>";
          echo    "<div class='product-image'>";
          echo      "<div class='product-image-inner'>";
          echo          "<img src='img/" . $burger['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
          echo      "</div>";
          if ($burger['pborange'] == 1) {
              echo    "<span class='product-badge'>Fan fave</span>";
          } else if ($burger['pbgreen'] == 1) {
              echo    "<span class='product-badge badge-green'>Vegie</span>";
          } else if ($burger['pbred'] == 1) {
              echo    "<span class='badge-spicy product-badge'>Spicy</span>";
          }
          echo    "</div>";
          echo    "<div class='product-body'>";
          echo      "<h3 class='product-name'>" . $burger['titel'] . "</h3>";
          echo      "<p class='product-desc'>" . $burger['beschrijving'] . "</p>";
          echo      "<div class='product-footer'>";
          echo        "<span class='product-price'>€ " . $burger['prijs'] . "</span>";
          echo      "</div>";
          echo    "</div>";
          echo "</article>";
        }

        ?>

        </div>
      </div>

      <!-- ── LOADED FRIES ─────────────────────────────────────── -->
      <div class="category-block">
        
        <?php
        
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten WHERE type = 'friet'";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $friet = $statement->fetchAll();

        if ($friet == []) {

        } else {
          echo "<h2 class='category-title'>Loaded Fries</h2>";
        }

        ?>

        <div class="product-grid">

        <?php

        foreach($friet as $frietje) {
          echo "<article class='product-card'>";
          echo    "<div class='product-image'>";
          echo      "<div class='product-image-inner'>";
          echo        "<img src='img/" . $frietje['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
          echo      "</div>";
          if ($frietje['pborange'] == 1) {
              echo    "<span class='product-badge'>Fan fave</span>";
          } else if ($frietje['pbgreen'] == 1) {
              echo    "<span class='product-badge badge-green'>Vegie</span>";
          } else if ($frietje['pbred'] == 1) {
              echo    "<span class='badge-spicy product-badge'>Spicy</span>";
          }
          echo    "</div>";
          echo    "<div class='product-body'>";
          echo      "<h3 class='product-name'>" . $frietje['titel'] . "</h3>";
          echo      "<p class='product-desc'>" . $frietje['beschrijving'] . "</p>";
          echo      "<div class='product-footer'>";
          echo        "<span class='product-price'>€ " . $frietje['prijs'] . "</span>";
          echo      "</div>";
          echo    "</div>";
          echo "</article>";
        }

        ?>

        </div>
      </div>

      <!-- ── KEBAB & SHOARMA ──────────────────────────────────── -->
      <div class="category-block">

        <?php
        
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten WHERE type = 'schotels'";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $schotels = $statement->fetchAll();

        if ($schotels == []) {

        } else {
          echo "<h2 class='category-title'>Schotels</h2>";
        }

        ?>

        <div class="product-grid">

        <?php

        foreach($schotels as $schotel) {
          echo "<article class='product-card'>";
          echo    "<div class='product-image'>";
          echo      "<div class='product-image-inner'>";
          echo        "<img src='img/" . $schotel['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
          echo      "</div>";
          if ($schotel['pborange'] == 1) {
              echo    "<span class='product-badge'>Fan fave</span>";
          } else if ($schotel['pbgreen'] == 1) {
              echo    "<span class='product-badge badge-green'>Vegie</span>";
          } else if ($schotel['pbred'] == 1) {
              echo    "<span class='badge-spicy product-badge'>Spicy</span>";
          }
          echo    "</div>";
          echo    "<div class='product-body'>";
          echo      "<h3 class='product-name'>" . $schotel['titel'] . "</h3>";
          echo      "<p class='product-desc'>" . $schotel['beschrijving'] . "</p>";
          echo      "<div class='product-footer'>";
          echo        "<span class='product-price'>€ " . $schotel['prijs'] . "</span>";
          echo      "</div>";
          echo    "</div>";
          echo "</article>";
        }

        ?>

        </div>
      </div>

      <!-- ── KAPSALON ─────────────────────────────────────────── -->
      <div class="category-block">

        <?php
        
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten WHERE type = 'kapsalon'";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $kapsalons = $statement->fetchAll();
        
        if ($kapsalons == []) {

        } else {
          echo "<h2 class='category-title'>Kapsalon</h2>";
        }
        
        ?>

        <div class="product-grid">

        <?php

        foreach($kapsalons as $kapsalon) {
          echo "<article class='product-card'>";
          echo    "<div class='product-image'>";
          echo      "<div class='product-image-inner'>";
          echo        "<img src='img/" . $kapsalon['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
          echo      "</div>";
          if ($kapsalon['pborange'] == 1) {
              echo    "<span class='product-badge'>Fan fave</span>";
          } else if ($kapsalon['pbgreen'] == 1) {
              echo    "<span class='product-badge badge-green'>Vegie</span>";
          } else if ($kapsalon['pbred'] == 1) {
              echo    "<span class='badge-spicy product-badge'>Spicy</span>";
          }
          echo    "</div>";
          echo    "<div class='product-body'>";
          echo      "<h3 class='product-name'>" . $kapsalon['titel'] . "</h3>";
          echo      "<p class='product-desc'>" . $kapsalon['beschrijving'] . "</p>";
          echo      "<div class='product-footer'>";
          echo        "<span class='product-price'>€ " . $kapsalon['prijs'] . "</span>";
          echo      "</div>";
          echo    "</div>";
          echo "</article>";
        }

        ?>

        </div>
      </div>

      <!-- ── DURUM ────────────────────────────────────────────── -->
      <div class="category-block">

        <?php
        
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten WHERE type = 'durum'";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $durums = $statement->fetchAll();
        
        if ($durums == []) {

        } else {
          echo "<h2 class='category-title'>Durums</h2>";
        }
        
        ?>

        <div class="product-grid">

        <?php

        foreach($durums as $durum) {
          echo "<article class='product-card'>";
          echo    "<div class='product-image'>";
          echo      "<div class='product-image-inner'>";
          echo        "<img src='img/" . $durum['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
          echo      "</div>";
          if ($durum['pborange'] == 1) {
              echo    "<span class='product-badge'>Fan fave</span>";
          } else if ($durum['pbgreen'] == 1) {
              echo    "<span class='product-badge badge-green'>Vegie</span>";
          } else if ($durum['pbred'] == 1) {
              echo    "<span class='badge-spicy product-badge'>Spicy</span>";
          }
          echo    "</div>";
          echo    "<div class='product-body'>";
          echo      "<h3 class='product-name'>" . $durum['titel'] . "</h3>";
          echo      "<p class='product-desc'>" . $durum['beschrijving'] . "</p>";
          echo      "<div class='product-footer'>";
          echo        "<span class='product-price'>€ " . $durum['prijs'] . "</span>";
          echo      "</div>";
          echo    "</div>";
          echo "</article>";
        }

        ?>

        </div>
      </div>

      <!-- ── SNACKS ───────────────────────────────────────────── -->
      <div class="category-block">
        
        <?php
        
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten WHERE type = 'snacks'";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $snacks = $statement->fetchAll();
        
        if ($snacks == []) {

        } else {
          echo "<h2 class='category-title'>Snacks</h2>";
        }
        
        ?>

        <div class="product-grid">

        <?php

        foreach($snacks as $snack) {
          echo "<article class='product-card'>";
          echo    "<div class='product-image'>";
          echo      "<div class='product-image-inner'>";
          echo        "<img src='img/" . $snack['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
          echo      "</div>";
          if ($snack['pborange'] == 1) {
              echo    "<span class='product-badge'>Fan fave</span>";
          } else if ($snack['pbgreen'] == 1) {
              echo    "<span class='product-badge badge-green'>Vegie</span>";
          } else if ($snack['pbred'] == 1) {
              echo    "<span class='badge-spicy product-badge'>Spicy</span>";
          }
          echo    "</div>";
          echo    "<div class='product-body'>";
          echo      "<h3 class='product-name'>" . $snack['titel'] . "</h3>";
          echo      "<p class='product-desc'>" . $snack['beschrijving'] . "</p>";
          echo      "<div class='product-footer'>";
          echo        "<span class='product-price'>€ " . $snack['prijs'] . "</span>";
          echo      "</div>";
          echo    "</div>";
          echo "</article>";
        }

        ?>

        </div>
      </div>

      <!-- ── DRANKEN ──────────────────────────────────────────── -->
      <div class="category-block">
        
        <?php
        
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten WHERE type = 'drankjes'";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $drankjes = $statement->fetchAll();
        
        if ($drankjes == []) {

        } else {
          echo "<h2 class='category-title'>Dranken</h2>";
        }
        
        ?>

        <div class="product-grid">

        <?php

        foreach($drankjes as $drankje) {
          echo "<article class='product-card'>";
          echo    "<div class='product-image'>";
          echo      "<div class='product-image-inner'>";
          echo        "<img src='img/" . $drankje['image'] . "' alt='Product foto' style='width:100%;height:100%;object-fit:cover;' />";
          echo      "</div>";
          if ($drankje['pborange'] == 1) {
              echo    "<span class='product-badge'>Fan fave</span>";
          } else if ($drankje['pbgreen'] == 1) {
              echo    "<span class='product-badge badge-green'>Vegie</span>";
          } else if ($drankje['pbred'] == 1) {
              echo    "<span class='badge-spicy product-badge'>Spicy</span>";
          }
          echo    "</div>";
          echo    "<div class='product-body'>";
          echo      "<h3 class='product-name'>" . $drankje['titel'] . "</h3>";
          echo      "<p class='product-desc'>" . $drankje['beschrijving'] . "</p>";
          echo      "<div class='product-footer'>";
          echo        "<span class='product-price'>€ " . $drankje['prijs'] . "</span>";
          echo      "</div>";
          echo    "</div>";
          echo "</article>";
        }

        ?>

        </div>
      </div>

    </section>

  </main>

  <!--=============================== FOOTER =============================== -->

  <footer class="site-footer">
    <div class="footer-inner">

      <!-- Links: klein logo + bedrijfsnaam -->
      <div class="footer-brand">
        <span class="footer-logo">ST</span>
        <span class="footer-name">STRAAT Streetfood</span>
      </div>

      <!-- Midden: klikbare contactgegevens -->
      <div class="footer-contact">
        <a href="/cdn-cgi/l/email-protection#a6cfc8c0c9e6d5d2d4c7c7d2c0c9c9c288c8ca"><span class="__cf_email__"
            data-cfemail="6a03040c052a191e180b0b1e0c05050e440406">straat-arnhem@straatstreetfood.nl</span></a>
        <span class="footer-divider">·</span>
        <a href="tel:+31201234567">06 123 45 678</a>
      </div>

      <!-- Rechts: copyright -->
      <p class="footer-copy">&copy; 2026 STRAAT Streetfood. Alle rechten voorbehouden.</p>

    </div>
  </footer>

  <!-- Toast notificatie element — JS voegt .show toe om het zichtbaar te maken -->
  <div class="toast" id="toast" role="status" aria-live="polite"></div>

</body>

</html>
