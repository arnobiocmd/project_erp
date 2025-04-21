<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class TipomovimentoValidacao{
    public static function salvar($tipomovimento){
        $validacao = new Validacao();
        
        $validacao->setData("tipo_movimento", $tipomovimento->tipo_movimento);
        $validacao->setData("ent_sai" , $tipomovimento->ent_sai);
        $validacao->setData("movimenta_estoque" , $tipomovimento->movimenta_estoque);
    
     
        
        
        //fazendo a validação
        $validacao->getData("tipo_movimento")->isVazio();
        $validacao->getData("ent_sai")->isVazio();
        $validacao->getData("movimenta_estoque")->isVazio();

       

    
        
        return $validacao;
        
    }
}

