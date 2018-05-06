<?php

class UserModel
{
    private $_idUser;
    private $_role;
    private $_name;
    private $_surname;
    private $_email;
    private $_password;
    private $_avatar;
    
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    
    public function idUser()
    {
        return $this->_idUser;
    }
    
    public function role()
    {
        if ($this->_role == '1') {
            $this->_role = 'Administrateur';
            return $this->_role;
        } else {
            $this->_role = 'Utilisateur';
            return $this->_role;
        }
    }
    
    public function name()
    {
        return $this->_name;
    }
    
    public function surname()
    {
        return $this->_surname;
    }
    
    public function email()
    {
        return $this->_email;
    }
    
    public function password()
    {
        return $this->_password;
    }
    
    public function avatar()
    {
        return $this->_avatar;
    }
    
    public function setIdUser($idUser)
    {
        $this->_idUser = (int) $idUser;
    }
    
    public function setRole($role)
    {
        $this->_role = (int) $role;
    }
    
    public function setName($name)
    {
        if (is_string($name) && strlen($name) <= 30) {
            $this->_name = $name;
        }
    }
    
    public function setSurname($surname)
    {
        if (is_string($surname) && strlen($surname) <= 30) {
            $this->_surname = $surname;
        }
    }
    
    public function setEmail($email)
    {
        if (is_string($email) && strlen($email) <= 30) {
            $this->_email = $email;
        }
    }
    
    public function setPassword($password)
    {
        if (is_string($password) && strlen($password) <= 100) {
            $this->_password = $password;
        }
    }
    
    public function setAvatar($avatar)
    {
        if (is_string($avatar)) {
            $this->_avatar = $avatar;
        }
    }
}
