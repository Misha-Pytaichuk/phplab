<?php
require_once '../blocks/connector.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $shef = $_POST['shef'];
    $address = $_POST['address'];

    mysqli_query($connect, "INSERT INTO firm (name, shef, address) VALUES ('$name','$shef', '$address')");

    header('Location: ../firm.php');
    exit();
}