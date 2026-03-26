
<?php

$zoekopdracht = $_GET['zoekopdracht'] ?? '';

?>

<form method="get">
    <input type="search" name="zoekopdracht" placeholder="Zoek in het menu..." value="<?=htmlspecialchars($zoekopdracht)?>"/>
    <button type="submit">Zoeken</button>
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


