<?php
namespace App\controller;

use App\config\Banco;
use App\model\ModelProduto;

class produto
{
    public function cadastrar($post){
   
        $produto = new ModelProduto();
       
        if(!empty($post['codigo'])  & !empty($post['nome']) & !empty($post['preco']) & !empty($post['qtd']) & !empty($post['categoria']) & !empty($post['descricao']) & !empty($_FILES['image']['tmp_name'])){
           
            $produto->Nome         = $post['nome'];
            $produto->SKU          = $post['codigo'];
            $produto->preco        = $post['preco'];
            $produto->descricao    = $post['descricao'];
            $produto->quantidade   = $post['qtd'];
            $produto->categoria_id = $post['categoria'];
            $produto->foto_id      = $post['foto_id'];
            $produto->created_at   = str_replace("/","-",date('Y/m/d'));
            $produto->updated_at   = str_replace("/","-",date('Y/m/d'));


            $enviarParaGravar = ModelProduto::cadastrar($produto);
    
            return "Produto salvo com sucesso!";

        }else{
            $msg = '';

            foreach ($post as $value => $cod) {
                
                if($cod == '' || $cod == null){
                    $msg .= " O campo:".$value." precisa ser preenchido.  ";
                }
            }
            // echo '<pre>'; print_r($msg); echo '</pre>';
            return $msg;
        }
    }

    public function deletar($id){   
        $return = ModelProduto::excluir($id);
        return $return;
    }

    public function editar($id,$post){   

        if(!empty($post['codigo'])  & !empty($post['nome']) & !empty($post['preco']) & !empty($post['qtd']) & !empty($post['descricao'])){
            $produto = new ModelProduto;
            
            $produto->sku =$post['codigo'];
            $produto->nome =$post['nome'];
            $produto->price = $post['preco'];
            $produto->qtd =$post['qtd'];
            $produto->descricao =$post['descricao'];
            
            $att_produto = ModelProduto::atualizar($id , $produto);
            return "Produto salvo com sucesso!";
        }else{
            return "Por favor preencha todos os campos!";
        }

    }

    public function listaProdutos($where = null){    
        if($where){
            if($_GET['busca']){
                if(is_numeric($_GET['busca'])){
                    $aux = "`SKU` LIKE '%".$where."%' OR a.quantidade LIKE '%".$where."%' OR a.categoria_id LIKE '%".$where."%' OR a.foto_id LIKE '%".$where."%' OR  b.codigo LIKE'%".$where."%'";
                }else{
                    //a e a tabela chamada
                    //b e o vinculo ex:categoria
                    //c e o vinculo ex:foto
                    $aux = "Nome LIKE '%".$where."%' OR a.descricao LIKE '%".$where."%'"." OR b.nome LIKE '%".$where."%'";
                }
                
            }else{
                $aux = 'id = '.$where;
            }
            return ModelProduto::getProdutos($inner = null, $campo = null ,$where = $aux, $order = null, $limit = null);
        }else{
            return ModelProduto::getProdutos();
        }
        
    }

}