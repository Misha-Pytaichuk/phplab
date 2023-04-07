<header><a href = '/firmadogovor/index.php'>Головна</a></header>
        <?php
            require 'header.php';
            require_once 'connector.php';

            /**
             * @var $connect
             */

            $id = $_GET['id'];
            $firm = mysqli_query($connect, "SELECT * FROM firm WHERE id_firm = '$id'");
            $firm = mysqli_fetch_assoc($firm);
        ?>
        <h2>Редагування</h2>
        <form action="../vendor/update.php" method="post">
            <input type="hidden" name="id_firm" value="<?= $firm['id_firm'] ?>">
            <p>Назва компанії</p>
            <input type="text" name="name" value="<?= $firm['name'] ?>">
            <p>Власник</p>
            <input type="text" name="shef" value="<?= $firm['shef'] ?>">
            <p>Адреса</p>
            <input type="text" name="address" value="<?= $firm['address'] ?>">
            <button type="submit">Оновити</button>
        </form>
    </body>
</html>