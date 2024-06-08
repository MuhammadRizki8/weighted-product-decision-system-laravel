<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Opsi.controller.php");

$opsi = new OpsiController();

if (!empty($_GET['id_kriteria'])) {
    // Memanggil halaman opsi
    $id_kriteria = $_GET['id_kriteria'];
    $opsi->index($id_kriteria);
}
else if (isset($_POST['add'])) {
    // Memanggil add opsi
    $opsi->add($_POST);
}
// Mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $id_kriteria = $_GET['id_kriteria'];
    $opsi->delete($id, $id_kriteria);
}
else {
    // Jika tidak ada id_kriteria yang diberikan, redirect ke halaman kriteria
    header("location:kriteria.php");
}
?>
