<?php
namespace app\models\service;

use app\models\validacao\TipomovimentoValidacao;

class TipomovimentoService{
    public static function salvar($tipomovimento, $campo, $tabela){
        $validacao = TipomovimentoValidacao::salvar($tipomovimento);
        return Service::salvar($tipomovimento, $campo, $validacao->listaErros(), $tabela);
    }
}

