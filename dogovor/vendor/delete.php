<?php
require_once '../blocks/connectorPOD.php';

/**
 * @var $connect
 */

$id = $_GET['id'];

$stmt = $connect->query("DELETE FROM dogovor WHERE id_d = '$id'");

header('Location: ../dogovor.php');
exit();
?>
