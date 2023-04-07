<?php
require_once '../blocks/connectorPOD.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firm = $_POST['firm'];
    $parts = explode(':', $firm);

    $id = trim($parts[0]);
    $numberd = $_POST['numberd'];
    $name = $_POST['name'];
    $sumd = $_POST['sumd'];
    $datestart = $_POST['datestart'];
    $datefinish = $_POST['datefinish'];
    $avans = $_POST['avans'];

    $stmt = $connect->prepare("INSERT INTO dogovor (id_d, id_firm, numberd, named, sumd, datestart, datefinish, avans) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id, $numberd, $name, $sumd, $datestart, $datefinish, $avans]);

    header('Location: ../dogovor.php');
    exit();
}