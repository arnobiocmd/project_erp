<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\localizacaoService;

class LocalizacaoController extends Controller{
   private $tabela = "localizacao";
   private $campo  = "id_localizacao";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "localizacao/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["localizacao"] = Flash::getForm();
       // $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "localizacao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $localizacao = Service::get($this->tabela, $this->campo, $id);       
        if(!$localizacao){
            $this->redirect(URL_BASE."localizacao");
        }
        
        $dados["localizacao"]   = $localizacao;
        $dados["lista"] = Service::lista($this->tabela); 
        $dados["view"]      = "localizacao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $localizacao = new \stdClass();
        $localizacao->id_localizacao        = $_POST["id_localizacao"];
        $localizacao->localizacao 		    = $_POST['localizacao'];
     
        
        Flash::setForm($localizacao);
        if(localizacaoService::salvar($localizacao, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."localizacao");
        }else{
            if(!$localizacao->id_localizacao){
                $this->redirect(URL_BASE."localizacao/create");
            }else{
                $this->redirect(URL_BASE."localizacao/edit/".$localizacao->id_localizacao);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."localizacao");
    }
}

