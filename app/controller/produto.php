<?php
namespace App\controller;
use App\model\ModelProduto;

class produto
{
    public function cadastrar($post){
        echo '<pre>'; print_r('----------------'); echo '</pre>';
        $enviarParaGravar = ModelProduto::cadastrar($post);
        echo '<pre>'; print_r($post); echo '</pre>';
        die('fazer um redirect');
    }

    public function deletar($id){   
        $return = ModelProduto::excluir($id);
        echo '<pre>'; print_r($return); echo '</pre>';
        die('fazer um redirect');
        return $return;
    }

    public function editar($id){   
        $return = ModelProduto::atualizar($id);
        $return = "depois tiro";
        die('fazer um redirect');
        return $return;
    }

    public function listaProdutos(){    
        return ModelProduto::getProdutos();
    }

}