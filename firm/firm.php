<header><a href = '../index.php'>Головна</a></header>
<header><h1>Блок для роботи з фірмами</h1></header>

<?php
    require 'blocks/header.php';
    require_once 'blocks/connector.php';

/**
 * @var $connect
 */

$firms = [];
if(isset($_GET['search_results'])) {
    $firms = unserialize(urldecode($_GET['search_results']));
} else {
    $result = mysqli_query($connect, "SELECT * FROM firm");
    if($result) {
        $firms = mysqli_fetch_all($result);
    }
}

?>
<form action="vendor/search.php" method="post">
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
    foreach($firms as $firm) {
        ?>
        <tr>
            <td><?= $firm[0] ?></td>
            <td><?= $firm[1] ?></td>
            <td><?= $firm[2] ?></td>
            <td><?= $firm[3] ?></td>
            <td><a href="blocks/update.php?id=<?= $firm[0] ?>">Редагувати</a></td>
            <td><a href="vendor/delete.php?id=<?= $firm[0] ?>">Видалити</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<h2>Додати компанію</h2>
<form action="vendor/create.php" method="post">
    <p>Назва</p>
    <input type="text" name="name">
    <p>Власник</p>
    <input type="text" name="shef">
    <p>Адреса</p>
    <input type="text" name="address">
    <button type="submit">Додати</button>
</form>
