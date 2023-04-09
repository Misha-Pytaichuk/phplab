<?php
require_once '../blocks/connectorPDO.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_firm = $_POST['id_firm'];
    $date_start = $_POST['datestart'];
    $date_finish = $_POST['datefinish'];

    $stmt = $connect->query("SELECT id_d, firm.id_firm, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm WHERE datestart >= '$date_start' AND datefinish <= '$date_finish' AND firm.id_firm = '$id_firm'");

    $results = array();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $row;
        }
    }
    else {
        if($date_start == null || $date_finish == null){
            $stmt = $connect->query("SELECT id_d, firm.id_firm, firm.name, numberd, named, sumd, datestart, datefinish, avans FROM dogovor JOIN firm ON dogovor.id_firm = firm.id_firm WHERE firm.id_firm = '$id_firm'");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
            }
        }
    }

    $search_results_url = '../blocks/sum_date.php?sum_date=' . urlencode(serialize($results));

    header('Location:'. $search_results_url);
    exit();
}