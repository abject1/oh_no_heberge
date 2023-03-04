<?php

$pdo = require_once './database/conn.php';

class UserDB
{
    private PDOstatement $statementCreateOne;

    private $pdo;

    function __construct(PDO $pdo)
    {
        $this->statementCreateOne = $pdo->prepare('
            INSERT INTO user (
                name,
                lastname,
                email,
                password
            ) VALUES (
                :name,
                :lastname,
                :email,
                :password
            )
        ');
    }

    public function createOne($user)
    {
        $this->statementCreateOne->bindValue(':name', $user['name']);
        $this->statementCreateOne->bindValue(':lastname', $user['lastname']);
        $this->statementCreateOne->bindValue(':email', $user['email']);
        $this->statementCreateOne->bindValue(':password', $user['password']);
        $this->statementCreateOne->execute();
    }
}

return new UserDB($pdo);
