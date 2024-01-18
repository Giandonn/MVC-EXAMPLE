<?php
class Disciplinas_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function del(){
        $coddisc =(int)$_GET['id'];

        $msg = array("codigo" => 0, "texto" => "erro ao excluir");

        if($coddisc > 0){
            $result = $this->db->delete('escola.curso', "codigo = '$coddisc'");

            if ($result){
                $msg = array("codigo" => 1, "texto" => "Registro excluido com sucesso");
            } else{
                $msg = array("codigo" => 0, "texto" => "Erro");
            }
        }

        echo (json_encode($msg));

    }

    public function save(){
        $x = file_get_contents('php://input');
        $x = json_decode($x);

        $coddisc = $x->txtcoddisc;
        $nomedisc = $x->txtnomedisc;
        $ch = $x->txtch;


        if($coddisc > 0){
            $dadosSave = array('nome' => $nomedisc, 'carga' => $ch);
        }
        $result = $this->db->update('escola.curso', $dadosSave, "codigo = {$coddisc}");
        if ($result){
            $msg = array("codigo" => 1, "texto" => "sucesso");
        } else{
            $msg = array("codigo" => 0, "texto" => "erro");
        }

        echo (json_encode($msg));
    }

    public function loadData($id){
        $cod = (int)$id;
            $result = $this->db->select('select codigo, nome, carga from escola.curso where codigo= :cod', array(":cod" => $cod));
        $result =json_encode($result);
        echo ($result);
    }

    public function listaDisc(){
        $result = $this->db->select("select codigo, nome, carga from escola.curso order by codigo");
        echo (json_encode($result));
    }

    public function insert(){
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $carga = $x->ch;
        $nomedisc = $x->nome;

        $result = $this->db->insert('escola.curso', (array('carga' => $carga, 'nome' => $nomedisc)));
        if ($result){
            $msg = array("codigo" => 1, "texto" => "sucesso");
        } else{
            $msg = array("codigo" => 0, "texto" => "erro");
        }

        echo (json_encode($msg));

    }   
}