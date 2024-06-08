<?php
include_once("conf.php");
include_once("models/Alternatif.class.php");
include_once("views/Alternatif.view.php");

class AlternatifController {
  private $alternatif;

  function __construct(){
    $this->alternatif = new Alternatif(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index($id) {
    $this->alternatif->open();
    $this->alternatif->getAlternatif();
    $data = array(
      'alternatif' => array(),
      'selected' => array()
    );
    while($row = $this->alternatif->getResult()){
      array_push($data['alternatif'], $row);
    }

    if (!empty($id)) {
      $this->alternatif->getAlternatifById($id);

      while ($row = $this->alternatif->getResult()) {
          array_push($data['selected'], $row);
      }
  }

    $this->alternatif->close();

    $view = new AlternatifView();
    $view->render($data, $id);
  }

  
  function add($data){
    $this->alternatif->open();
    $this->alternatif->add($data);
    $this->alternatif->close();
    
    header("location:index.php");
  }

  function edit($id, $data){
    $this->alternatif->open();
    $this->alternatif->update($id, $data);
    $this->alternatif->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->alternatif->open();
    $this->alternatif->delete($id);
    $this->alternatif->close();
    
    header("location:index.php");
  }


}