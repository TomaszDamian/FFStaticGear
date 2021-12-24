<?php
//namespace App\Core\Database;
class QueryBuilder
{
	protected $pdo;
	
	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function selectAll($table){
		$statement = $this->pdo->prepare("select * from {$table}");
		
		$statement->execute();
		
		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function insert($table, $value){
		$sql = sprintf("INSERT INTO %s(%s) VALUES (%s)",
			$table,
			implode(", ",array_keys($value)),
			":" . implode(', :', array_keys($value))
		);
		try{
			$statement = $this->pdo->prepare($sql);
			$statement->execute($value);
		}
		catch(PDOException $e){
			die('Data could not be saved to the database');
		}
		
	
	}
}