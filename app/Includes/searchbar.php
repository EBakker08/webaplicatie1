
<?php

$zoekopdracht = $_GET['zoekopdracht'] ?? '';

?>

<form method="get">
    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" />
        <path d="m21 21-4.35-4.35" />
    </svg>
    <input type="search" name="zoekopdracht" placeholder="Zoek in het menu..." value="<?=htmlspecialchars($zoekopdracht)?>"/>
    <button type="submit" class="hero-btn2">Zoeken</button>
</form>

<?php

$zoekopdracht = $_GET['zoekopdracht'] ?? '';

if ($zoekopdracht == '') {
    $sql = "SELECT * FROM gerechten";
    $statement = $pdo->prepare($sql);
    $statement->execute();
} else {
    $sql = "SELECT * FROM gerechten WHERE titel LIKE ? OR beschrijving LIKE ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        '%' . $zoekopdracht . '%',
        '%' . $zoekopdracht . '%'
    ]);
}

$menuItems = $statement->fetchAll();

?>
