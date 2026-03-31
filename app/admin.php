
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
      <button class="hero-btn" href="index.php">Home</button>
      <button class="hero-btn is-admin">⚙ Exit</button>
      <button class="hero-btn">Inloggen</button>  <!-- Verander straks naar in if statement. -->
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
        <h1 class="admin-page-title">Menu beheer</h1>
        <p class="admin-page-sub">Voeg gerechten toe, pas ze aan of verwijder ze</p>
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

    <div class="tab-panels">

      <!-- ── TAB 1: TOEVOEGEN ──────────────────────────────────── -->
      <div class="tab-content" id="content-toevoegen">
        <form class="admin-form" action="admin_toevoegen.php" method="POST" enctype="multipart/form-data">

          <p class="form-section-title">Gegevens</p>

          <div class="form-row">
            <div class="form-group">
              <label for="t-naam">Naam gerecht</label>
              <input type="text" id="t-naam" name="naam" placeholder="bijv. Straat Classic" required>
            </div>
            <div class="form-group">
              <label for="t-categorie">Categorie</label>
              <select id="t-categorie" name="categorie" required>
                <option value="" disabled selected>Kies een categorie</option>
                <option value="burgers">Burgers</option>
                <option value="fries">Loaded Fries</option>
                <option value="schotels">Schotels</option>
                <option value="kapsalon">Kapsalon</option>
                <option value="durum">Durum</option>
                <option value="snacks">Snacks</option>
                <option value="dranken">Dranken</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="t-beschrijving">Beschrijving</label>
            <textarea id="t-beschrijving" name="beschrijving" placeholder="Korte omschrijving van het gerecht..."></textarea>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="t-prijs">Prijs (€)</label>
              <input type="number" id="t-prijs" name="prijs" placeholder="bijv. 13.50" step="0.01" min="0" required>
            </div>
            <div class="form-group">
              <label for="t-afbeelding">Afbeelding</label>
              <input type="file" id="t-afbeelding" name="afbeelding" accept="image/*">
            </div>
          </div>

          <hr class="form-divider">

          <p class="form-section-title">Badge</p>

          <div class="badge-options">
            <label class="badge-option">
              <input type="checkbox" name="badge_orange" value="1"> Bestseller (oranje)
            </label>
            <label class="badge-option">
              <input type="checkbox" name="badge_green" value="1"> Vegie (groen)
            </label>
            <label class="badge-option">
              <input type="checkbox" name="badge_red" value="1"> Spicy (rood)
            </label>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn-primary">+ Toevoegen</button>
            <button type="reset" class="btn-secondary">Wis velden</button>
          </div>

        </form>
      </div>

      <!-- ── TAB 2: AANPASSEN ──────────────────────────────────── -->
      <div class="tab-content" id="content-aanpassen">

        <table class="product-table">
          <thead>
            <tr>
              <th style="width:52px"></th>
              <th>Gerecht</th>
              <th>Categorie</th>
              <th>Prijs</th>
              <th>Badge</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <!-- Rij 1 -->
            <tr>
              <td><img class="tabel-img" src="https://placehold.co/96x96/e8e2d8/a09880?text=ST" alt=""></td>
              <td>
                <div class="tabel-naam">Straat Classic</div>
                <div class="tabel-desc">Black Angus smashed patty, burgersaus...</div>
              </td>
              <td>Burgers</td>
              <td class="tabel-prijs">€ 13,50</td>
              <td><span class="tabel-badge">Bestseller</span></td>
              <td><a href="#edit-1" class="btn-edit">Bewerken</a></td>
            </tr>
            <tr class="edit-form-row" id="edit-1">
              <td colspan="6">
                <form class="edit-inner" action="admin_aanpassen.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="1">
                  <div class="form-row">
                    <div class="form-group">
                      <label>Naam</label>
                      <input type="text" name="naam" value="Straat Classic">
                    </div>
                    <div class="form-group">
                      <label>Categorie</label>
                      <select name="categorie">
                        <option value="burgers" selected>Burgers</option>
                        <option value="fries">Loaded Fries</option>
                        <option value="schotels">Schotels</option>
                        <option value="kapsalon">Kapsalon</option>
                        <option value="durum">Durum</option>
                        <option value="snacks">Snacks</option>
                        <option value="dranken">Dranken</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Beschrijving</label>
                    <textarea name="beschrijving">Dikke Black Angus smashed patty, huisgemaakte burgersaus, augurk en karamelui op een brioche bun.</textarea>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <label>Prijs (€)</label>
                      <input type="number" name="prijs" value="13.50" step="0.01" min="0">
                    </div>
                    <div class="form-group">
                      <label>Nieuwe afbeelding</label>
                      <input type="file" name="afbeelding" accept="image/*">
                    </div>
                  </div>
                  <div class="badge-options">
                    <label class="badge-option"><input type="checkbox" name="badge_orange" value="1" checked> Bestseller</label>
                    <label class="badge-option"><input type="checkbox" name="badge_green"  value="1"> Vegie</label>
                    <label class="badge-option"><input type="checkbox" name="badge_red"    value="1"> Spicy</label>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn-primary">Opslaan</button>
                    <a href="#" class="btn-secondary">Annuleren</a>
                  </div>
                </form>
              </td>
            </tr>

            <!-- Rij 2 -->
            <tr>
              <td><img class="tabel-img" src="https://placehold.co/96x96/e8e2d8/a09880?text=ST" alt=""></td>
              <td>
                <div class="tabel-naam">Truffle Fries</div>
                <div class="tabel-desc">Huisgesneden friet met truffelolie...</div>
              </td>
              <td>Loaded Fries</td>
              <td class="tabel-prijs">€ 9,50</td>
              <td><span class="tabel-badge">Fan fave</span></td>
              <td><a href="#edit-2" class="btn-edit">Bewerken</a></td>
            </tr>
            <tr class="edit-form-row" id="edit-2">
              <td colspan="6">
                <form class="edit-inner" action="admin_aanpassen.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="2">
                  <div class="form-row">
                    <div class="form-group">
                      <label>Naam</label>
                      <input type="text" name="naam" value="Truffle Fries">
                    </div>
                    <div class="form-group">
                      <label>Categorie</label>
                      <select name="categorie">
                        <option value="burgers">Burgers</option>
                        <option value="fries" selected>Loaded Fries</option>
                        <option value="schotels">Schotels</option>
                        <option value="kapsalon">Kapsalon</option>
                        <option value="durum">Durum</option>
                        <option value="snacks">Snacks</option>
                        <option value="dranken">Dranken</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Beschrijving</label>
                    <textarea name="beschrijving">Huisgesneden friet met truffelolie, Parmezaan en verse peterselie.</textarea>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <label>Prijs (€)</label>
                      <input type="number" name="prijs" value="9.50" step="0.01" min="0">
                    </div>
                    <div class="form-group">
                      <label>Nieuwe afbeelding</label>
                      <input type="file" name="afbeelding" accept="image/*">
                    </div>
                  </div>
                  <div class="badge-options">
                    <label class="badge-option"><input type="checkbox" name="badge_orange" value="1" checked> Bestseller</label>
                    <label class="badge-option"><input type="checkbox" name="badge_green"  value="1"> Vegie</label>
                    <label class="badge-option"><input type="checkbox" name="badge_red"    value="1"> Spicy</label>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn-primary">Opslaan</button>
                    <a href="#" class="btn-secondary">Annuleren</a>
                  </div>
                </form>
              </td>
            </tr>

            <!-- Rij 3 -->
            <tr>
              <td><img class="tabel-img" src="https://placehold.co/96x96/e8e2d8/a09880?text=ST" alt=""></td>
              <td>
                <div class="tabel-naam">Green Monster</div>
                <div class="tabel-desc">Plant-based patty met avocado...</div>
              </td>
              <td>Burgers</td>
              <td class="tabel-prijs">€ 14,20</td>
              <td><span class="tabel-badge groen">Vegie</span></td>
              <td><a href="#edit-3" class="btn-edit">Bewerken</a></td>
            </tr>
            <tr class="edit-form-row" id="edit-3">
              <td colspan="6">
                <form class="edit-inner" action="admin_aanpassen.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="3">
                  <div class="form-row">
                    <div class="form-group">
                      <label>Naam</label>
                      <input type="text" name="naam" value="Green Monster">
                    </div>
                    <div class="form-group">
                      <label>Categorie</label>
                      <select name="categorie">
                        <option value="burgers" selected>Burgers</option>
                        <option value="fries">Loaded Fries</option>
                        <option value="schotels">Schotels</option>
                        <option value="kapsalon">Kapsalon</option>
                        <option value="durum">Durum</option>
                        <option value="snacks">Snacks</option>
                        <option value="dranken">Dranken</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Beschrijving</label>
                    <textarea name="beschrijving">Plant-based patty met avocado, rucola, tomaat en frisse citroen-tahini dressing.</textarea>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <label>Prijs (€)</label>
                      <input type="number" name="prijs" value="14.20" step="0.01" min="0">
                    </div>
                    <div class="form-group">
                      <label>Nieuwe afbeelding</label>
                      <input type="file" name="afbeelding" accept="image/*">
                    </div>
                  </div>
                  <div class="badge-options">
                    <label class="badge-option"><input type="checkbox" name="badge_orange" value="1"> Bestseller</label>
                    <label class="badge-option"><input type="checkbox" name="badge_green"  value="1" checked> Vegie</label>
                    <label class="badge-option"><input type="checkbox" name="badge_red"    value="1"> Spicy</label>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn-primary">Opslaan</button>
                    <a href="#" class="btn-secondary">Annuleren</a>
                  </div>
                </form>
              </td>
            </tr>

          </tbody>
        </table>
      </div>

      <!-- ── TAB 3: VERWIJDEREN ────────────────────────────────── -->
      <div class="tab-content" id="content-verwijderen">

        <div class="delete-warning">
          ⚠️ Verwijderen kan niet ongedaan worden gemaakt. Weet je het zeker?
        </div>

        <div class="delete-grid">

          <div class="delete-card">
            <img class="delete-card-img" src="https://placehold.co/480x260/e8e2d8/a09880?text=ST" alt="Straat Classic">
            <div class="delete-card-body">
              <div class="delete-card-name">Straat Classic</div>
              <div class="delete-card-cat">Burgers</div>
              <div class="delete-card-price">€ 13,50</div>
            </div>
            <div class="delete-card-footer">
              <form action="admin_verwijderen.php" method="POST">
                <input type="hidden" name="id" value="1">
                <button type="submit" class="btn-danger-full">🗑 Verwijderen</button>
              </form>
            </div>
          </div>

          <div class="delete-card">
            <img class="delete-card-img" src="https://placehold.co/480x260/e8e2d8/a09880?text=ST" alt="Truffle Fries">
            <div class="delete-card-body">
              <div class="delete-card-name">Truffle Fries</div>
              <div class="delete-card-cat">Loaded Fries</div>
              <div class="delete-card-price">€ 9,50</div>
            </div>
            <div class="delete-card-footer">
              <form action="admin_verwijderen.php" method="POST">
                <input type="hidden" name="id" value="2">
                <button type="submit" class="btn-danger-full">🗑 Verwijderen</button>
              </form>
            </div>
          </div>

          <div class="delete-card">
            <img class="delete-card-img" src="https://placehold.co/480x260/e8e2d8/a09880?text=ST" alt="Green Monster">
            <div class="delete-card-body">
              <div class="delete-card-name">Green Monster</div>
              <div class="delete-card-cat">Burgers</div>
              <div class="delete-card-price">€ 14,20</div>
            </div>
            <div class="delete-card-footer">
              <form action="admin_verwijderen.php" method="POST">
                <input type="hidden" name="id" value="3">
                <button type="submit" class="btn-danger-full">🗑 Verwijderen</button>
              </form>
            </div>
          </div>

          <div class="delete-card">
            <img class="delete-card-img" src="https://placehold.co/480x260/e8e2d8/a09880?text=ST" alt="Kapsalon Doner">
            <div class="delete-card-body">
              <div class="delete-card-name">Kapsalon Doner</div>
              <div class="delete-card-cat">Kapsalon</div>
              <div class="delete-card-price">€ 13,50</div>
            </div>
            <div class="delete-card-footer">
              <form action="admin_verwijderen.php" method="POST">
                <input type="hidden" name="id" value="4">
                <button type="submit" class="btn-danger-full">🗑 Verwijderen</button>
              </form>
            </div>
          </div>

          <div class="delete-card">
            <img class="delete-card-img" src="https://placehold.co/480x260/e8e2d8/a09880?text=ST" alt="Mozzarella Sticks">
            <div class="delete-card-body">
              <div class="delete-card-name">Mozzarella Sticks</div>
              <div class="delete-card-cat">Snacks</div>
              <div class="delete-card-price">€ 7,50</div>
            </div>
            <div class="delete-card-footer">
              <form action="admin_verwijderen.php" method="POST">
                <input type="hidden" name="id" value="5">
                <button type="submit" class="btn-danger-full">🗑 Verwijderen</button>
              </form>
            </div>
          </div>

          <div class="delete-card">
            <img class="delete-card-img" src="https://placehold.co/480x260/e8e2d8/a09880?text=ST" alt="Huislimonade">
            <div class="delete-card-body">
              <div class="delete-card-name">Huislimonade</div>
              <div class="delete-card-cat">Dranken</div>
              <div class="delete-card-price">€ 4,50</div>
            </div>
            <div class="delete-card-footer">
              <form action="admin_verwijderen.php" method="POST">
                <input type="hidden" name="id" value="6">
                <button type="submit" class="btn-danger-full">🗑 Verwijderen</button>
              </form>
            </div>
          </div>

        </div>
      </div>

    </div><!-- .tab-panels -->
  </div><!-- .admin-page -->

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
