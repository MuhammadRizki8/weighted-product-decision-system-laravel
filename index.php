<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Alternatif.controller.php");
include_once("controllers/Kriteria.controller.php");

$alternatif = new AlternatifController();
$kriteria = new KriteriaController();

if (!empty($_GET['id_edit'])) {
    // Memanggil edit alternatif
    $id = $_GET['id_edit'];
    $alternatif->index($id);
}
else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $alternatif->edit($id, $_POST);
}
else if (isset($_POST['add'])) {
    // Memanggil add alternatif
    $alternatif->add($_POST);
}
// Mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $alternatif->delete($id);
}
else if (!empty($_GET['id_hapus_kriteria'])) {
    // Memanggil delete kriteria
    $id = $_GET['id_hapus_kriteria'];
    $kriteria->delete($id);
}
else if (isset($_GET['page']) && $_GET['page'] == 'kriteria') {
    // Memanggil halaman kriteria
    $id = null;
    $kriteria->index($id);
}
else {
    // Menampilkan halaman utama dengan alternatif
    $id = null;
    $alternatif->index($id);
}
?>
