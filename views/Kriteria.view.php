<?php

class KriteriaView {
  public function render($data){
    $no = 1;
    $headerKriteria = "<tr>
            <th>NO</th>
            <th>Kode Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Bobot</th>
            <th>Tipe</th>
            <th>Aksi</th>
          </tr>";
    $dataKriteria = null;
    $no = 1;
    foreach($data['kriteria'] as $val){
      list($id, $kode_kriteria, $nama_kriteria, $bobot, $tipe) = $val;
      $dataKriteria .= "<tr>
              <td>" . $no++ . "</td>
              <td>" . $kode_kriteria . "</td>
              <td>" . $nama_kriteria . "</td>
              <td>" . $bobot . "</td>
              <td>" . $tipe . "</td>
              <td>
                <a href='kriteria.php?id_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                <a href='kriteria.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                <a href='opsi.php?id_kriteria=" . $id . "' class='btn btn-info' '>Kelola Opsi</a>
              </td>";
      $dataKriteria .= "</tr>";
    }

    $tpl = new Template("templates/index.html");
    $tpl->replace("DATA_TABEL", $dataKriteria);
    $tpl->replace("DATA_HEADER", $headerKriteria);
    $tpl->write(); 
  }
}
?>
