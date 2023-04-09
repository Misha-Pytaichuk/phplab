<?php
require_once '../blocks/connectorPDO.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_firm = $_POST['id_firm'];
    $date_start = $_POST['datestart'];
    $date_finish = $_POST['datefinish'];

    if($date_start == null || $date_finish == null) {
        $search_results_url = '../blocks/only_date.php?id_firm=' . urlencode(serialize($id_firm));
        header('Location:'. $search_results_url);
        exit();
    }

    $stmt = $connect->query("SELECT id_d, firm.id_firm, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm WHERE datestart >= '$date_start' AND datefinish <= '$date_finish' AND firm.id_firm = '$id_firm'");

    $results = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $row;
    }

    $search_results_url = '../blocks/only_date.php?date_search_results=' . urlencode(serialize($results));

    header('Location:'. $search_results_url);
    exit();
}