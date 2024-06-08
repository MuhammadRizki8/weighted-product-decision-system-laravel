<?php
include_once("conf.php");
include_once("models/Opsi.class.php");
include_once("views/Opsi.view.php");

class OpsiController {
    private $opsi;

    function __construct(){
        $this->opsi = new Opsi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index($id_kriteria) {
        $this->opsi->open();
        $this->opsi->getOpsiByKriteriaId($id_kriteria);
        $data = array(
            'opsi' => array(),
            'id_kriteria' => $id_kriteria
        );

        while($row = $this->opsi->getResult()){
            array_push($data['opsi'], $row);
        }

        $this->opsi->close();

        $view = new OpsiView();
        $view->render($data);
    }

    function add($data){
        $this->opsi->open();
        $this->opsi->add($data);
        $this->opsi->close();
        
        header("location:opsi.php?id_kriteria=".$data['id_kriteria']);
    }

    function delete($id, $id_kriteria){
        $this->opsi->open();
        $this->opsi->delete($id);
        $this->opsi->close();
        
        header("location:opsi.php?id_kriteria=$id_kriteria");
    }
}
?>
