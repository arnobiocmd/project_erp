<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\unidadeService;

class UnidadeController extends Controller{
   private $tabela = "unidade";
   private $campo  = "id_unidade";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "unidade/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["unidade"] = Flash::getForm();
       // $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "unidade/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $unidade = Service::get($this->tabela, $this->campo, $id);       
        if(!$unidade){
            $this->redirect(URL_BASE."unidade");
        }
        
        $dados["unidade"]   = $unidade;
        $dados["view"]      = "unidade/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $unidade = new \stdClass();
        $unidade->id_unidade        = $_POST["id_unidade"];
        $unidade->unidade 		    = $_POST['unidade'];
     
        
        Flash::setForm($unidade);
        if(unidadeService::salvar($unidade, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."unidade");
        }else{
            if(!$unidade->id_unidade){
                $this->redirect(URL_BASE."unidade/create");
            }else{
                $this->redirect(URL_BASE."unidade/edit/".$unidade->id_unidade);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."unidade");
    }
}

