<header><a href = '../index.php'>Головна</a></header>
<header><h1>Блок для роботи з договорами</h1></header>

<?php
require 'blocks/header.php';
require_once 'blocks/connectorPOD.php';

/**
 * @var $connect
 */

$stmt = $connect->query("SELECT id_d, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm ");
$select = $connect->query('SELECT id_firm, name FROM firm');

?>
<table>
    <tr>
        <th>id</th>
        <th>Назва фірми</th>
        <th>Номер контракту</th>
        <th>Назва</th>
        <th>Сума</th>
        <th>Початок дії контракту</th>
        <th>Кінець дії контракту</th>
        <th>Аванс</th>
    </tr>
    <?php
    while ($dogovor = $stmt->fetch(PDO::FETCH_LAZY)){
        ?>
        <tr>
            <td><?= $dogovor[0] ?></td>
            <td><?= $dogovor[1] ?></td>
            <td><?= $dogovor[2] ?></td>
            <td><?= $dogovor[3] ?></td>
            <td><?= $dogovor[4] ?></td>
            <td><?= $dogovor[5] ?></td>
            <td><?= $dogovor[6] ?></td>
            <td><?= $dogovor[7] ?></td>
            <td><a href="blocks/update.php?id=<?= $dogovor[0] ?>">Редагувати</a></td>
            <td><a href="vendor/delete.php?id=<?= $dogovor[0] ?>">Видалити</a></td>
        </tr>
        <?php
    }
    //INSERT INTO `dogovor` (`id_d`, `id_firm`, `numberd`, `named`, `sumd`, `datestart`, `datefinish`, `avans`) VALUES (NULL, '1', '10932', 'Купівля 50% акцій компанії.', '470000', '2023-04-01', '2023-04-01', '350000');

    ?>
</table>
<h2>Додати компанію</h2>
<form action="vendor/create.php" method="post">

    <p>Назва фірми</p>
    <label>
        <select name="name">
            <?php
            while ($res = $select->fetch()) { ?>
                <option value="<?php echo 'id: '.$res['id_firm'].' Назва: '.$res['name']; ?>">
                    <?php echo 'id: '.$res['id_firm'].' Назва: '.$res['name']; ?></option>
            <?php } ?>
        </select>
    </label>
    <p>Номер контракту</p>
    <label>
        <input type="text" name="numberd">
    </label>
    <p>Назва</p>
    <label>
        <input type="text" name="numberd">
    </label>
    <p>Сума</p>
    <label>
        <input type="number" name="sumd">
    </label>
    <p>Початок дії контракту</p>
    <label>
        <input type="date" name="datestart">
    </label>
    <p>Кінець дії контракту</p>
    <label>
        <input type="date" name="datefinish">
    </label>
    <p>Аванс</p>
    <label>
        <input type="number" name="avans">
    </label>
    <button type="submit">Додати</button>
</form>

