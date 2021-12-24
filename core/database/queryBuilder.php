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
			die($e->getMessage());
		}
	}
	public function DeleteProcedure($id){
		$sql = 'CALL DeleteSchool(:id)';
		try{
			$statement = $this->pdo->prepare($sql);
			$statement->bindParam(':id', $id, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e){
			die("Error occurred:" . $e->getMessage());
		}
		return null;
	}
	public function SaveProcedure($id, $SchoolName, $json){
		$sql = 'call AlterSchool(?, ?, ?)';
		try{
			$statement = $this->pdo->prepare($sql);
			$statement->bindParam(1, $id, PDO::PARAM_INT);
			$statement->bindParam(2, $SchoolName, PDO::PARAM_STR);
			$statement->bindParam(3, $json, PDO::PARAM_STR);
			$statement->execute();
		}
		catch(PDOException $e){
			die("Error occurred:" . $e->getMessage());
		}
		return null;
	}
	public function PostProcedure($schoolName, $json){
		//firs you create the query and use ? as placeholders for values
		$sql = 'call CreateSchool(?,?)';
		try{
			$statement = $this->pdo->prepare($sql);
			//somehow bindparam is weird and you have to do each parameter by itself
			//some version of this show that you can do everything at once but idk why it doesn't work here
			$statement->bindParam(1, $schoolName, PDO::PARAM_STR);
			$statement->bindParam(2, $json, PDO::PARAM_STR);
			$statement->execute();
		}
		catch(PDOException $e){
			//uhhh I feel like I should be redirecting the user to a different site instead of throwing an error but this will do for now.
			die("Error occurred:" . $e->getMessage());
		}
		return null;
	}
	/**
	 *defines a new GET route
	 * @param  string $table
	 * @param  array $value
	 * @param  array $primaryKey
	 * @return void
	 */
	public function update($table, $value, $primaryKey){
		//$updatedPrimaryKey is now a array that looks like this ['id=:id'];
		$updatePrimaryKey = array_map(function($key){
			return "{$key}=:{$key}";
		},array_keys($primaryKey));		
		
		//updates the values to the same format as the $updatePrimaryKey
		$updatedValues = array_map(function($key){
			return "{$key}=:{$key}";
		},array_keys($value));

		//turns the array to just a string that will look like "id=:id"
		//and if there are more than one primary key it will look like this
		//"id=:id AND PrimaryKey=:PrimaryKey"
		$implodedPrimaryKey = implode(" AND ",$updatePrimaryKey);

		//realised this just now but when you update values you have to put in a comma instead of an AND
		//I feel stupid for not realising that and spending an hour trying to figure out what's wrong
		$implodedValues = implode(", ", $updatedValues);

		//making the actual sql command that should look like this
		//"UPDATE blogs SET value=:value AND value2=:value2 WHERE id=:id"
		$sql = sprintf("UPDATE %s SET %s WHERE %s",
			$table,
			$implodedValues,
			$implodedPrimaryKey
		);

		//try executing return a exception if fails
		try{
			$statement = $this->pdo->prepare($sql);
			$statement->execute(array_merge($primaryKey,$value));
		}
		catch(PDOException $e){
			die($e->getMessage());
		}		
	}
}
