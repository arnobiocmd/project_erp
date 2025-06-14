<?php
namespace app\models\service;

use app\models\validacao\ProdutoValidacao;
use app\util\UtilService;

class ProdutoService{
    public static function salvar($produto, $campo, $tabela){
        global $config_upload;
        $validacao = ProdutoValidacao::salvar($produto);
        if($validacao->qtdeErro() <=0){            
            /// fazendo o upload do arquivo
            if($_FILES["arquivo"]["name"]){
                $produto->imagem = UtilService::upload("arquivo", $config_upload);
                if(!$produto->imagem){
                  return false;  
                }
            }  

        }
        return Service::salvar($produto, $campo, $validacao->listaErros(), $tabela);
    }
}

