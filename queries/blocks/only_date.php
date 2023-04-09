<header><a href = '/firmadogovor/index.php'>Головна</a></header>
<header><h1>Знайти контракти за вказаний період</h1></header>

<?php

require 'header.php';
require_once 'connectorPDO.php';

/**
 * @var $connect
 */

$dogovor = [];
$dogovor_b = [];

if(isset($_GET['id_firm'])) {
    $id_firm = $_GET['id_firm'];
}
if(isset($_GET['date_search_results'])) {
     $dogovor_b = unserialize(urldecode($_GET['date_search_results']));
     if($dogovor_b !== null)
         $dogovor = $dogovor_b;

     foreach ($dogovor_b as $row){
        $id_firm = $row['id_firm'];
     }
}
else{
     $stmt = $connect->query("SELECT id_d, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm WHERE dogovor.id_firm = '$id_firm'");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dogovor[] = $row;
        }

}
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
        </tr>
        <?php
    }
    ?>
</table>

<form action="../vendor/only_date.php" method="post">
    <input type="hidden" name="id_firm" value="<?= $id_firm ?>">
    <p>Початок дії контракту</p>
    <label>
        <input type="date" name="datestart">
    </label>
    <p>Кінець дії контракту</p>
    <label>
        <input type="date" name="datefinish">
    </label>
    <button type="submit">Пошук</button>
</form>
<br><br><br><a href = '../query_block.php'>Назад</a>

