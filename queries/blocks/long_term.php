<header><a href = '/firmadogovor/index.php'>Головна</a></header>
<header><h1>Знайти суму всіх контрактів за вказаний період</h1></header>

<?php

require 'header.php';
require_once 'connectorPDO.php';

/**
 * @var $connect
 */

$dogovor = [];

$id_firm = $_GET['id_firm'];

     $stmt = $connect->query("SELECT id_d, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm WHERE DATEDIFF(datefinish, datestart) >= 365");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dogovor[] = $row;
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

<br><br><br><a href = '../query_block.php'>Назад</a>

