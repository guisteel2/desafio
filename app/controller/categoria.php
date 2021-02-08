<?php
namespace App\controller;
use App\model\ModelCategoria;

class categoria
{
    public function listaCategorias($where = null){
        
        if($where){
            if($_GET['busca']){
                $where = $_GET['busca'];
                $aux = "nome LIKE '%".$where."%' OR codigo LIKE '%".$where."%'" ;
            }else{
                $aux = 'id = '.$where;
            }
           
            return ModelCategoria::getCategorias($aux);
        }else{
            return ModelCategoria::getCategorias();
        }
    }

    public function cadastrar($post){
        if(!empty($post['nome']) & !empty($post['cod'])){
            $categoria = new ModelCategoria();

            $categoria->Nome = $post['nome'];
            $categoria->codigo = $post['cod'];
            $enviarParaGravar = ModelCategoria::cadastrar($categoria);
            return "Produto salvo com sucesso!";
        }else{
            return "Por favor preencha todos os campos!";
        }
    }

    public function deletar($id){  
        
        $return = ModelCategoria::excluir($id);
        return $return;
    }

    public function editar($id,$post){   

        if(!empty($id) & !empty($post['nome']) & !empty($post['cod'])){
            $categoria = new ModelCategoria();

            $categoria->Nome = $post['nome'];
            $categoria->codigo = $post['cod'];

            $return = ModelCategoria::atualizar($id,$categoria);
            return "Produto salvo com sucesso!";
        }else{
            
            return "Por favor preencha todos os campos!";
        }
    }

}