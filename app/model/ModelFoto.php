<?php
namespace App\model;
use App\config\Banco;
use \PDO;
use \PDOException;

class ModelFoto{

  private $id;
  private $url;
  private $descricao;
  private $produto_id;
  private $created_at;
  private $updated_at;

    public static function getFoto($where = null, $order = null, $limit = null){
        return (new Banco('fotos'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS);
    }

    public function cadastrar($array){
        die('fazer tratamento para criar a foto do produto');

        //INSERIR NO BANCO
        $obDatabase = new Banco('fotos');
        
        $id = $obDatabase->insert([
                                    'url'       => $url,
                                    'descricao' => $descricao,
                                    'produto_id'=> $produto_id,
                                    'created_at'=> $created_at,
                                    'updated_at'=> $updated_at
                                   ]);

        return true;
    }

    public function atualizar($id){ 
        die('fazer tratamento para atualizar foto do produto');
        return (new Banco('fotos'))->update('id = '.$id,[
                                                            'url'        => $url,
                                                            'descricao'  => $descricao,
                                                            'produto_id' => $produto_id,
                                                            'updated_at' => $updated_at
                                                            ]);
    }

    public function excluir($id){
        return (new Banco('fotos'))->delete('id = '.$id);
    }

}