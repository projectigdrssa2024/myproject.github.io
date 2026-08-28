<?php

include 'model/koneksi.php';

// if (isset($_GET['q'])) {
//     $q = $_GET['q'];
//     $stmt = $open->prepare("SELECT*FROM tb_perawat WHERE nama_perawat like ?");
//     $param = "%$q%";
//     $stmt->bind_param('ss', $param, $param);
//     $data = array();

//     if ($stmt->execute()) {

//         $result = $stmt->get_result();
//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $id = $row['id_perawat'];
//                 $perawat = $row['nama_perawat'];
//                 $data[] = array("id" => $id, "text" => $perawat);
//             }
//             $stmt->close();
//         } else {
//             $data[] = array("id" => 0, "text" => 'Nama perawat tidak ditemukan');
//         }
//         echo json_encode($data);
//     }
// }

$dbh = new PDO('mysql:host=127.0.0.1;dbname=perawatigd', 'root', '10FiIMUYRLogvCgo');
$stmt = $dbh->prepare('SELECT * FROM tb_perawat WHERE kode = "admin" ');
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
