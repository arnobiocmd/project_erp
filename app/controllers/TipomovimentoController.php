<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\tipomovimentoService;

class TipomovimentoController extends Controller{
   private $tabela = "tipo_movimento";
   private $campo  = "id_tipo_movimento";
   
    public function index(){
      $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "tipoMovimento/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
       $dados["tipomovimento"] = Flash::getForm();
        //i($dados["tipomovimento"]);

      
        $dados["categorias"] = Service::lista("categoria");
        $dados["unidades"]   = Service::lista("unidade");
      
        $dados["view"] = "tipoMovimento/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $tipomovimento = Service::get($this->tabela, $this->campo, $id);       
        if(!$tipomovimento){
            $this->redirect(URL_BASE."tipomovimento");
        }
        
        $dados["tipomovimento"]   = $tipomovimento;
        $dados["categorias"] = Service::lista("categoria");
        $dados["unidades"]   = Service::lista("unidade");
        $dados["view"]      = "tipoMovimento/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $tipomovimento = new \stdClass();
        $tipomovimento->id_tipo_movimento                 = $_POST["id_tipo_movimento"];
        $tipomovimento->tipo_movimento 		            = $_POST['tipo_movimento'];
        $tipomovimento->ent_sai 		                = $_POST['ent_sai'];
        $tipomovimento->movimenta_estoque 		        = $_POST['movimenta_estoque'];
        
        
        
     
        
        Flash::setForm($tipomovimento);
        if(tipomovimentoService::salvar($tipomovimento, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."tipomovimento");
        }else{
            if(!$tipomovimento->id_tipomovimento){
                $this->redirect(URL_BASE."tipomovimento/create");
            }else{
                $this->redirect(URL_BASE."tipomovimento/edit/".$tipomovimento->id_tipomovimento);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."tipomovimento");
    }
}

