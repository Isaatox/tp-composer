<?php

namespace App\Manager;

use PDO;
use Exception;
use App\Entity\User;

class UserManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }

    public function setDB(PDO $db): UserManager
    {
        $this->_db = $db;
        return $this;
    }

    public function add(User $user): bool
    {
        $result = false;
        try {
            $query = $this->_db->prepare('INSERT INTO users (`email`, `password`) VALUES (:email, :passwd);');
            $query->bindValue(':email', $user->getEmail());
            $query->bindValue(':passwd', $user->getPassword());
            $result = $query->execute();
        } catch (Exception $e) {
            print("UNe erreur est intervenue : '".$e->getMessage()."'");
        }
        return $result;
    }

    public function delete(User $user): bool
    {
        $query = $this->_db->prepare('DELETE FROM `users`WHERE id=:id;');
        $query->bindValue(':id', $user->getId());
        return $query->execute();    
    }

    public function getAll(): array
    {
        $listeUser = array();
        //Retourne la liste de tous les pers
        $request = $this->_db->query('SELECT * FROM users;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée
        {
            $user = new User($ligne);
            $listeUser[] = $user;
        }
        return $listeUser;
    }

    public function getOne(int $id)
    {
        $sth = $this->_db->prepare('SELECT * FROM users WHERE id = ?');
        $sth-> execute(array($id));
        $ligne = $sth->fetch();
        $user = new User($ligne);  
        return $user; 
    }


    public function update(User $user): bool
    {             
        $query = $this->_db->prepare('UPDATE users SET email=:email, role=:roles WHERE id=:id;');
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':roles', $user->getRole());
        $query->bindValue(':id', $user->getId());
        return($query->execute());
    }
}