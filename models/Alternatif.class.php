<?php

class Alternatif extends DB
{
    function getAlternatif()
    {
        $query = "SELECT * FROM alternatif";
        return $this->execute($query);
    }

    function getAlternatifById($id){
        $query = "SELECT * FROM alternatif WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $kode = $data['kode_alternatif'];
        $nama = $data['nama_alternatif'];

        $query = "INSERT INTO alternatif VALUES ('', '$kode', '$nama')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE from alternatif WHERE id= '$id' ";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data){

        $kode = $data['kode_alternatif'];
        $nama = $data['nama_alternatif'];

        $query = "UPDATE alternatif 
                SET kode_alternatif ='$kode', 
                nama_alternatif='$nama'
                WHERE id='$id'";
        
        return $this->execute($query);
    }

}


?>