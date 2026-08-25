<?php
header("Content-Type: application/json; charset=UTF-8");

$open = mysqli_connect("127.0.0.1", "root", "", "perawatigd");
$q=$_GET['q'];
$stmt = $open->prepare("SELECT * FROM tb_perawat WHERE nama_perawat LIKE ? OR nip LIKE ? LIMIT 10");
$param="%$q%";
$stmt->bind_param("ss",$param, $param);
$data=array();
if( $stmt->execute()) {
    $result = $stmt->get_result();
if($result->num_rows>0){
    while($row = $result->fetch_assoc()) {
        $id=$row['id_perawat'];
        $text=$row['nama_perawat'];
        $category=$row['nip'];
        $alamat=$row['alamat'];
        $kode=$row['kode'];
        $data[] = array(
            'id' => $id,
            'text' => $text,
            'category' => $category,
            'alamat' => $alamat,
            'kode' => $kode
        );
    }
    $stmt->close();
}else{
    $data[] = array(
        'id' => 0,
        'text' => 'Data tidak ditemukan',
        'category' => '',
        'alamat' => '',
        'kode' => ''
    );
}
}
// $output = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);
?>