<?php

class Kriteria extends DB
{
    function getKriteria()
    {
        $query = "SELECT * FROM kriteria";
        return $this->execute($query);
    }

    function getKriteriaById($id){
        $query = "SELECT * FROM kriteria WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $kode = $data['kode_kriteria'];
        $nama = $data['nama_kriteria'];
        $bobot = $data['bobot'];
        $tipe = $data['tipe'];

        $query = "INSERT INTO kriteria VALUES ('', '$kode', '$nama', '$bobot', '$tipe')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        #$del_opsi = "DELETE from opsi_kriteria WHERE id_kriteria= '$id' ";
        #$this->execute($del_opsi);
        $query = "DELETE from kriteria WHERE id= '$id' ";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data){

        $kode = $data['kode_kriteria'];
        $nama = $data['nama_kriteria'];
        $bobot = $data['bobot'];
        $tipe = $data['tipe'];

        $query = "UPDATE kriteria 
                SET kode_kriteria ='$kode', 
                nama_kriteria='$nama',
                bobot='$bobot',
                tipe='$tipe'
                WHERE id='$id'";
        
        return $this->execute($query);
    }

}
?>