<?php

namespace App\Entity;

use App\Entity\User;

class User {

    private $_id;
    private $_email;
    private $_password;
    private $_role;


    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);

    }

    public function hydrate(array $ligne)
    {
        foreach ($ligne as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of _email
     */ 
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     *
     * @return  self
     */ 
    public function setEmail($_email)
    {
        $this->_email = $_email;

        return $this;
    }

    /**
     * Get the value of _password
     */ 
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->_password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get the value of _role
     */ 
    public function getRole()
    {
        return $this->_role;
    }

    /**
     * Set the value of _role
     *
     * @return  self
     */ 
    public function setRole($_role)
    {
        $this->_role = $_role;

        return $this;
    }

    /**
     * Get the value of _id
     */ 
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }
}