<?php

namespace Library;

use \PDO;

class BookManager
{

	protected $pdo;

	public function __construct()
	{
	    //connexion à la base
	    $this->pdo = new PDO('mysql:host=localhost;dbname=eval_library', 'root', '', array(
	    	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
	    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
	        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
	    ));
	}

	public function insert(Book $book)
	{
		$sql = "INSERT INTO books (id, title, author, year, dateCreated) 
				VALUES (NULL, :title, :author, :year, :dateCreated)";
		$stmt = $this->pdo->prepare($sql);

		return $stmt->execute([
			":title" => $book->getTitle(),
			":author" => $book->getAuthor(),
			":year" => $book->getYear(),
			":dateCreated" => $book->getDateCreated()
		]);
	}
	
	public function findAll($limit = 200)
	{
		if (!is_int($limit)){
			die("Limit must be an integer.");
		}

		$sql = "SELECT * FROM books ORDER BY id DESC LIMIT $limit";
		$stmt = $this->pdo->prepare($sql);

		$stmt->execute();
		return $stmt->fetchAll();
	}

}