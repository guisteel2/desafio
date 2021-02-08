<?php
namespace App\model;
use App\config\Banco;
use App\model\ModelProduto;
use \PDO;
use \PDOException;

class ModelCategoria{
    public $id;
    public $codigo;
    public $Nome;
    public $created_at;
    public $updated_at;

    public static function getCategorias($where = null, $order = null, $limit = null){
        return (new Banco('categorias'))->select($where,$order,$limit)
                                        ->fetchAll(PDO::FETCH_CLASS);
    }

    public function cadastrar($array){
        $obDatabase = new Banco('categorias');

        //INSERIR NO BANCO
        $obDatabase = new Banco('categorias');
        
        $id = $obDatabase->insert([
                                    'codigo'    => $array->codigo,
                                    'Nome'      => $array->Nome,
                                    'created_at'=> str_replace("/","-",date('Y/m/d')),
                                    'updated_at'=> str_replace("/","-",date('Y/m/d'))
                                   ]);
        return true;
    }

    public function atualizar($id , $array){ 
        return (new Banco('categorias'))->update('id = '.$id,[
                                                                'codigo'     => $array->codigo,
                                                                'Nome'       => $array->Nome,
                                                                'updated_at' => str_replace("/","-",date('Y/m/d'))
                                                            ]);
    }

    public function excluir($id){
        $where = 'categoria_id = '. $id;
        $inner = 'categorias';
        $campo = "categoria_id";
        $fields ='a.id AS "produto_id"';

        $valid = (new Banco('produtos'))->selectInner($inner, $campo,$where,$order = null, $limit = null, $fields)->fetchAll(PDO::FETCH_CLASS);

        foreach($valid as $valid){
            ModelProduto::excluir($valid->produto_id);
        }
        return (new Banco('categorias'))->delete('id = '.$id);
    }

    private function getProdutos($id){

    }
}