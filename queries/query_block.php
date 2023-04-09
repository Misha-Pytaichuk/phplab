<header><a href = '../index.php'>Головна</a></header>
<header><h1>Блок запитів</h1></header>

<?php
require 'blocks/header.php';
require_once 'blocks/connectorPDO.php';

/**
 * @var $connect
 */

$select = $connect->query('SELECT id_firm, name FROM firm');

$firms = [];

if(isset($_GET['search_results'])) {
    $firms = unserialize(urldecode($_GET['search_results']));
} else{
    $stmt = $connect->query("SELECT * FROM firm");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $firms[] = $row;
    }
}


?>
<form action="vendor/search_firm.php" method="post">
    <p>Введіть назву компанії</p>
    <label>
        <input type="text" name="name">
    </label>
    <button type="submit">Пошук</button>
</form>
<table>
    <tr>
        <th>id</th>
        <th>Назва фірми</th>
        <th>Власник</th>
        <th>Адреса</th>
    </tr>
    <?php
    foreach ($firms as $firm){
        ?>
        <tr>
            <td><?= $firm['id_firm'] ?></td>
            <td><?= $firm['name'] ?></td>
            <td><?= $firm['shef'] ?></td>
            <td><?= $firm['address'] ?></td>
            <td><a href="blocks/only_date.php?id=<?= $firm['id_firm'] ?>">Контракти по датам</a></td>
            <td><a href="vendor/delete.php?id=<?= $firm['id_firm'] ?>">Суми контрактів по датам</a></td>
            <td><a href="vendor/delete.php?id=<?= $firm['id_firm'] ?>">Довгострокові контракти</a></td>
        </tr>
        <?php
    }
    ?>
</table>