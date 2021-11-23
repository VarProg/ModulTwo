<?php 

namespace App;

use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder
{
	
	private $pdo;
	private $queryFactory;

	public function __construct(){

		$this->pdo = new PDO("mysql:host=localhost;dbname=MarlinDb;", 'root', 'root');
		$this->queryFactory = new QueryFactory('mysql');

	}	

	public function getAll($table)
	{
		$select = $this->queryFactory->newSelect();
		$select->cols(['*'])
			->from($table);

		$sth = $this->pdo->prepare($select->getStatement());

		$sth->execute($select->getBindValues());

		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function insert($table, $data){
		$insert = $this->queryFactory->newInsert();

		$insert
		    ->into($table)                   // INTO this table
		    ->cols($data);
		
		// prepare the statement
		$sth = $this->pdo->prepare($insert->getStatement());

		// execute with bound values
		$sth->execute($insert->getBindValues());

		}

	public function update($table, $data, $id){
		$update = $this->queryFactory->newUpdate();

		$update
			   ->table($table)                 // update this table
			   ->cols($data)
			   ->where("id = :id")
			   ->bindValue('id', $id);


		// prepare the statement
		$sth = $this->pdo->prepare($update->getStatement());

		// execute with bound values
		$sth->execute($update->getBindValues());    
	}

	public function delete($table, $id){
		$delete = $this->queryFactory->newDelete();

		$delete
		    ->from($table)                   // FROM this table
		    ->where('id = :id')	            // AND WHERE these conditions
		    ->bindValue('id', $id);

		$sth = $this->pdo->prepare($delete->getStatement());

		$sth->execute($delete->getBindValues());

	}

}












