<?php

class OpsiKriteria extends DB
{
    function getOpsiKriteria()
    {
        $query = "SELECT * FROM opsi_kriteria";
        return $this->execute($query);
    }

    function getOpsiKriteriaById($id){
        $query = "SELECT * FROM opsi_kriteria WHERE id=$id";
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

    function update($id, $data){

        $opsi = $data['opsi'];
        $nilai = $data['nilai'];
        $id_kriteria = $data['id_kriteria'];

        $query = "UPDATE opsi_kriteria 
                SET opsi ='$opsi', 
                nilai='$nilai',
                id_kriteria ='$id_kriteria'
                WHERE id='$id'";
        
        return $this->execute($query);
    }

}


?>