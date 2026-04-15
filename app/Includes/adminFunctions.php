<div class="tab-panels">

    <!-- ──────────────────────────────────── TOEVOEGEN ──────────────────────────────────── -->
    <?php
    // Als er een POST request is en de actie is toevoegen, voer dan de code uit om een nieuw gerecht toe te voegen.
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actie']) && $_POST['actie'] === 'toevoegen') {

        // Waarden aangeven.
        $titel        = trim($_POST['naam']);
        $beschrijving = trim($_POST['beschrijving']);
        $prijs        = floatval($_POST['prijs']);
        $type         = trim($_POST['categorie']);
        $imagePath    = ''; // Leeg voor als er geen image word geupload.

        // ====== Afbeelding uploaden =====
        if (isset($_FILES['afbeelding']) && $_FILES['afbeelding']['error'] === UPLOAD_ERR_OK) { // Als er een afbeelding is geüpload verwerk deze dan.

            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/'; // Pad naar de img map.

            if (!is_dir($uploadDir)) {  // Maak de img map aan als deze nog niet bestaat.
                mkdir($uploadDir, 0755, true);
            }

            // Haal de bestandsextensie op uit de bestandsnaam.
            $extension = strtolower(pathinfo($_FILES['afbeelding']['name'], PATHINFO_EXTENSION));
            $fileName   = uniqid('gerecht_', true) . '.' . $extension;
            $targetPath = $uploadDir . $fileName;   // Genereer een unieke bestandsnaam.

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif']; // Controleer de bestandsextensie om te zorgen dat het een afbeelding is.

            if (!in_array($extension, $allowedExtensions)) {    // Als het geen bestand is die mag, dan stop het proces en geef een foutmelding.
                die('Ongeldig afbeeldingsformaat. Alleen JPG, PNG, WEBP en GIF zijn toegestaan.');
            }

            // Verplaats het geüploade bestand van de tijdelijke map naar de img map
            if (!move_uploaded_file($_FILES['afbeelding']['tmp_name'], $targetPath)) {  // Als het verplaatsen van de afbeelding mislukt, stop en geen een foutmelding.
                die('Afbeelding uploaden mislukt.');
            }

            // Sla alleen de bestandsnaam op niet het volledige pad, omdat de image in de img map staat.
            $imagePath = $fileName;
        }

        // ===== Het nieuwe gerecht invoegen in de database =====
        // SQL query is voorbereid met placeholders om SQL injectie te voorkomen.
        $stmt = $pdo->prepare("
            INSERT INTO gerechten (Titel, Beschrijving, Prijs, Type, Image, pborange, pbgreen, pbred)
            VALUES (:titel, :beschrijving, :prijs, :type, :image, 0, 0, 0)
        ");

        // Link de formulierwaarden aan de placeholders en voer de query uit.
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
            <input type="hidden" name="actie" value="toevoegen">

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
                    <input type="number" id="t-prijs" name="prijs" placeholder="bijv. 13.50" step="0.01" min="0" required>
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



    <!-- ──────────────────────────────────── AANPASSEN ──────────────────────────────────── -->

    <?php
    // ===== Gerecht aanpassen =====
    // Als er een POST request is en de actie is aanpassen voer dan de code uit om het gerecht aan te passen.
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actie']) && $_POST['actie'] === 'aanpassen') {

        $id           = intval($_POST['id']);   // ID is altijd een getal.
        $titel        = trim($_POST['naam']);   // Zorgt dat er geen onnodige spaties voor of achter de naam staan.
        $beschrijving = trim($_POST['beschrijving']);
        $prijs        = floatval($_POST['prijs']);  // Zorgt dat prijs altijd een getal is.
        $type         = trim($_POST['categorie']);
        $pborange     = isset($_POST['badge_orange']) ? 1 : 0;  // Als de checkbox is aangevinkt dan krijgt de boolean de waarde 1 voor true ander niet.
        $pbgreen      = isset($_POST['badge_green'])  ? 1 : 0;
        $pbred        = isset($_POST['badge_red'])    ? 1 : 0;

        // ===== Afbeelding uploaden als er een nieuwe is meegegeven =====
        $imagePath = trim($_POST['huidige_afbeelding']); // Houd de huidige afbeelding als standaard.

        // Als er een nieuwe image is meegegeven, verwerk deze dan.
        if (isset($_FILES['afbeelding']) && $_FILES['afbeelding']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/';   // Pad naar de img map.

            if (!is_dir($uploadDir)) {  // Als de img map nog niet bestaat maak deze dan.
                mkdir($uploadDir, 0755, true);
            }

            // Haal de bestandsextensie op uit de bestandsnaam.
            $extension = strtolower(pathinfo($_FILES['afbeelding']['name'], PATHINFO_EXTENSION));
            $fileName   = uniqid('gerecht_', true) . '.' . $extension;
            $targetPath = $uploadDir . $fileName;   // Genereer een unieke bestandsnaam.

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif']; // Controleer de bestandsextensie om te zorgen dat het een afbeelding is.

            if (!in_array($extension, $allowedExtensions)) {    // Als het geen bestand is die mag, dan stop het proces en geef een foutmelding.
                die('Ongeldig afbeeldingsformaat. Alleen JPG, PNG, WEBP en GIF zijn toegestaan.');
            }

            // Verplaats het geüploade bestand van de tijdelijke map naar de img map.
            if (!move_uploaded_file($_FILES['afbeelding']['tmp_name'], $targetPath)) {  // Als het verplaatsen van de afbeelding mislukt stop en geen een foutmelding.
                die('Afbeelding uploaden mislukt.');
            }

            $imagePath = $fileName;
        }

        // ===== UPDATE query uitvoeren =====
        $stmt = $pdo->prepare("
            UPDATE gerechten
            SET Titel = :titel, Beschrijving = :beschrijving, Prijs = :prijs, Type = :type, Image = :image, pborange = :pborange, pbgreen = :pbgreen, pbred = :pbred
            WHERE id = :id
        ");
        // update gerecht waarden waar het ID hetzelfde is als het gerecht dat gekozen is.

        $stmt->execute([    // Link de formulierwaarden aan de placeholders en voer de query uit.
            ':titel'        => $titel,
            ':beschrijving' => $beschrijving,
            ':prijs'        => $prijs,
            ':type'         => $type,
            ':image'        => $imagePath,
            ':pborange'     => $pborange,
            ':pbgreen'      => $pbgreen,
            ':pbred'        => $pbred,
            ':id'           => $id
        ]);

        header('Location: admin.php');  // Ga naar dezelfde pagina om te voorkomen dat de form 2x word uitgevoert.
        exit();
    }
    ?>

    <div class="tab-content" id="content-aanpassen">

        <table class="product-table">

            <?php

            $sql = "SELECT * FROM gerechten";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $alleGerechten = $statement->fetchAll();

            if ($alleGerechten != []) {
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

            <tbody>

            <?php foreach($alleGerechten as $gerecht) { ?>

                <tr>
                    <td><img class='tabel-img' src='img/<?php echo $gerecht['image']; ?>' alt='gerecht image'></td>
                    <td>
                        <div class='tabel-naam'><?php echo $gerecht['titel']; ?></div>
                        <div class='tabel-desc'><?php echo $gerecht['beschrijving']; ?></div>
                    </td>
                    <td><?php echo $gerecht['type']; ?></td>
                    <td class='tabel-prijs'>€<?php echo $gerecht['prijs']; ?></td>
                    <td><a href='#edit-<?php echo $gerecht['id']; ?>' class='btn-edit'>Bewerken</a></td>    <!-- Link naar de aanpassen form -->
                </tr>

                <tr class="edit-form-row" id="edit-<?php echo $gerecht['id']; ?>">
                    <td colspan="6">
                        <form class="edit-inner" name="aanpassen" action="admin.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="actie" value="aanpassen">
                            <input type="hidden" name="id" value="<?php echo $gerecht['id']; ?>">
                            <input type="hidden" name="huidige_afbeelding" value="<?php echo $gerecht['image']; ?>">

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Naam</label>
                                    <input type="text" name="naam" value="<?php echo $gerecht['titel']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Categorie</label>
                                    <select name="categorie">
                                        <option value="burgers"  <?php echo $gerecht['type'] === 'burgers'  ? 'selected' : ''; ?>>Burgers</option>
                                        <option value="friet"    <?php echo $gerecht['type'] === 'friet'    ? 'selected' : ''; ?>>Loaded Fries</option>
                                        <option value="schotels" <?php echo $gerecht['type'] === 'schotels' ? 'selected' : ''; ?>>Schotels</option>
                                        <option value="kapsalon" <?php echo $gerecht['type'] === 'kapsalon' ? 'selected' : ''; ?>>Kapsalon</option>
                                        <option value="durum"    <?php echo $gerecht['type'] === 'durum'    ? 'selected' : ''; ?>>Durum</option>
                                        <option value="snacks"   <?php echo $gerecht['type'] === 'snacks'   ? 'selected' : ''; ?>>Snacks</option>
                                        <option value="drankjes" <?php echo $gerecht['type'] === 'drankjes' ? 'selected' : ''; ?>>Drankjes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Beschrijving</label>
                                <textarea name="beschrijving"><?php echo $gerecht['beschrijving']; ?></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Prijs (€)</label>
                                    <input type="number" name="prijs" value="<?php echo $gerecht['prijs']; ?>" step="0.01" min="0">
                                </div>
                                <div class="form-group">
                                    <label>Nieuwe afbeelding</label>
                                    <input type="file" name="afbeelding" accept="image/*">
                                </div>
                            </div>

                            <div class="badge-options">
                                <label class="badge-option">
                                    <input type="checkbox" name="badge_orange" value="1" <?php echo $gerecht['pborange'] ? 'checked' : ''; ?>> Bestseller
                                </label>
                                <label class="badge-option">
                                    <input type="checkbox" name="badge_green" value="1" <?php echo $gerecht['pbgreen'] ? 'checked' : ''; ?>> Vegie
                                </label>
                                <label class="badge-option">
                                    <input type="checkbox" name="badge_red" value="1" <?php echo $gerecht['pbred'] ? 'checked' : ''; ?>> Spicy
                                </label>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary">Opslaan</button>
                                <a href="#" class="btn-secondary">Annuleren</a>
                            </div>

                        </form>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>



    <!-- ──────────────────────────────────── VERWIJDEREN ────────────────────────────────── -->
    <div class="tab-content" id="content-verwijderen">

        <div class="delete-warning">⚠️ Verwijderen kan niet ongedaan worden gemaakt. Weet u het zeker?</div>

        <div class="delete-grid">

        <?php
        
        //  Show alle gerechten tenzij hij leeg is.
        //  Define SQL statement
        $sql = "SELECT * FROM gerechten";   // Laat alle gerechten zien.

        //  Prepare SQL statement
        $statement = $pdo->prepare($sql);

        //  Exacute SQL statement
        $statement->execute();

        $gerechten = $statement->fetchAll();

        ?>

        <?php
        
        // ===== Gerecht verwijderen =====
        // Als er een POST request is en er is een ID meegegeven voer dan de code uit om het gerecht te verwijderen.
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']); // Intval zorgt dat het altijd een getal is.

            $stmt = $pdo->prepare("DELETE FROM gerechten WHERE id = :id");  // Delete gerecht waar het ID hetzelfde is als het gerecht dat gekozen is.
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
