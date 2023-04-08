<header><a href = '/firmadogovor/index.php'>Головна</a></header>

<?php
require 'header.php';
require_once 'connectorPOD.php';

/**
 * @var $connect
 */

$id = $_GET['id'];

$select = $connect->query('SELECT id_firm, name FROM firm');

$stmt = $connect->query("SELECT id_d, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm WHERE id_d = '$id'");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dogovor[] = $row;
}
?>
<h2>Редагування</h2>
        <form action="../vendor/update.php" method="post">
            <?php
            foreach ($dogovor as $row){
                ?>
            <input type="hidden" name="id_d" value="<?= $row['id_d'] ?>">
            <p>Фірма</p>
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
                <input type="text" name="numberd" value="<?= $row['numberd']?>">
            </label>
            <p>Назва</p>
            <label>
                <input type="text" name="name" value="<?= $row['named']?>">
            </label>
            <p>Сума</p>
            <label>
                <input type="number" name="sumd" value="<?= $row['sumd']?>">
            </label>
            <p>Початок дії контракту</p>
            <label>
                <input type="date" name="datestart" value="<?= $row['datestart']?>">
            </label>
            <p>Кінець дії контракту</p>
            <label>
                <input type="date" name="datefinish" value="<?= $row['datefinish']?>">
            </label>
            <p>Аванс</p>
            <label>
                <input type="number" name="avans" value="<?= $row['avans']?>">
            </label>
            <button type="submit">Додати</button>
                <?php
            }
            ?>
        </form>
    </body>
</html>