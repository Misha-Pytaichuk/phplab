<?php
require_once '../blocks/connectorPDO.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    $stmt = $connect->query("SELECT id_d, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm WHERE firm.name LIKE '%$name%'");

    $results = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $row;
    }

    $search_results_url = '../dogovor.php?search_results=' . urlencode(serialize($results));

    header('Location:'. $search_results_url);
    exit();
}