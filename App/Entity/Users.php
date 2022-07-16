<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="users")
 */
class Users{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $password;

    // /**
    //  * @ORM\Column(type="string")
    //  * @var string
    //  */
    // private $created_at;

    // /**
    //  * @ORM\Column(type="string")
    //  * @var string
    //  */
    // private $updated_at;
    
    public function getId() {
        return $this->id;
    }
    
    public function setName($name) {
        $this->name = $name;
        return $this->name;
    }
    public function getName() {
        return $this->name;
    }
    
    public function setEmail($email) {
        $this->email = $email;
        return $this->email;
    }
    public function getEmail() {
        return $this->email;
    }
    
    public function setPassword($password) {
        $this->password = $password;
        return $this->password;
    }
    public function getPassword() {
        return $this->password;
    }
    
    // public function getCreatedAt() {
    //     return $this->created_at;
    // }
    
    // public function getUpdatedAt() {
    //     return $this->updated_at;
    // }
}