<?php

  class AlternatifView {
    public function render($data){
      $no = 1;
      $dataAlternatif = null;
      foreach($data['alternatif'] as $val){
        list($id, $kode_alternatif, $nama_alternatif) = $val;
        $dataAlternatif .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $kode_alternatif . "</td>
                <td>" . $nama_alternatif . "</td>
                <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
        $dataAlternatif .= "</tr>";
      }

      $tpl = new Template("templates/index.html");
      $tpl->replace("DATA_TABEL", $dataAlternatif);
      $tpl->write(); 
    }
  }
?>