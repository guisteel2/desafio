<?php
namespace App\model;
use App\config\Banco;
use \PDO;
use \PDOException;

class ModelProduto{

   
  private $id;
  private $Nome;
  private $SKU;
  private $preco;
  private $descricao;
  private $quantidade;
  private $categoria_id;
  private $foto_id;
  private $created_at;
  private $updated_at;

    public static function getProdutos($where = null, $order = null, $limit = null){
        return (new Banco('produtos'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS);
    }

    public function cadastrar($array){
        //DEFINIR A DATA
        // $created_at = date('Y-m-d H:i:s');
        // $updated_at = date('Y-m-d H:i:s');
        // $Nome = "foine";
        // $SKU = "1231";
        // $preco = "123.2";
        // $quantidade = 2;
        // $descricao = "sdadas";
        // $categoria_id = 1;
        // $foto_id = "1";

        die('fazer tratamento para criar o produto');

        $obDatabase = new Banco('produtos');

        //INSERIR NO BANCO
        $obDatabase = new Banco('produtos');
        
        $id = $obDatabase->insert([
                                    'Nome'         => $Nome,
                                    'SKU'          => $SKU,
                                    'preco'        => $preco,
                                    'descricao'    => $descricao,
                                    'quantidade'   => $quantidade,
                                    'categoria_id' => $categoria_id,
                                    'foto_id'      => $foto_id,
                                    'created_at'   => $created_at,
                                    'updated_at'   => $updated_at
                                    ]);
        return true;
    }

    public function atualizar($id){

        die('fazer tratamento para atualizar o produto');
        return (new Banco('produtos'))->update('id = '.$id,[
                                                            'Nome'         => '$this->titulo',
                                                            'SKU'          => '$this->descricao',
                                                            'preco'        => '2.2',
                                                            'descricao'    => '$this->data',
                                                            'quantidade'   => '1',
                                                            'categoria_id' => '1',
                                                            'foto_id'      =>' 1',
                                                            'updated_at'   => '2021-02-05'
                                                            ]);
    }


    public function excluir($id){
        return (new Banco('produtos'))->delete('id = '.$id);
    }

    private function getcategoria($id){

    }

    private function getfoto($id){

    }

}