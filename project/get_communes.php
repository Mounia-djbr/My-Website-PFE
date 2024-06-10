<?php
include 'components/connect.php';

$wilaya_id = isset($_GET['wilaya_id']) ? intval($_GET['wilaya_id']) : 0;

$select_communes = $conn->prepare("SELECT id, nom, code_postal FROM `communes` WHERE wilaya_id = ?");
$select_communes->execute([$wilaya_id]);

$communes = $select_communes->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['communes' => $communes]);
?>
