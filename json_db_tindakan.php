<?php
header("Content-Type: application/json; charset=UTF-8");

include "model/koneksi.php";

$obj_imp=$_POST['id_pasien'];
// $conn = new mysqli("myServer", "myUser", "myPassword", "Northwind");
$stmt = $open->prepare("SELECT tindakan,masalah FROM tb_tindakan WHERE id_pasien ='$obj_imp' ");
$stmt->execute();
$result = $stmt->get_result();
$output = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($output);
?>