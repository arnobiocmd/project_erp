<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class ContatoValidacao{
    public static function salvar($contato){
        $validacao = new Validacao();
        
        $validacao->setData("nome", $contato->nome);
        $validacao->setData("eh_cliente" , $contato->eh_cliente);
        $validacao->setData("celular" , $contato->celular);
        $validacao->setData("email", $contato->email);
        $validacao->setData("cpf",$contato->cpf);
        $validacao->setData("cnpj",$contato->cnpj);
        $validacao->setData("email",$contato->email);

        $validacao->setData("nome_fantasia", $contato->nome_fantasia);
     
        
        
        //fazendo a validação
        $validacao->getData("nome")->isVazio()->isMinimo(5);
        $validacao->getData("celular")->isVazio();
        $validacao->getData("email")->isVazio()->isEmail();

        if(!$contato->eh_cliente && !$contato->eh_fornecedor && !$contato->eh_transportador){
            $validacao->getData("eh_cliente")->isVazio("Precisa definir um tipo de contato: Cliente, Fornecedor, Transportador");
        }

        if($contato->cpf){
            $validacao->getData("cpf")->isCPF();
        }
        if($contato->cnpj){
            $validacao->getData("cnpj")->isCNPJ();
        }

        if($contato->email){
            $tem = Service::get("contato","email",$contato->email);
                if($tem && $tem->id_contato != $contato->id_contato){
                    $validacao->getData("email")->isUnico(1);
                }
        }

        // if($contato->nome_fantasia){
        //     $tem = Service::get("contato","nome_fantasia",$contato->nome_fantasia);
        //         if($tem && $tem->id_contato != $contato->id_contato){
        //             $validacao->getData("nome_fantasia")->isUnico(1);
        //         }
        // }
       

        
        
        
        return $validacao;
        
    }
}

