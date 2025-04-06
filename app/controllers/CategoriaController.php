<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\categoriaService;

class CategoriaController extends Controller{
   private $tabela = "categoria";
   private $campo  = "id_categoria";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "categoria/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["categoria"] = Flash::getForm();
       // $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "categoria/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $categoria = Service::get($this->tabela, $this->campo, $id);       
        if(!$categoria){
            $this->redirect(URL_BASE."categoria");
        }
        
        $dados["categoria"]   = $categoria;
        $dados["view"]      = "categoria/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $categoria = new \stdClass();
        $categoria->id_categoria        = $_POST["id_categoria"];
        $categoria->categoria 		    = $_POST['categoria'];
     
        
        Flash::setForm($categoria);
        if(categoriaService::salvar($categoria, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."categoria");
        }else{
            if(!$categoria->id_categoria){
                $this->redirect(URL_BASE."categoria/create");
            }else{
                $this->redirect(URL_BASE."categoria/edit/".$categoria->id_categoria);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."categoria");
    }
}

