<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Alternatif.controller.php");

$alternatif = new AlternatifController();

if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $alternatif->index($id);
}
else if (isset($_POST['edit'])){

    $id = $_POST['id'];
    $alternatif->edit($id, $_POST);
}
else if (isset($_POST['add'])) {
    //memanggil add
    $alternatif->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $alternatif->delete($id);
}
else{
    $id = null;
    $alternatif->index($id);
}

