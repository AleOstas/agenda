<?php
include('connect.php');

$ID = $_GET['ID'];
$sql = 'DELETE FROM Agenda WHERE ID = :ID' ;
$stmt = $conn->prepare($sql);
if ($stmt->execute([':ID' => $ID])) {
    header ('location: read.php');
}

?>