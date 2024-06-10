<?php
include 'components/connect.php';

if(isset($_POST['wilaya_id'])){
   $wilaya_id = $_POST['wilaya_id'];
   $sql_communes = "SELECT * FROM communes WHERE wilaya_id = ?";
   $stmt_communes = $conn->prepare($sql_communes);
   $stmt_communes->execute([$wilaya_id]);
   $result_communes = $stmt_communes->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($result_communes);
}
?>