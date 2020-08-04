<?php

namespace App\Entity\Core\Security;

use App\Entity\Core\Base\IId;
use App\Entity\Core\Base\Id;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements IId, JWTUserInterface
{
    use Id;
    
    /**
     * @ORM\Column(type="string", length=250, nullable=false)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", length=250, nullable=false)
     */
    protected $credential;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $roles;

    public function __construct($username, array $roles = [])
    {
        $this->username = $username;
        $this->roles    = $roles;
    }

    /**
     * {@inheritdoc}
     */
    public static function createFromPayload($username, array $payload)
    {
        if (isset($payload['roles'])) {
            return new static($username, (array) $payload['roles']);
        }

        return new static($username);
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->credential;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
    }
}