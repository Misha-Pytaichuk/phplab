<?php
require_once '../blocks/connector.php';

/**
 * @var $connect
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'];

$firms = mysqli_query($connect, "SELECT * FROM firm WHERE name LIKE '%$name%'");
$firms = mysqli_fetch_all($firms);

$search_results_url = '../firm.php?search_results=' . urlencode(serialize($firms));

header('Location:'. $search_results_url);
exit();
}