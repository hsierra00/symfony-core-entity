<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements IId, IName, UserInterface
{
    use Id;
    use UniqueName;    

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $apiKey;

    /**
     * Returns the roles granted to the user.     
     * @return string[] The user roles
     */
    public function getRoles() 
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the password used to authenticate the user.     
     * @return string|null The encoded password if any
     */
    public function getPassword()
    {        
    }

    /**
     * Returns the salt that was originally used to encode the password.     
     * @return string|null The salt
     */
    public function getSalt()
    {

    }

    /**
     * Returns the username used to authenticate the user.
     * @return string The username
     */
    public function getUsername()
    {
        return $this->name;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {

    }
}