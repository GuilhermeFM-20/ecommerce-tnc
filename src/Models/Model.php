<?php

namespace Src\Models;

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

		if($analyQuery == 0){

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();
		
		}else{

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->debugDumpParams();

		}

	}

	public function select($rawQuery, $params = array()):array{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	public function numRow($rawQuery,$params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->rowCount();

	}



}

