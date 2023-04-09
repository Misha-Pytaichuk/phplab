<header><a href = '../index.php'>Головна</a></header>
<header><h1>Блок для роботи з контрактами</h1></header>

<?php
require 'blocks/header.php';
require_once 'blocks/connectorPDO.php';

/**
 * @var $connect
 */

$select = $connect->query('SELECT id_firm, name FROM firm');

$dogovor = [];
if(isset($_GET['search_results'])) {
    $dogovor = unserialize(urldecode($_GET['search_results']));

} else{
    $stmt = $connect->query("SELECT id_d, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dogovor[] = $row;
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
        <th>Номер контракту</th>
        <th>Назва</th>
        <th>Сума</th>
        <th>Початок дії контракту</th>
        <th>Кінець дії контракту</th>
        <th>Аванс</th>
    </tr>
    <?php
    foreach ($dogovor as $row){
        ?>
        <tr>
            <td><?= $row['id_d'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['numberd'] ?></td>
            <td><?= $row['named'] ?></td>
            <td><?= $row['sumd'] ?></td>
            <td><?= $row['datestart'] ?></td>
            <td><?= $row['datefinish'] ?></td>
            <td><?= $row['avans'] ?></td>
            <td><a href="blocks/update.php?id=<?= $row['id_d'] ?>">Редагувати</a></td>
            <td><a href="vendor/delete.php?id=<?= $row['id_d'] ?>">Видалити</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<h2>Додати контракт</h2>
<form action="vendor/create.php" method="post">

    <p>Назва фірми</p>
    <label>
        <select name="firm">
            <?php
            while ($res = $select->fetch()) { ?>
                <option value="<?php echo $res['id_firm'].':'.$res['name']; ?>">
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
        <input type="text" name="name">
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

