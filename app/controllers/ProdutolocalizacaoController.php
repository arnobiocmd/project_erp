<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\produtolocalizacaoService;

class ProdutolocalizacaoController extends Controller{
   private $tabela = "produto_localizacao";
   private $campo  = "id_produto_localizacao";
   
    public function index(){
        $dados["lista"] = ProdutolocalizacaoService::lista(); 
    
       $dados["produtos"] = Service::lista("produto");
       $dados["locais"] = Service::lista("localizacao");
       $dados["view"]  = "produtoLocalizacao/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["produtolocalizacao"] = Flash::getForm();
        $dados["produtos"] = Service::lista("produto");
        $dados["locais"] = Service::lista("localizacao");
        $dados["lista"] = ProdutolocalizacaoService::lista(); 
        $dados["view"] = "produtoLocalizacao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $produtolocalizacao = Service::get($this->tabela, $this->campo, $id);  
          
        if(!$produtolocalizacao){
            $this->redirect(URL_BASE."produtolocalizacao");
        }
        
       $a= $dados["produtolocalizacao"]   = $produtolocalizacao;
    
        //$dados["lista"] = Service::lista($this->tabela);
        $dados["produtos"] = Service::lista("produto");
        $dados["locais"] = Service::lista("localizacao");
        $dados["lista"] = ProdutolocalizacaoService::lista(); 
        $dados["view"] = "produtoLocalizacao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $produtolocalizacao = new \stdClass();
        $produtolocalizacao->id_produto_localizacao        = $_POST["id_produto_localizacao"];
        $produtolocalizacao->id_produto 		           = $_POST['id_produto'];
        $produtolocalizacao->id_localizacao 		       = $_POST['id_localizacao'];
        $produtolocalizacao->estoque 		               =  0;

  
     
        
        Flash::setForm($produtolocalizacao);
        if(ProdutolocalizacaoService::salvar($produtolocalizacao, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."produtolocalizacao");
        }else{
            if(!$produtolocalizacao->id_produto_localizacao){
                $this->redirect(URL_BASE."produtolocalizacao/create");
            }else{
                $this->redirect(URL_BASE."produtolocalizacao/edit/".$produtolocalizacao->id_produto_localizacao);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."produtolocalizacao");
    }
}

