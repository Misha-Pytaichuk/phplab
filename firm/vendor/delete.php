<?php
require_once '../blocks/connector.php';

/**
 * @var $connect
 */

    $id = $_GET['id'];

    mysqli_query($connect, "DELETE FROM firm WHERE id_firm = '$id'");

    header('Location: ../firm.php');
    exit();
?>
