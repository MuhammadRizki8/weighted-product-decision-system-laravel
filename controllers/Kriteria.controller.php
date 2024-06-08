<?php
include_once("conf.php");
include_once("models/Kriteria.class.php");
include_once("views/Kriteria.view.php");

class KriteriaController {
    private $kriteria;

    function __construct(){
        $this->kriteria = new Kriteria(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index($id = null) {
        $this->kriteria->open();
        $this->kriteria->getKriteria();
        $data = array(
            'kriteria' => array(),
            'selected' => array()
        );

        while($row = $this->kriteria->getResult()){
            array_push($data['kriteria'], $row);
        }

        if (!empty($id)) {
            $this->kriteria->getKriteriaById($id);
            while ($row = $this->kriteria->getResult()) {
                array_push($data['selected'], $row);
            }
        }

        $this->kriteria->close();

        $view = new KriteriaView();
        $view->render($data, $id);
    }

    function add($data){
        $this->kriteria->open();
        $this->kriteria->add($data);
        $this->kriteria->close();
        
        header("location:kriteria.php");
    }

    function edit($id, $data){
        $this->kriteria->open();
        $this->kriteria->update($id, $data);
        $this->kriteria->close();
        
        header("location:kriteria.php");
    }

    function delete($id){
        $this->kriteria->open();
        $this->kriteria->delete($id);
        $this->kriteria->close();
        
        header("location:kriteria.php");
    }
}
?>
