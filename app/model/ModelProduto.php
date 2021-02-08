<?php
namespace App\model;
use App\config\Banco;
use \PDO;
use App\model\ModelFoto;
use \PDOException;

class ModelProduto{

   
  public $id;
  public $Nome;
  public $SKU;
  public $preco;
  public $descricao;
  public $quantidade;
  public $categoria_id;
  public $foto_id;
  public $created_at;
  public $updated_at;

    public static function getProdutos($inner = null, $campo = null ,$where = null, $order = null, $limit = null){
        
        //tabelas vinculadas ao produto
        $inner = 'categorias,fotos';
        $campo = 'categoria_id,foto_id';
        $fields =' a.*, b.codigo AS "cod_categoria", b.nome AS "nome_categoria", c.descricao AS "des_foto", c.url';
        $return = (new Banco('produtos'))->selectInner($inner, $campo,$where,$order,$limit,$fields)
        ->fetchAll(PDO::FETCH_CLASS);
        
        return $return;
    }

    public function cadastrar($array){
        
        $destino = '..\assets\images\product/' . $_FILES['image']['name'];
        $arquivo_tmp = $_FILES['image']['tmp_name'];
        
        $foto = new ModelFoto();
        $foto->url  = $destino;
        $foto->descricao = $_FILES['image']['name'];

        
        $foto_id = ModelFoto::cadastrar($foto);
        
        //INSERIR NO BANCO
        $obDatabase = new Banco('produtos');
       
        $id = $obDatabase->insert([
                                    'Nome'         => $array->Nome,
                                    'SKU'          => $array->SKU,
                                    'preco'        => $array->preco,
                                    'descricao'    => $array->descricao,
                                    'quantidade'   => $array->quantidade,
                                    'categoria_id' => $array->categoria_id,
                                    'foto_id'      => $foto_id,
                                    'created_at'   => $array->created_at,
                                    'updated_at'   => $array->updated_at
                                    ]);

        $foto->id = $foto_id;
        $foto->produto_id = $id;

        $url = substr_replace($foto->url, $foto->produto_id,25);
        $url = substr_replace($url,  $_FILES['image']['name'],27);

        move_uploaded_file( $arquivo_tmp, $url);

        $foto->url = $url;
        $foto = ModelFoto::atualizar($foto);
        
        return true;
    }

    public function atualizar($id , $array){

        $where = 'id = '. $id;
        $inner = 'fotos';
        $campo = "foto_id";

        $valid = (new Banco('produtos'))->selectInner($inner, $campo,$where)->fetchAll(PDO::FETCH_CLASS);

        $url = substr_replace($valid[0]->url, $_FILES['image']['name'],27);
        
        if(!empty($_FILES['image']['name']) & $url != $valid[0]->url){
            $destino = '..\assets\images\product/'.$valid[0]->produto_id.$_FILES['image']['name'];
        }else{
            $destino = $valid[0]->url;
        }
        
        if($valid[0]->url == $destino){

            return (new Banco('produtos'))->update('id = '.$id,[
                'Nome'         => $array->nome,
                'SKU'          => $array->sku,
                'preco'        => $array->price,
                'descricao'    => $array->descricao,
                'quantidade'   => $array->qtd,
                // 'categoria_id' => $array->,
                // 'foto_id'      => ' 1',
                'updated_at'   => str_replace("/","-",date('Y/m/d'))
                ]);
                
        }else{
            
            $foto = new ModelFoto();
            $foto->url  = $destino;
            $foto->descricao = $_FILES['image']['name'];
            $foto->id = $valid[0]->foto_id;
            $foto->produto_id = $valid[0]->id;
            
            $foto = ModelFoto::atualizar($foto);
            
            $arquivo_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino  );
            unlink ($valid[0]->url);
            
            return (new Banco('produtos'))->update('id = '.$id,[
                'Nome'         => $array->nome,
                'SKU'          => $array->sku,
                'preco'        => $array->price,
                'descricao'    => $array->descricao,
                'quantidade'   => $array->qtd,
                // 'categoria_id' => $array->
                'updated_at'   => str_replace("/","-",date('Y/m/d'))
                ]);
        }
        
    }

    public function excluir($id){
        $where = 'id = '. $id;
        $inner = 'fotos';
        $campo = "foto_id";

        $valid = (new Banco('produtos'))->selectInner($inner, $campo,$where)->fetchAll(PDO::FETCH_CLASS);
        
        unlink ($valid[0]->url);
        return (new Banco('produtos'))->delete('id = '.$id);
    }

    private function getcategoria($id){

    }

    private function getfoto($id){

    }

}