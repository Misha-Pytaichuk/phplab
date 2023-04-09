<?php
require_once '../blocks/connectorPDO.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_d = $_POST['id_d'];
    $numberd = $_POST['numberd'];
    $name = $_POST['name'];
    $sumd = $_POST['sumd'];
    $datestart = $_POST['datestart'];
    $datefinish = $_POST['datefinish'];
    $avans = $_POST['avans'];

    $stmt = $connect->prepare("UPDATE dogovor SET numberd = ?, named = ?, sumd = ?, datestart = ?, datefinish = ?, avans = ? WHERE id_d = '$id_d'");
    $stmt->execute([$numberd, $name, $sumd, $datestart, $datefinish, $avans]);

    header('Location: ../dogovor.php');
    exit();
}