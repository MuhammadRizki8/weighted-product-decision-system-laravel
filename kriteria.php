<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Kriteria.controller.php");

$kriteria = new KriteriaController();

if (!empty($_GET['id_edit'])) {
    // Memanggil edit kriteria
    $id = $_GET['id_edit'];
    $kriteria->index($id);
}
else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kriteria->edit($id, $_POST);
}
else if (isset($_POST['add'])) {
    // Memanggil add kriteria
    $kriteria->add($_POST);
}
// Mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $kriteria->delete($id);
}
else {
    $id = null;
    $kriteria->index($id);
}
?>
