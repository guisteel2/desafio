<?php
namespace App\model;
use App\config\Banco;
use \PDO;
use \PDOException;

class ModelFoto{

  public $id;
  public $url;
  public $descricao;
  public $produto_id;
  public $created_at;
  public $updated_at;

    public static function getFoto($where = null, $order = null, $limit = null){
        return (new Banco('fotos'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS);
    }

    public function cadastrar($array){
        
        //INSERIR NO BANCO
        $obDatabase = new Banco('fotos');
        
        $id = $obDatabase->insert([
                                    'url'       => $array->url,
                                    'descricao' => $array->descricao,
                                    'produto_id'=> 1,
                                    'created_at'=> str_replace("/","-",date('Y/m/d')),
                                    'updated_at'=> str_replace("/","-",date('Y/m/d'))
                                   ]);

        return $id;
    }

    public function atualizar($foto){ 
        
        return (new Banco('fotos'))->update('id = '.$foto->id,[
                                                            'url'        => $foto->url,
                                                            'descricao'  => $foto->descricao,
                                                            'produto_id' => $foto->produto_id,
                                                            'updated_at' => str_replace("/","-",date('Y/m/d'))
                                                            ]);
                                                
    }

    public function excluir($id){
        return (new Banco('fotos'))->delete('id = '.$id);
    }

}