<?php
require_once '../blocks/connector.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_firm'];
    $name = $_POST['name'];
    $shef = $_POST['shef'];
    $address = $_POST['address'];

    mysqli_query($connect, "UPDATE firm SET name = '$name', shef = '$shef', address = '$address' WHERE id_firm = '$id'");

    header('Location: ../firm.php');
    exit();
}