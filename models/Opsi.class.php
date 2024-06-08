<?php

class Opsi extends DB
{
    function getOpsiByKriteriaId($id_kriteria)
    {
        $query = "SELECT * FROM opsi_kriteria WHERE id_kriteria=$id_kriteria";
        return $this->execute($query);
    }

    function add($data)
    {
        $opsi = $data['opsi'];
        $nilai = $data['nilai'];
        $id_kriteria = $data['id_kriteria'];

        $query = "INSERT INTO opsi_kriteria VALUES ('', '$opsi', '$nilai', '$id_kriteria')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE from opsi_kriteria WHERE id= '$id' ";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
?>
