<?php

namespace App\config;

use \PDO;
use \PDOException;

class Banco{


  const HOST = 'localhost';
  const NAME = 'desafio_webpumb';
  const USER = 'root';
  const PASS = 'root';

  private $table;

  /**
   * Instancia de conexão com o banco de dados
   * @var PDO
   */
  private $connection;

  /**
   * Define a tabela e instancia e conexão
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * Método responsável por criar uma conexão com o banco de dados
   */
  private function setConnection(){
    try{
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERRO NA CONEXÃO COM O BANCO: '.$e->getMessage());
    }
  }

  /**
   * Método responsável por executar queries dentro do banco de dados
   * @param  string $query
   * @param  array  $params
   * @return PDOStatement
   */
  public function execute($query,$params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR NO EXECUTE: '.$e->getMessage());
    }
  }

  /**
   * Método responsável por inserir dados no banco
   * @param  array $values [ field => value ]
   * @return integer ID inserido
   */
  public function insert($values){
    //DADOS DA QUERY
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');

    //MONTA A QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    //EXECUTA O INSERT
    $this->execute($query,array_values($values));

    //RETORNA O ID INSERIDO
    return $this->connection->lastInsertId();
  }

  /**
   * Método responsável por executar uma consulta no banco
   * @param  string $where
   * @param  string $innerJoin
   * @param  string $inner
   * @param  string $campo
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    //DADOS DA QUERY
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    // echo '<pre>'; print_r('ssssasdads'); echo '</pre>';
    // die;
    //MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    
    //EXECUTA A QUERY
    return $this->execute($query);
  }

  public function selectInner($inner = null, $campo = null ,$where = null, $order = null, $limit = null, $fields = '*'){
      //DADOS DA QUERY
      $inner = explode(",", $inner);
      $campo = explode(",", $campo);
      $innerJoin = "";
      $where = strlen($where) ? 'WHERE '.'a.'.$where : '';
      $order = strlen($order) ? 'ORDER BY '.$order : '';
      $limit = strlen($limit) ? 'LIMIT '.$limit : '';
      
      
      if(count($inner) > 1){

        for($i=0; $i < count($inner); $i++){

          if($fields != "*"){
            if($i==0){
              $Letra = 'b';
            }else{
              $Letra = 'c';
            }
          }
          $innerJoin .= 'INNER JOIN '.$inner[$i].' as '.$Letra.' ON a.'.$campo[$i]." = ".$Letra.'.id ';
        }
      }else{
        $innerJoin .= 'INNER JOIN '.$inner[0]. ' as b ON a.'.$campo[0].' = b.id ';
      }
      
      //MONTA A QUERY
      $query = 'SELECT '.$fields.' FROM '.$this->table.' as a '.$innerJoin.' '. $where.' '. $order.' '.$limit;
      
      
  
      //EXECUTA A QUERY
      return $this->execute($query);
  }



  /**
   * Método responsável por executar atualizações no banco de dados
   * @param  string $where
   * @param  array $values [ field => value ]
   * @return boolean
   */
  public function update($where,$values){
    //DADOS DA QUERY
    $fields = array_keys($values);

    //MONTA A QUERY
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    //EXECUTAR A QUERY
    $this->execute($query,array_values($values));

    //RETORNA SUCESSO
    return true;
  }

  /**
   * Método responsável por excluir dados do banco
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    //MONTA A QUERY
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    //EXECUTA A QUERY
    $this->execute($query);

    //RETORNA SUCESSO
    return true;
  }

}