<div class="tab-panels">

    <!-- ── TAB 1: TOEVOEGEN ──────────────────────────────────── -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['naam'])) {

        // Formulierwaarden ophalen
        $titel        = trim($_POST['naam']);
        $beschrijving = trim($_POST['beschrijving']);
        $prijs        = floatval($_POST['prijs']);
        $type         = trim($_POST['categorie']);
        $imagePath    = ''; // Leeg voor als er geen image word gegeven

        // ===== Afbeelding uploaden =====
        if (isset($_FILES['afbeelding']) && $_FILES['afbeelding']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/'; // Pad naar de img map

            // Maak de img map aan als deze nog niet bestaat
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Haal de bestandsextensie op uit de originele bestandsnaam (bijv. "jpg", "png")
            $extension = strtolower(pathinfo($_FILES['afbeelding']['name'], PATHINFO_EXTENSION));

            // Genereer een unieke bestandsnaam om overschrijven van bestaande afbeeldingen te voorkomen
            $fileName   = uniqid('gerecht_', true) . '.' . $extension;
            $targetPath = $uploadDir . $fileName;

            // Controleer de bestandsextensie om te zorgen dat het een afbeelding is
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

            if (!in_array($extension, $allowedExtensions)) {
                die('Ongeldig afbeeldingsformaat. Alleen JPG, PNG, WEBP en GIF zijn toegestaan.');
            }

            // Verplaats het geüploade bestand van de tijdelijke map naar de img map
            if (!move_uploaded_file($_FILES['afbeelding']['tmp_name'], $targetPath)) {
                die('Afbeelding uploaden mislukt.');
            }

            // Sla alleen de bestandsnaam op, NIET het volledige pad (bijv. "gerecht_abc123.png")
            // Het volledige pad wordt nergens anders in de code gebruikt
            $imagePath = $fileName;
        }

        // ===== Nieuw gerecht invoegen in de database =====

        // Bereid de SQL query voor met placeholders om SQL injectie te voorkomen
        // pborange, pbgreen en pbred worden altijd op 0 gezet (geen labels standaard)
        $stmt = $pdo->prepare("
            INSERT INTO gerechten (Titel, Beschrijving, Prijs, Type, Image, pborange, pbgreen, pbred)
            VALUES (:titel, :beschrijving, :prijs, :type, :image, 0, 0, 0)
        ");

        // Koppel de formulierwaarden aan de placeholders en voer de query uit
        $stmt->execute([
            ':titel'        => $titel,
            ':beschrijving' => $beschrijving,
            ':prijs'        => $prijs,
            ':type'         => $type,
            ':image'        => $imagePath
        ]);
    }
    ?>

    <div class="tab-content" id="content-toevoegen">
        <form class="admin-form" name="toevoegen" action="admin.php" method="POST" enctype="multipart/form-data">

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
                        <option value="friet">Loaded Fries</option>
                        <option value="schotels">Schotels</option>
                        <option value="kapsalon">Kapsalon</option>
                        <option value="durum">Durum</option>
                        <option value="snacks">Snacks</option>
                        <option value="drankjes">Drankjes</option>
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
                    <input type="number" id="t-prijs" name="prijs" placeholder="bijv. 13.50" step="0.01" min="0"
                        required>
                </div>
                <div class="form-group">
                    <label for="t-afbeelding">Afbeelding</label>
                    <input type="file" id="t-afbeelding" name="afbeelding" accept="image/*">
                </div>
            </div>

            <hr class="form-divider">

            <div class="form-actions">
                <button type="submit" class="btn-primary">+ Toevoegen</button>
                <button type="reset" class="btn-secondary">Wis velden</button>
            </div>

        </form>
    </div>



    <!-- ── TAB 2: AANPASSEN ──────────────────────────────────── -->
    <div class="tab-content" id="content-aanpassen">

        <table class="product-table">

            <?php

            //  Show alle gerechten tenzij hij leeg is.
            //  Define SQL statement
            $sql = "SELECT * FROM gerechten";

            //  Prepare SQL statement
            $statement = $pdo->prepare($sql);

            //  Exacute SQL statement
            $statement->execute();

            $alleGerechten = $statement->fetchAll();

            if ($alleGerechten == []) {

            } else {
            echo "<thead>";
            echo    "<tr>";
            echo        "<th style=\"width:52px\"></th>";
            echo        "<th>Gerecht</th>";
            echo        "<th>Categorie</th>";
            echo        "<th>Prijs</th>";
            echo        "<th></th>";
            echo    "</tr>";
            echo "</thead>";
            }

            ?>

            <?php
            
            foreach($alleGerechten as $gerecht) {
            echo    "<tr>";
            echo        "<td><img class='tabel-img' src='img/" . $gerecht['image'] . "' alt='gerecht image'></td>";
            echo        "<td>";
            echo            "<div class='tabel-naam'>" . $gerecht['titel'] . "</div>";
            echo            "<div class='tabel-desc'>" . $gerecht['beschrijving'] . "</div>";
            echo        "</td>";
            echo        "<td>" . $gerecht['type'] . "</td>";
            echo        "<td class='tabel-prijs'>€" . $gerecht['prijs'] . "</td>";
            echo        "<td><a href='#edit-1' class='btn-edit'>Bewerken</a></td>";
            echo    "</tr>";
            }

            ?>



            <tbody>

                <tr class="edit-form-row" id="edit-1">
                    <td colspan="6">
                        <form class="edit-inner" name="aanpassen" action="admin.php" method="POST" enctype="multipart/form-data">
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
                                <textarea
                                    name="beschrijving">Dikke Black Angus smashed patty, huisgemaakte burgersaus, augurk en karamelui op een brioche bun.</textarea>
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
                                <label class="badge-option"><input type="checkbox" name="badge_orange" value="1"
                                        checked> Bestseller</label>
                                <label class="badge-option"><input type="checkbox" name="badge_green" value="1">
                                    Vegie</label>
                                <label class="badge-option"><input type="checkbox" name="badge_red" value="1">
                                    Spicy</label>
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

        <div class="delete-warning">⚠️ Verwijderen kan niet ongedaan worden gemaakt. Weet u het zeker?</div>

        <div class="delete-grid">

        <?php
        
        //  Show alle gerechten tenzij hij leeg is.
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten";

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $gerechten = $statement->fetchAll();

        ?>

        <?php
        
        // ===== Gerecht verwijderen =====
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']); // intval zorgt dat het altijd een getal is, geen kwaadaardige invoer

            $stmt = $pdo->prepare("DELETE FROM gerechten WHERE id = :id");
            $stmt->execute([':id' => $id]);
        }
        
        ?>

        <?php
        
        foreach($gerechten as $eenGerecht) {
        echo    "<div class='delete-card'>";
        echo        "<img class='delete-card-img' src='img/" . $eenGerecht['image'] . "' alt='gerecht image'>";
        echo        "<div class='delete-card-body'>";
        echo        "<div class='delete-card-name'>" . $eenGerecht['titel'] . "</div>";
        echo        "<div class='delete-card-cat'>" . $eenGerecht['type'] . "</div>";
        echo        "<div class='delete-card-price'>€" . $eenGerecht['prijs'] . "</div>";
        echo    "</div>";
        echo    "<div class='delete-card-footer'>";

        ?>

        <form name="verwijderen" action="admin.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $eenGerecht['id']; ?>">
            <button type="submit" class="btn-danger-full">🗑 Verwijderen</button>
        </form>

        <?php

        echo    "</div>";
        echo "</div>";
        }
        
        ?>

        </div>
    </div>

</div>
