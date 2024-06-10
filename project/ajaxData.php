<?php
include 'components/connect.php';

if(isset($_POST['wilaya_id'])){
    $wilaya_id = $_POST['wilaya_id'];
    $query = $conn->prepare("SELECT * FROM `communes` WHERE wilaya_id = ?");
    $query->execute([$wilaya_id]);
    $output = '<option value="" disabled selected>Select Commune</option>';
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    echo $output;
}

if(isset($_POST['commune_id'])){
    $commune_id = $_POST['commune_id'];
    $query = $conn->prepare("SELECT postal_code FROM `communes` WHERE id = ?");
    $query->execute([$commune_id]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    echo $row['postal_code'];
}
?>
