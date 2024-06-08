<?php

class OpsiView {
  public function render($data){
    $no = 1;
    $headerOpsi = "<tr>
            <th>NO</th>
            <th>Opsi</th>
            <th>Nilai</th>
            <th>Aksi</th>
          </tr>";
    $dataOpsi = null;
    $no = 1;
    foreach($data['opsi'] as $val){
      list($id, $opsi, $nilai, $id_kriteria) = $val;
      $dataOpsi .= "<tr>
              <td>" . $no++ . "</td>
              <td>" . $opsi . "</td>
              <td>" . $nilai . "</td>
              <td>
                <a href='opsi.php?id_hapus=" . $id . "&id_kriteria=" . $id_kriteria . "' class='btn btn-danger' '>Hapus</a>
              </td>";
      $dataOpsi .= "</tr>";
    }

    $tpl = new Template("templates/index.html");
    $tpl->replace("DATA_TABEL", $dataOpsi);
    $tpl->replace("DATA_HEADER", $headerOpsi);
    $tpl->write(); 
  }
}
?>
