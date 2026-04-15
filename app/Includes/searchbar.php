<?php

$zoekopdracht = $_GET['zoekopdracht'] ?? '';

?>

<form method="get" name="searchbar" action="index.php">
    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" />
        <path d="m21 21-4.35-4.35" />
    </svg>  <!-- Vergrootglas icon -->
    <input type="search" name="zoekopdracht" placeholder="Zoek in het menu..." value="<?=htmlspecialchars($zoekopdracht)?>"/>
    <button type="submit" class="hero-btn2">Zoeken</button>
</form>

<?php

$zoekopdracht = $_GET['zoekopdracht'] ?? '';

if ($zoekopdracht == '') {  // Als er geen zoekopdracht is laat dan alle gerechten zien
    $sql = "SELECT * FROM gerechten";
    $statement = $pdo->prepare($sql);
    $statement->execute();
} else {    // Als er een zoekopdracht is, zoek dan naar gerechten die overeenkomen met de zoekopdracht die opgegeven is
    $sql = "SELECT * FROM gerechten WHERE titel LIKE ? OR beschrijving LIKE ? OR type LIKE ?";  // Kijk of het voorkomt in de titel, beschrijving of als type
    $statement = $pdo->prepare($sql);
    $statement->execute([
        '%' . $zoekopdracht . '%',  // % betekend dat er iets voor of na de zoekopdracht kan staan.
        '%' . $zoekopdracht . '%',  // Doe dit voor alle drie de velden.
        '%' . $zoekopdracht . '%'
    ]);
}

$menuItems = $statement->fetchAll();

?>
