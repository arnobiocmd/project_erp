<?php 
namespace app\models\dao;

use app\core\Model;

class ProdutolocalizacaoDao extends Model{
    public function Lista(){
        $sql = "SELECT * FROM produto_localizacao pl, produto p, localizacao l WHERE 
        pl.id_produto = p.id_produto and pl.id_localizacao = l.id_localizacao";

        return $this->select($this->db,$sql);
        
    }
}
