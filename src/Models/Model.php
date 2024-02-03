<?php

namespace Src\Models;

use PDOException;

class Model{

    private $conn;

    public function __construct(){

		//echo getenv('DB_CONNECTION').":dbname=".getenv('DB_DATABASE').";host=".getenv('DB_HOST').",".getenv('DB_USER');exit;
        
        $this->conn = new \PDO(getenv('DB_CONNECTION').":dbname=".getenv('DB_DATABASE').";host=".getenv('DB_HOST')
        ,getenv('DB_USERNAME')
        ,getenv('DB_PASSWORD'));

    }

    private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
			
		}

	}

	private function bindParam($statement, $key, $value){

		$statement->bindParam($key, $value);

	}

    public function query($rawQuery, $params = array(),$analyQuery=0){

		try {

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();

			if($analyQuery){
				$this->debugSql($stmt);
				exit;
			}

			return true;

		}catch(PDOException $e){
			return false;
		}

	}

	public function debugSql($stmt){

		ob_start();
		$stmt->debugDumpParams();
		$string_sql = ob_get_clean();
		
		$sql = substr($string_sql, strpos($string_sql, 'Sent'));

		$sql = substr($sql,0, strpos($sql, 'Params:'));

		echo trim($sql);
		
	}

	public function select($rawQuery, $params = array()):array{

		try {

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return false;
		}

	}

	public function numRow($rawQuery,$params = array()){

		try{
			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();

			return $stmt->rowCount();

		}catch(PDOException $e){
			return false;
		}

	}

	public function setData($data = array()){

        foreach($data as $key => $value){

            $this->{"set".$key}($value);

        }

    }

	public function valueFormat($value){

		$value = str_replace('.','',$value);
		$value = str_replace(',','.',$value);

		return $value;

	}

	public function dateFormat($date,$type){

		$obj = new \DateTime();

		// Se o tipo for 2 ele ativa a hora
		$time = $type == 2 ? 'H:i' : '';
		
		$value = date("Y-m-d $time",$date);

		// Se for date for 'now' a função retorna a data de hoje
		if($date == 'now'){
			$value = $obj->format("Y-m-d $time");
		}

		return $value;

	}

}

