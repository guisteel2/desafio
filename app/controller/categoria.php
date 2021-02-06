<?php
namespace App\controller;
use App\model\ModelCategoria;

class categoria
{
    public function listaCatetgorias(){
        return ModelCategoria::getCategorias();
    }

    public function cadastrar($post){
        echo '<pre>'; print_r('----------------'); echo '</pre>';
        $enviarParaGravar = ModelCategoria::cadastrar($post);
        echo '<pre>'; print_r($post); echo '</pre>';
        die('fazer um redirect');
    }

    public function deletar($id){   
        $return = ModelCategoria::excluir($id);
        echo '<pre>'; print_r($return); echo '</pre>';
        die('fazer um redirect');
        return $return;
    }

    public function editar($id){   
        $return = ModelCategoria::atualizar($id);
        die('fazer um redirect');
        return $return;
    }

}