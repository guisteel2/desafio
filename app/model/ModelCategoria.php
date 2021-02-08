<?php
namespace App\model;
use App\config\Banco;
use \PDO;
use \PDOException;

class ModelCategoria{
    private $id;
    private $codigo;
    private $Nome;
    private $created_at;
    private $updated_at;

    public static function getCategorias($where = null, $order = null, $limit = null){
        return (new Banco('categorias'))->select($where,$order,$limit)
                                        ->fetchAll(PDO::FETCH_CLASS);
    }

    public function cadastrar($array){
        $obDatabase = new Banco('categorias');

        //INSERIR NO BANCO
        $obDatabase = new Banco('categorias');
        
        $id = $obDatabase->insert([
                                    'codigo'    => $codigo,
                                    'Nome'      => $Nome,
                                    'created_at'=> $created_at,
                                    'updated_at'=> $updated_at
                                   ]);
        return true;
    }

    public function atualizar($id){ 
        return (new Banco('categorias'))->update('id = '.$id,[
                                                                'codigo'     => $codigo,
                                                                'Nome'       => $Nome,
                                                                'updated_at' => $updated_at
                                                            ]);
    }

    public function excluir($id){
        return (new Banco('categorias'))->delete('id = '.$id);
    }

    private function getProdutos($id){

    }
}