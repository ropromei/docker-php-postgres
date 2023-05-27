<?php

require_once 'Person.php';
require_once 'Book.php';

class Repository {
    private $conn;

    public function __construct() {
        $dbhost = getenv('DBHOST');
        $this->conn = new PDO(
            "pgsql:host=$dbhost;port=5432;dbname=testapp",
            'testapp',
            'password'
        );
    }

    public function getAllPersons() : array
    {
        $stmt = $this->conn->prepare('SELECT person_id AS id, first_name, last_name FROM person;');
        $stmt->execute();

        $persons = [];

        foreach ($stmt as $row) {
            $persons[] = new Person(
                $row['id'],
                $row['first_name'],
                $row['last_name']
            );
        }

        return $persons;
    }

    public function getAllBooks() : array
    {
        $stmt = $this->conn->prepare('SELECT title FROM book;');
        $stmt->execute();

        $books = [];

        foreach ($stmt as $row) {
            $books[] = new Book($row['title']);
        }

        return $books;
    }
}
